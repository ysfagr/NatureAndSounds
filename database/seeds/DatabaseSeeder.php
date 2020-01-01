<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(VersionsSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(AdminUsersSeeder::class);
        $this->call(SoundsSeeder::class);
    }
}
