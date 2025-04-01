<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Album;
use App\Models\Genre;
use Faker\Factory as Faker;

class AlbumSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $genres = Genre::all();

        if ($genres->isEmpty()) {
            $this->command->warn("⚠️ Nessun genere trovato! Esegui prima il GenreSeeder.");
            return;
        }

        for ($i = 0; $i < 10; $i++) {
            Album::create([
                'name' => $faker->sentence(3),
                'year' => $faker->year(),
                'artist' => $faker->name(),
                'description' => $faker->paragraph(),
            ]);
        }
    }
}
