<?php

namespace App\Actions\Product;

use App\Models\Category;
use App\Models\Product;

class CreateProductAction {
    public function handle(Category $category, string $name, string $vendor, string $description): Product {
        return Product::create([
            'name' => $name,
            'vendor' => $vendor,
            'description' => $description,
            'category_id' => $category->id,
        ]);
    }
}
