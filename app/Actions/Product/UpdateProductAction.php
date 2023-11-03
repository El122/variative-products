<?php

namespace App\Actions\Product;

use App\Models\Product;

class UpdateProductAction {
    public function handle(Product $product, string $name, string $vendor, string $description): void {
        $product->update([
            'name' => $name,
            'vendor' => $vendor,
            'description' => $description,
        ]);
    }
}
