<?php

namespace App\Actions\Filter;

use App\Models\Filter;

class DeleteFilterAction {
    public function handle(Filter $filter): void {
        $filter->delete();
    }
}
