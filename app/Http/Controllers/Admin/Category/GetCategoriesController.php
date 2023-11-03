<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repositories\CategoryRepository;

class GetCategoriesController extends Controller {
    public function __construct(private CategoryRepository $repository) {
    }

    public function __invoke(): \Illuminate\Contracts\View\View {
        $categories = $this->repository->getAll();
        return view('admin.category.index', compact('categories'));
    }

    public function get(Category $category): \Illuminate\Contracts\View\View {
        return view('admin.category.category', compact('category'));
    }
}
