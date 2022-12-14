<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'name' => $name = str($this->faker->sentence(3))->title(),
            'slug' => str($name)->slug(),
            'price' => rand(1000, 90000),
            'url' => $this->faker->url(),
            'description' => $this->faker->text(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'category_id' => rand(1, 5),
        ];
    }
}
