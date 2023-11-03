<?php

namespace App\Http\Controllers\Admin\Filter;

use App\Actions\Filter\UpdateFilterAction;
use App\Enums\FilterType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Filter\FilterRequest;
use App\Models\Filter;

class UpdateFilterController extends Controller {
    public function __invoke(Filter $filter): \Illuminate\Contracts\View\View {
        $filterTypes = FilterType::cases();
        return view('admin.filter.edit', compact('filter', 'filterTypes'));
    }

    public function update(Filter $filter, FilterRequest $request, UpdateFilterAction $action): \Illuminate\Http\RedirectResponse {
        $action->handle($filter, $request->name, $request->type);
        return back();
    }
}
