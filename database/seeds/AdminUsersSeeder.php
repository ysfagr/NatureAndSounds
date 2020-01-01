<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect(
            [[
                'name'     => 'Teknasyon Admin',
                'email'    => 'admin@teknasyon.com',
                'password' => Hash::make('123456'),
                'role'     => 'admin',
            ]]
        )->each(function ($user) {
            \App\User::create($user);
        });
    }
}
