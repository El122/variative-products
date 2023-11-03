<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;

class GetProductController extends Controller {
    public function __construct(private ProductRepository $repository) {
    }

    public function __invoke() {
        $products = $this->repository->getAll();
        return view('admin.product.index', compact('products'));
    }
}
