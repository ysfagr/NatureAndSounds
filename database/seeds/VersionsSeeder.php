<?php

use Illuminate\Database\Seeder;

class VersionsSeeder extends Seeder
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
                'platform'              => 'android',
                'version_code'          => '1.0',
                'force_update'          => 0,
                'language_version_code' => '1.0',
            ], [
                'platform'              => 'ios',
                'version_code'          => '1.0',
                'force_update'          => 0,
                'language_version_code' => '1.0',
            ],
        ])->each(function ($version) {
            \App\Version::create($version);
        });
    }
}
