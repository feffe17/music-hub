<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Album;

class AlbumSeeder extends Seeder
{
    public function run(): void
    {
        $albums = [
            [
                'name' => 'Thriller',
                'year' => 1982,
                'artist' => 'Michael Jackson',
                'description' => 'Uno degli album più venduti di tutti i tempi.',
            ],
            [
                'name' => 'Back in Black',
                'year' => 1980,
                'artist' => 'AC/DC',
                'description' => 'Rock duro e puro da una delle band più iconiche.',
            ],
            [
                'name' => '21',
                'year' => 2011,
                'artist' => 'Adele',
                'description' => 'Ballate struggenti e voce potente.',
            ],
            [
                'name' => 'The Eminem Show',
                'year' => 2002,
                'artist' => 'Eminem',
                'description' => 'Uno degli album hip-hop più celebri.',
            ],
            [
                'name' => 'Discovery',
                'year' => 2001,
                'artist' => 'Daft Punk',
                'description' => 'Capolavoro della musica elettronica.',
            ],
            [
                'name' => 'Kind of Blue',
                'year' => 1959,
                'artist' => 'Miles Davis',
                'description' => 'Il jazz in una delle sue forme più pure.',
            ],
        ];

        foreach ($albums as $albumData) {
            Album::firstOrCreate(['name' => $albumData['name']], $albumData);
        }
    }
}
