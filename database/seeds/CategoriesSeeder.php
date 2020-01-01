<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
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
                'name'      => 'Kuş Sesleri',
                'image_url' => 'https://loremflickr.com/320/240?random=1',
            ], [
                'name'      => 'Rüzgar Esintisi',
                'image_url' => 'https://loremflickr.com/320/240?random=1',
            ],
        ])->each(function ($category) {
            \App\Category::create($category);
        });
    }
}
