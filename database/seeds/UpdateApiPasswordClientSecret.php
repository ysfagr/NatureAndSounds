<?php

use Illuminate\Database\Seeder;

class UpdateApiPasswordClientSecret extends Seeder
{
    /**
     * This seed created for for automated tests
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Laravel\Passport\Client::query()
            ->where('id', 2)->update([
                'secret' => 'KdvzzxJiis3biBijEIpV53nOKjvKzmJdNHMgqwNb',
            ]);
    }
}
