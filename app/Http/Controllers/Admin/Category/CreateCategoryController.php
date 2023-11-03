<?php

namespace App\Http\Controllers\Admin\Category;

use App\Actions\Category\CreateCategoryAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryRequest;
use Illuminate\Support\Facades\Auth;

class CreateCategoryController extends Controller {
    public function __invoke(): \Illuminate\Contracts\View\View {
        return view('admin.category.create');
    }

    public function store(CategoryRequest $request, CreateCategoryAction $action): \Illuminate\Http\RedirectResponse {
        $action->handle($request->name);
        return back();
    }
}
