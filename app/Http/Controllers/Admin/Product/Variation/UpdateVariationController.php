<?php

namespace App\Http\Controllers\Admin\Product\Variation;

use App\Actions\Product\Variation\UpdateVariationAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\VariationRequest;
use App\Models\Variation;

class UpdateVariationController extends Controller {
    public function __invoke(Variation $variation): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application {
        return view('admin.variation.edit', compact('variation'));
    }

    public function update(Variation $variation, VariationRequest $request, UpdateVariationAction $action): \Illuminate\Http\RedirectResponse {
        $action->handle($variation, $request->price, $request->description, $request->variation);
        return back();
    }
}
