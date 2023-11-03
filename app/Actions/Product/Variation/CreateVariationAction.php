<?php

namespace App\Actions\Product\Variation;

use App\Models\Product;
use App\Models\Variation;
use App\Models\VariationFilter;

class CreateVariationAction {
    public function handle(Product $product, float $price, string $description, array $variations): Variation {
        $variation = Variation::create([
            'price' => $price,
            'description' => $description,
            'product_id' => $product->id,
        ]);

        foreach ($variations as $key => $item) {
            VariationFilter::create([
                'value' => $item,
                'variation_id' => $variation->id,
                'filter_id' => $key,
            ]);
        }

        return $variation;
    }
}
