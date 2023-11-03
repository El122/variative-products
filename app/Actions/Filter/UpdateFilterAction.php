<?php

namespace App\Actions\Filter;

use App\Models\Filter;

class UpdateFilterAction {
    public function handle(Filter $filter, string $name, int $type): void {
        $filter->update([
            'name' => $name,
            'type' => $type,
        ]);
    }
}
