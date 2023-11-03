<?php

namespace App\Actions\Product\Variation;

use App\Models\Variation;
use App\Models\VariationFilter;

class UpdateVariationAction {
    public function handle(Variation $variation, float $price, string $description, array $variations): void {
        $variation->update([
            'price' => $price,
            'description' => $description,
        ]);

        $variation->filters()->delete();
        foreach ($variations as $key => $item) {
            VariationFilter::create([
                'value' => $item,
                'variation_id' => $variation->id,
                'filter_id' => $key,
            ]);
        }
    }
}
