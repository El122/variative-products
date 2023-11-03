<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Variation;
use Illuminate\Database\Eloquent\Factories\Factory;

class VariationFactory extends Factory {
    protected $model = Variation::class;

    public function definition(): array {
        $product = Product::factory()->create();
        return [
            'price' => fake()->numberBetween(2000, 20000),
            'description' => fake()->text,
            'product_id' => $product->id,
        ];
    }
}
