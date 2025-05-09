@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Deleted Superheroes</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Hero Name</th>
                <th>Real Name</th>
                <th>Deleted At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($deletedSuperheroes as $superhero)
            <tr>
                <td>{{ $superhero->hero_name }}</td>
                <td>{{ $superhero->real_name }}</td>
                <td>{{ $superhero->deleted_at->format('Y-m-d H:i') }}</td>
                <td>
                    <form action="{{ route('superheroes.restore', $superhero->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">Restore</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection