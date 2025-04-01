<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Song;
use App\Models\Album;
use App\Models\Genre;
use Faker\Factory as Faker;

class SongSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $albums = Album::all();

        if ($albums->isEmpty()) {
            $this->command->warn("⚠️ Nessun album trovato! Esegui prima l'AlbumSeeder.");
            return;
        }

        foreach ($albums as $album) {
            for ($i = 0; $i < 10; $i++) {
                Song::create([
                    'title' => $faker->sentence(2),
                    'artist' => $album->artist, // Manteniamo lo stesso artista dell'album
                    'album_id' => $album->id,
                    'genre_id' => Genre::inRandomOrder()->first()->id, // Seleziona un genere casuale
                    'release_date' => $faker->date(),
                    'youtube_link' => $faker->url(),
                    'spotify_link' => $faker->url(),
                ]);
            }
        }
    }
}
