<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        collect([
            [
                'name' => $name = 'Novel',
                'slug' => str($name)->slug()
            ],
            [
                'name' => $name = 'Manga',
                'slug' => str($name)->slug()
            ],
            [
                'name' => $name = 'Anime',
                'slug' => str($name)->slug()
            ],
            [
                'name' => $name = 'Adaption',
                'slug' => str($name)->slug()
            ],
            [
                'name' => $name = '3D Animation',
                'slug' => str($name)->slug()
            ]
        ])->each(fn($q) => Category::create($q));
    }
}
