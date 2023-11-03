<?php

namespace App\Http\Controllers\Admin\Filter;

use App\Actions\Filter\CreateFilterAction;
use App\Enums\FilterType;
use App\Http\Requests\Filter\FilterRequest;
use App\Models\Category;

class CreateFilterController {
    public function __invoke(Category $category): \Illuminate\Contracts\View\View {
        $filterTypes = FilterType::cases();
        return view('admin.filter.create', compact('category', 'filterTypes'));
    }

    public function store(Category $category, FilterRequest $request, CreateFilterAction $action): \Illuminate\Http\RedirectResponse {
        $action->handle($category, $request->name, $request->type);
        return back();
    }
}
