<?php

namespace App\Http\Controllers\Web\Catalog;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;

class CatalogController extends Controller {
    public function __construct(private CategoryRepository $categoryRepository) {
    }

    public function __invoke(): \Illuminate\Contracts\View\View {
        $categories = $this->categoryRepository->getAll();
        return view('web.index', compact('categories'));
    }
}
