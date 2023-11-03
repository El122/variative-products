<?php

namespace App\Http\Controllers\Admin\Category;

use App\Actions\Category\UpdateCategoryAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryRequest;
use App\Models\Category;

class UpdateCategoryController extends Controller {
    public function __invoke(Category $category): \Illuminate\Contracts\View\View {
        return view('admin.category.edit', compact('category'));
    }

    public function update(Category $category, CategoryRequest $request, UpdateCategoryAction $action): \Illuminate\Http\RedirectResponse {
        $action->handle($category, $request->name);
        return back();
    }
}
