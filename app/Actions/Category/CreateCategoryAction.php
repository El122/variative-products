<?php

namespace App\Actions\Category;

use App\Models\Category;

class CreateCategoryAction {
    public function handle(string $name): Category {
        return Category::create(['name' => $name]);
    }
}
