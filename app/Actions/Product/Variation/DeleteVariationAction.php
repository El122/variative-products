<?php

namespace App\Actions\Product\Variation;

use App\Models\Variation;

class DeleteVariationAction {
    public function handle(Variation $variation): void {
        $variation->delete();
    }
}
