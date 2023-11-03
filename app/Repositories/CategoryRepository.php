<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository {
    public function getByName(string $name): Category|null {
        return Category::where('name', $name)->first();
    }

    public function getAll(): \Illuminate\Database\Eloquent\Collection {
        return Category::all();
    }
}
