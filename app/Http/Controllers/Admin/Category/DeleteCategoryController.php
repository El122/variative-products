<?php

namespace App\Http\Controllers\Admin\Category;

use App\Actions\Category\DeleteCategoryAction;
use App\Http\Controllers\Controller;
use App\Models\Category;

class DeleteCategoryController extends Controller {
    public function __invoke(Category $category, DeleteCategoryAction $action): \Illuminate\Http\RedirectResponse {
        $action->handle($category);
        return back();
    }
}
