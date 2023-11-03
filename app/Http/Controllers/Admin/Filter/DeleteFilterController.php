<?php

namespace App\Http\Controllers\Admin\Filter;

use App\Actions\Filter\DeleteFilterAction;
use App\Http\Controllers\Controller;
use App\Models\Filter;

class DeleteFilterController extends Controller {
    public function __invoke(Filter $filter, DeleteFilterAction $action): \Illuminate\Http\RedirectResponse {
        $action->handle($filter);
        return back();
    }
}
