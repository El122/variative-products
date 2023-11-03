<?php

namespace App\Http\Controllers\Admin\Product\Variation;

use App\Actions\Product\Variation\DeleteVariationAction;
use App\Http\Controllers\Controller;
use App\Models\Variation;

class DeleteVariationController extends Controller {
    public function __invoke(Variation $variation, DeleteVariationAction $action): \Illuminate\Http\RedirectResponse {
        $action->handle($variation);
        return back();
    }
}
