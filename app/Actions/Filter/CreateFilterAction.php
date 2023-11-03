<?php

namespace App\Actions\Filter;

use App\Models\Category;
use App\Models\Filter;

class CreateFilterAction {
    public function handle(Category $category, string $name, int $type): Filter {
        return Filter::create([
            'name' => $name,
            'type' => $type,
            'category_id' => $category->id,
        ]);
    }
}
