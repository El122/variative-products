<?php

namespace App\Http\Controllers\Admin\Product;

use App\Actions\Product\CreateProductAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Models\Category;

class CreateProductController extends Controller {
    public function __invoke(Category $category): \Illuminate\Contracts\View\View {
        return view('admin.product.create', compact('category'));
    }

    public function store(Category $category, ProductRequest $request, CreateProductAction $action): \Illuminate\Http\RedirectResponse {
        $action->handle($category, $request->name, $request->vendor, $request->description);
        return back();
    }
}
