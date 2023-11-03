<?php

namespace Database\Factories;

use App\Enums\FilterType;
use App\Models\Category;
use App\Models\Filter;
use Illuminate\Database\Eloquent\Factories\Factory;

class FilterFactory extends Factory {
    protected $model = Filter::class;

    public function definition(): array {
        $category = Category::factory()->create();
        return [
            'name' => fake()->word,
            'type' => FilterType::RADIO->value,
            'category_id' => $category->id,
        ];
    }
}
