<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory {
    protected $model = Product::class;

    public function definition(): array {
        $category = Category::factory()->create();
        return [
            'name' => fake()->word,
            'vendor' => fake()->numberBetween(200, 999),
            'description' => fake()->text,
            'category_id' => $category->id,
        ];
    }
}
