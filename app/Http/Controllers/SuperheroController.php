<?php

namespace App\Http\Controllers;

use App\Models\Superhero;
use Illuminate\Http\Request;

class SuperheroController extends Controller
{
    public function destroy(Superhero $superhero)
    {
        $superhero->delete();
        return redirect()->route('superheroes.index')
            ->with('success', 'Superhero moved to trash');
    }

    public function deleted()
    {
        $deletedSuperheroes = Superhero::onlyTrashed()->get();
        return view('superheroes.deleted', compact('deletedSuperheroes'));
    }

    public function restore($id)
    {
        Superhero::withTrashed()->find($id)->restore();
        return redirect()->route('superheroes.deleted')
            ->with('success', 'Superhero restored successfully');
    }
    public function index()
    {
        $superheroes = Superhero::all();
        return view('superheroes.index', compact('superheroes'));
    }

    public function create()
    {
        return view('superheroes.create');
    }

    public function show(Superhero $superhero)
    {
        return view('superheroes.show', compact('superhero'));
    }

    public function edit(Superhero $superhero)
    {
        return view('superheroes.edit', compact('superhero'));
    }

    public function update(Request $request, Superhero $superhero)
    {
        $request->validate([
            'real_name' => 'required',
            'hero_name' => 'required|unique:superheroes,hero_name,'.$superhero->id,
            'photo_url' => 'required|url',
            'additional_info' => 'nullable'
        ]);

        $superhero->update($request->all());

        return redirect()->route('superheroes.index')
            ->with('success', 'Superhero updated successfully');
    }
    public function store(Request $request)
    {
        $request->validate([
            'real_name' => 'required',
            'hero_name' => 'required|unique:superheroes',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'additional_info' => 'nullable'
        ]);

        $path = $request->file('photo')->store('superheroes', 'public');

        Superhero::create([
            'real_name' => $request->real_name,
            'hero_name' => $request->hero_name,
            'photo_path' => $path,
            'additional_info' => $request->additional_info
        ]);

        return redirect()->route('superheroes.index')
            ->with('success', 'Superhero created successfully.');
    }
}