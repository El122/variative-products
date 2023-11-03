<?php

namespace App\Http\Requests\Category;

use App\Rules\Category\UniqueCategoryRule;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest {
    public function authorize(): bool {
        return auth()->check();
    }

    public function rules(): array {
        return [
            'name' => ['required', 'string', 'max:50', new UniqueCategoryRule($this->category)],
        ];
    }
}
