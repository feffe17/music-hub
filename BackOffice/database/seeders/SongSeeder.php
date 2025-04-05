<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Song;
use App\Models\Album;
use App\Models\Genre;

class SongSeeder extends Seeder
{
    public function run(): void
    {
        $albums = Album::all()->keyBy('name');
        $genres = Genre::all()->keyBy('name');

        if ($albums->isEmpty() || $genres->isEmpty()) {
            $this->command->warn("⚠️ Assicurati di eseguire prima AlbumSeeder e GenreSeeder.");
            return;
        }

        $songsByAlbum = [
            'Thriller' => [
                ['title' => 'Beat It', 'genre' => 'Pop', 'youtube' => 'https://www.youtube.com/watch?v=oRdxUFDoQe0', 'spotify' => 'https://open.spotify.com/track/6f3Slt0GbA2bPZlz0aIFXN'],
                ['title' => 'Billie Jean', 'genre' => 'Pop', 'youtube' => 'https://www.youtube.com/watch?v=Zi_XLOBDo_Y', 'spotify' => 'https://open.spotify.com/track/5ChkMS8OtdzJeqyybCc9R5'],
                ['title' => 'Thriller', 'genre' => 'Pop', 'youtube' => 'https://www.youtube.com/watch?v=sOnqjkJTMaA', 'spotify' => 'https://open.spotify.com/track/2LlQb7Uoj1kKyGhlkW6Mcp'],
                ['title' => 'Wanna Be Startin’ Somethin’', 'genre' => 'Pop', 'youtube' => 'https://www.youtube.com/watch?v=4Uj3zitETs4', 'spotify' => 'https://open.spotify.com/track/0nLiqZ6A27jJri2VCalIUs'],
                ['title' => 'Human Nature', 'genre' => 'Pop', 'youtube' => 'https://www.youtube.com/watch?v=ElMJQdM4lJk', 'spotify' => 'https://open.spotify.com/track/4m0nUawzAfYv1HZCE6jGug'],
                ['title' => 'The Girl Is Mine', 'genre' => 'Pop', 'youtube' => 'https://www.youtube.com/watch?v=EjQz1Z8Zgc8', 'spotify' => 'https://open.spotify.com/track/3W8As3qAwdDCrD8nQx7FZl'],
                ['title' => 'Baby Be Mine', 'genre' => 'Pop', 'youtube' => 'https://www.youtube.com/watch?v=2b3XH7cm6C8', 'spotify' => 'https://open.spotify.com/track/3U4isOIWM3VvDubwSI3y7a'],
                ['title' => 'P.Y.T. (Pretty Young Thing)', 'genre' => 'Pop', 'youtube' => 'https://www.youtube.com/watch?v=1zrMGnobcPs', 'spotify' => 'https://open.spotify.com/track/2QjOHCTQ1Jl3zawyYOpxh6'],
                ['title' => 'Lady in My Life', 'genre' => 'Pop', 'youtube' => 'https://www.youtube.com/watch?v=SczreKgnthk', 'spotify' => 'https://open.spotify.com/track/4b6kD4N0f1n1RklkV2fpZr'],
                ['title' => 'Carousel', 'genre' => 'Pop', 'youtube' => 'https://www.youtube.com/watch?v=EwM9P1Ae2RE', 'spotify' => 'https://open.spotify.com/track/3fW2bKkuZ1YEkTXCdsDblP'],
            ],

            'Back in Black' => [
                ['title' => 'Hells Bells', 'genre' => 'Rock', 'youtube' => 'https://www.youtube.com/watch?v=etAIpkdhU9Q', 'spotify' => 'https://open.spotify.com/track/4fSIb4hdOQ151TILNsSEaF'],
                ['title' => 'Shoot to Thrill', 'genre' => 'Rock', 'youtube' => 'https://www.youtube.com/watch?v=K8vUyhWQF8E', 'spotify' => 'https://open.spotify.com/track/5ihS6UUlyQAfmp48eSkxuQ'],
                ['title' => 'Back in Black', 'genre' => 'Rock', 'youtube' => 'https://www.youtube.com/watch?v=pAgnJDJN4VA', 'spotify' => 'https://open.spotify.com/track/08mG3Y1vljYA6bvDt4Wqkj'],
                ['title' => 'You Shook Me All Night Long', 'genre' => 'Rock', 'youtube' => 'https://www.youtube.com/watch?v=Lo2qQmj0_h4', 'spotify' => 'https://open.spotify.com/track/57bgtoPSgt236HzfBOd8kj'],
                ['title' => 'Rock and Roll Ain’t Noise Pollution', 'genre' => 'Rock', 'youtube' => 'https://www.youtube.com/watch?v=Fh_gIGcBqNQ', 'spotify' => 'https://open.spotify.com/track/3jT8a0zBFKXayTBkaFFf6a'],
                ['title' => 'Let Me Put My Love Into You', 'genre' => 'Rock', 'youtube' => 'https://www.youtube.com/watch?v=9DZ3NjDImTM', 'spotify' => 'https://open.spotify.com/track/5Ko4OnfU5T4NGSb2e3aG1g'],
                ['title' => 'Shake a Leg', 'genre' => 'Rock', 'youtube' => 'https://www.youtube.com/watch?v=XeJS9UeU1Nw', 'spotify' => 'https://open.spotify.com/track/0fDW9suw3ogFSTrA7nPgaZ'],
                ['title' => 'What Do You Do for Money Honey', 'genre' => 'Rock', 'youtube' => 'https://www.youtube.com/watch?v=wIBZWLZzUh8', 'spotify' => 'https://open.spotify.com/track/4HzKwSddCI2cA4kEtxLQfF'],
                ['title' => 'Givin the Dog a Bone', 'genre' => 'Rock', 'youtube' => 'https://www.youtube.com/watch?v=RHcBkmvDZCg', 'spotify' => 'https://open.spotify.com/track/6PKX1B6PMWUKnrg0MABlU4'],
                ['title' => 'Have a Drink on Me', 'genre' => 'Rock', 'youtube' => 'https://www.youtube.com/watch?v=JVuUwvUUpro', 'spotify' => 'https://open.spotify.com/track/1FrVx4bJjAAZzhzWquKN9V'],
            ],

            'Discovery' => [
                ['title' => 'One More Time', 'genre' => 'Electronic', 'youtube' => 'https://www.youtube.com/watch?v=FGBhQbmPwH8', 'spotify' => 'https://open.spotify.com/track/0DiWol3AO6WpXZgp0goxAV'],
                ['title' => 'Aerodynamic', 'genre' => 'Electronic', 'youtube' => 'https://www.youtube.com/watch?v=L93-7vRfxNs', 'spotify' => 'https://open.spotify.com/track/2RlgNHKcydI9sayD2Df2xp'],
                ['title' => 'Digital Love', 'genre' => 'Electronic', 'youtube' => 'https://www.youtube.com/watch?v=FxzBvqYwP8I', 'spotify' => 'https://open.spotify.com/track/2S9W4yJxJz0zJVZJ0CJwzY'],
                ['title' => 'Harder, Better, Faster, Stronger', 'genre' => 'Electronic', 'youtube' => 'https://www.youtube.com/watch?v=gAjR4_CbPpQ', 'spotify' => 'https://open.spotify.com/track/2cGxRwrMyEAp8dEbuZaVv6'],
                ['title' => 'Crescendolls', 'genre' => 'Electronic', 'youtube' => 'https://www.youtube.com/watch?v=H9L2VZ0AvQI', 'spotify' => 'https://open.spotify.com/track/0NBvOez1BbrI5qzUbz6kGI'],
                ['title' => 'Nightvision', 'genre' => 'Electronic', 'youtube' => 'https://www.youtube.com/watch?v=3ZZHUd5EEzM', 'spotify' => 'https://open.spotify.com/track/4R2kk1vQ2nNs2vGz8ELvWE'],
                ['title' => 'Superheroes', 'genre' => 'Electronic', 'youtube' => 'https://www.youtube.com/watch?v=pw8PpYBiDsc', 'spotify' => 'https://open.spotify.com/track/6mCifz0nVkcQBk0zkzKwRz'],
                ['title' => 'High Life', 'genre' => 'Electronic', 'youtube' => 'https://www.youtube.com/watch?v=FO6OvyS7Z9I', 'spotify' => 'https://open.spotify.com/track/7oDDmoJ0bdmdkVyZtdVbgy'],
                ['title' => 'Something About Us', 'genre' => 'Electronic', 'youtube' => 'https://www.youtube.com/watch?v=KWbhrx8Hq_Q', 'spotify' => 'https://open.spotify.com/track/3QwuF4OwmF7KlEXqkgE5Pv'],
                ['title' => 'Face to Face', 'genre' => 'Electronic', 'youtube' => 'https://www.youtube.com/watch?v=6QpkKFV8B6E', 'spotify' => 'https://open.spotify.com/track/6XfY2tE4jE6v2vBgc1OnRy'],
            ],

            '21' => [
                ['title' => 'Rolling in the Deep', 'genre' => 'Pop', 'youtube' => 'https://www.youtube.com/watch?v=rYEDA3JcQqw', 'spotify' => 'https://open.spotify.com/track/1c8gk2PeTE04A1pIDH9YMk'],
                ['title' => 'Rumour Has It', 'genre' => 'Pop', 'youtube' => 'https://www.youtube.com/watch?v=bpFW4Yhy08r', 'spotify' => 'https://open.spotify.com/track/4kflIGfjdZJW4ot2ioixTB'],
                ['title' => 'Turning Tables', 'genre' => 'Pop', 'youtube' => 'https://www.youtube.com/watch?v=bsFCO8-oCEQ', 'spotify' => 'https://open.spotify.com/track/2ZSmK0C2egWQ2T5f4mhyXC'],
                ['title' => 'Don’t You Remember', 'genre' => 'Pop', 'youtube' => 'https://www.youtube.com/watch?v=jLNt8aMNbvY', 'spotify' => 'https://open.spotify.com/track/1Ha1LqR1KFUeYgxYdzHyiG'],
                ['title' => 'Set Fire to the Rain', 'genre' => 'Pop', 'youtube' => 'https://www.youtube.com/watch?v=FlsBObg-1BQ', 'spotify' => 'https://open.spotify.com/track/1c8gk2PeTE04A1pIDH9YMk'],
                ['title' => 'He Won’t Go', 'genre' => 'Pop', 'youtube' => 'https://www.youtube.com/watch?v=aYna3J3WjL4', 'spotify' => 'https://open.spotify.com/track/6mO6hZf0r1FGE2ppRqOP2p'],
                ['title' => 'Take It All', 'genre' => 'Pop', 'youtube' => 'https://www.youtube.com/watch?v=bG0uSEVxHgU', 'spotify' => 'https://open.spotify.com/track/2ZAjU3sbV48VRg2nmgyWmg'],
                ['title' => 'I’ll Be Waiting', 'genre' => 'Pop', 'youtube' => 'https://www.youtube.com/watch?v=BNMxGEUO5M8', 'spotify' => 'https://open.spotify.com/track/2uzn8gZGDy33rjWyZHgBMn'],
                ['title' => 'One and Only', 'genre' => 'Pop', 'youtube' => 'https://www.youtube.com/watch?v=J4c7Z7W5qBA', 'spotify' => 'https://open.spotify.com/track/2WZyf4KzF0YoY5M7Q4J1dD'],
                ['title' => 'Lovesong', 'genre' => 'Pop', 'youtube' => 'https://www.youtube.com/watch?v=hLQl3WQQoQ0', 'spotify' => 'https://open.spotify.com/track/0Rx0DJI556Ix5gBny6EWmn'],
            ],

            'The Eminem Show' => [
                ['title' => 'Without Me', 'genre' => 'Hip-Hop', 'youtube' => 'https://www.youtube.com/watch?v=YVkUvmDQ3HY', 'spotify' => 'https://open.spotify.com/track/7Ie9W94M7OjPoZVV216Xus'],
                ['title' => 'Cleaning Out My Closet', 'genre' => 'Hip-Hop', 'youtube' => 'https://www.youtube.com/watch?v=RQ9_TKayu9s', 'spotify' => 'https://open.spotify.com/track/0obBFrPYksoBJbvHf0pIci'],
                ['title' => 'Sing for the Moment', 'genre' => 'Hip-Hop', 'youtube' => 'https://www.youtube.com/watch?v=D4hAVemuQXY', 'spotify' => 'https://open.spotify.com/track/7gxy8WkW1RrSWXUtsttz6e'],
                ['title' => 'Superman', 'genre' => 'Hip-Hop', 'youtube' => 'https://www.youtube.com/watch?v=GxBSyx85Kp8', 'spotify' => 'https://open.spotify.com/track/5dt4v5uHvNh0U4pB3K0Jvx'],
                ['title' => 'Till I Collapse', 'genre' => 'Hip-Hop', 'youtube' => 'https://www.youtube.com/watch?v=ytQ5CYE1VZw', 'spotify' => 'https://open.spotify.com/track/1xznGGDReH1oQq0xzbwXa3'],
                ['title' => 'Business', 'genre' => 'Hip-Hop', 'youtube' => 'https://www.youtube.com/watch?v=qRRn9yhR8j8', 'spotify' => 'https://open.spotify.com/track/1lA8wwkJzqH6EwdZDN6cw4'],
                ['title' => 'Say What You Say', 'genre' => 'Hip-Hop', 'youtube' => 'https://www.youtube.com/watch?v=7lzWIEw7uZo', 'spotify' => 'https://open.spotify.com/track/5Z2ySpQnp2gQUvImKeTgXG'],
                ['title' => 'Hailie’s Song', 'genre' => 'Hip-Hop', 'youtube' => 'https://www.youtube.com/watch?v=Z4P-l69n91s', 'spotify' => 'https://open.spotify.com/track/1EmxMeosbjQH2Zc5f3Gzn0'],
                ['title' => 'Soldier', 'genre' => 'Hip-Hop', 'youtube' => 'https://www.youtube.com/watch?v=5VPFKnBYOSI', 'spotify' => 'https://open.spotify.com/track/4bHsxqR3GMrXTxEPLuK5ue'],
                ['title' => 'White America', 'genre' => 'Hip-Hop', 'youtube' => 'https://www.youtube.com/watch?v=RZIzD0ZfTFg', 'spotify' => 'https://open.spotify.com/track/3mbgV6WC7xOzMy6ZEGKrGJ'],
            ],

            'Kind of Blue' => [
                ['title' => 'So What', 'genre' => 'Jazz', 'youtube' => 'https://www.youtube.com/watch?v=zqNTltOGh5c', 'spotify' => 'https://open.spotify.com/track/4ACf4m2tDunfdoxzv0t5fE'],
                ['title' => 'Freddie Freeloader', 'genre' => 'Jazz', 'youtube' => 'https://www.youtube.com/watch?v=RPfFhfSuUZ4', 'spotify' => 'https://open.spotify.com/track/4iG2gAwKXsOcijVaVXzRPW'],
                ['title' => 'Blue in Green', 'genre' => 'Jazz', 'youtube' => 'https://www.youtube.com/watch?v=PoPL7BExSQU', 'spotify' => 'https://open.spotify.com/track/2vpg1T1Z4qVtKdaFjXkZlC'],
                ['title' => 'All Blues', 'genre' => 'Jazz', 'youtube' => 'https://www.youtube.com/watch?v=uRBgy43gCoQ', 'spotify' => 'https://open.spotify.com/track/1WdcxHjrFAsbniZmIfKWT9'],
                ['title' => 'Flamenco Sketches', 'genre' => 'Jazz', 'youtube' => 'https://www.youtube.com/watch?v=YjRbm8QjcqU', 'spotify' => 'https://open.spotify.com/track/7hxHWCCAIIxFLCzvDgnQHX'],
                ['title' => 'On Green Dolphin Street (Bonus)', 'genre' => 'Jazz', 'youtube' => 'https://www.youtube.com/watch?v=t8Z7pD7dR38', 'spotify' => 'https://open.spotify.com/track/1sh9WCjNkYPRmjAoZTPyyI'],
                ['title' => 'Fran Dance (Bonus)', 'genre' => 'Jazz', 'youtube' => 'https://www.youtube.com/watch?v=YhdcYJUGs9A', 'spotify' => 'https://open.spotify.com/track/5LZtmm3vI5LVRXZTW7CUde'],
                ['title' => 'Stella by Starlight (Live)', 'genre' => 'Jazz', 'youtube' => 'https://www.youtube.com/watch?v=KqDQTiZ9v1U', 'spotify' => 'https://open.spotify.com/track/4n28MbRYsG4KQeCUsGsC9b'],
                ['title' => 'Milestones', 'genre' => 'Jazz', 'youtube' => 'https://www.youtube.com/watch?v=CNjiPQpB7c0', 'spotify' => 'https://open.spotify.com/track/5tEgu8cQNKSBPM1I6eG9UJ'],
                ['title' => 'Autumn Leaves (Live)', 'genre' => 'Jazz', 'youtube' => 'https://www.youtube.com/watch?v=Qf1W_rkY1Ko', 'spotify' => 'https://open.spotify.com/track/2JLnlzYahvJPVb7bYFsP9B'],
            ],

        ];

        foreach ($songsByAlbum as $albumName => $songs) {
            $album = $albums->get($albumName);

            if (!$album) {
                $this->command->warn("⚠️ Album '$albumName' non trovato.");
                continue;
            }

            foreach ($songs as $song) {
                $genre = $genres->get($song['genre']);
                if (!$genre) {
                    $this->command->warn("⚠️ Genere '{$song['genre']}' non trovato.");
                    continue;
                }

                Song::firstOrCreate([
                    'title' => $song['title'],
                    'album_id' => $album->id,
                ], [
                    'artist' => $album->artist,
                    'genre_id' => $genre->id,
                    'release_date' => $album->year . '-01-01',
                    'youtube_link' => $song['youtube'],
                    'spotify_link' => $song['spotify'],
                ]);
            }
        }
    }
}
