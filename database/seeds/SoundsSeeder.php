<?php

use Illuminate\Database\Seeder;

class SoundsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [
                'name'           => 'Sound 1',
                'sound_file_url' => 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3',
                'artist_name'    => 'Helix',
                'length'         => '06:13',
                'category_id'    => 1,
            ], [
                'name'           => 'Sound 2',
                'sound_file_url' => 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-2.mp3',
                'artist_name'    => 'Helix',
                'length'         => '07:05',
                'category_id'    => 1,
            ],
        ])->each(function ($sound) {
            \App\Sound::create($sound);
        });
    }
}
