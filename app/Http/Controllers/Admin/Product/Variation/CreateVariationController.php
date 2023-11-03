<?php

namespace App\Http\Controllers\Admin\Product\Variation;

use App\Actions\Product\Variation\CreateVariationAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\VariationRequest;
use App\Models\Product;

class CreateVariationController extends Controller {
    public function __invoke(Product $product): \Illuminate\Contracts\View\View {
        return view('admin.variation.create', compact('product'));
    }

    public function store(Product $product, VariationRequest $request, CreateVariationAction $action): \Illuminate\Http\RedirectResponse {
        $action->handle($product, $request->price, $request->description, $request->variation);
        return back();
    }
}
