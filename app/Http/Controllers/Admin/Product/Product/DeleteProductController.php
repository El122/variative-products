<?php

namespace App\Http\Controllers\Admin\Product\Product;

use App\Actions\Product\DeleteProductAction;
use App\Http\Controllers\Controller;
use App\Models\Product;

class DeleteProductController extends Controller {
    public function __invoke(Product $product, DeleteProductAction $action): \Illuminate\Http\RedirectResponse {
        $action->handle($product);
        return back();
    }
}
