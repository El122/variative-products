<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository {
    public function getAll(): \Illuminate\Database\Eloquent\Collection {
        return Product::all();
    }
}
