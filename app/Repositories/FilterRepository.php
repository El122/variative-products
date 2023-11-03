<?php

namespace App\Repositories;

use App\Models\Filter;

class FilterRepository {
    public function getByName(string $name, int|null $category = null): Filter|null {
        if (!$category)
            return Filter::where('name', $name)->first();
        return Filter::where([
            'name' => $name,
            'category_id' => $category,
        ])->first();
    }
}
