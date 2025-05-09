<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Superhero; // Add this import
use Illuminate\Support\Facades\DB;

class SuperheroesTableSeeder extends Seeder
{
    public function run()
    {
        // Clear the table first
        DB::table('superheroes')->truncate();

        $superheroes = [
            [
                'real_name' => 'Peter Parker',
                'hero_name' => 'Spider-Man',
                'photo_path' => 'superheroes/spiderman.jpg',
                'additional_info' => 'Friendly neighborhood superhero'
            ],
            // Add more heroes...
        ];

        foreach ($superheroes as $hero) {
            \App\Models\Superhero::create($hero);
        }
    }
}
