<?php

namespace App\Http\Controllers\Admin\Product\Product;

use App\Actions\Product\UpdateProductAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Models\Product;

class UpdateProductController extends Controller {
    public function __invoke(Product $product): \Illuminate\Contracts\View\View {
        return view('admin.product.edit', compact('product'));
    }

    public function update(Product $product, ProductRequest $request, UpdateProductAction $action): \Illuminate\Http\RedirectResponse {
        $action->handle($product, $request->name, $request->vendor, $request->description);
        return back();
    }
}
