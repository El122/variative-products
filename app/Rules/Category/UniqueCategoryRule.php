<?php

namespace App\Rules\Category;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UniqueCategoryRule implements ValidationRule {
    private CategoryRepository $categoryRepository;

    public function __construct(private Category|null $category) {
        $this->categoryRepository = new CategoryRepository();
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void {
        $categoryByName = $this->categoryRepository->getByName($value);
        if ($this->category && $categoryByName && $categoryByName->id != $this->category->id ||
            !$this->category && $categoryByName) {
            $fail("Категория с таким названием уже существует");
        }
    }
}
