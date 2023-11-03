<?php

namespace App\Rules\Filter;

use App\Models\Filter;
use App\Repositories\FilterRepository;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UniqueFilterRule implements ValidationRule {
    private FilterRepository $filterRepository;

    public function __construct(private Filter|null $filter) {
        $this->filterRepository = new FilterRepository();
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void {
        $filterByName = $this->filterRepository->getByName($value, $this->filter?->category_id);
        if ($this->filter && $filterByName && $filterByName->id != $this->filter->id ||
            !$this->filter && $filterByName) {
            $fail("Фильтр с таким названием уже существует");
        }
    }
}
