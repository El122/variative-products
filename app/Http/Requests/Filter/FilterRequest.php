<?php

namespace App\Http\Requests\Filter;

use App\Rules\Filter\UniqueFilterRule;
use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest {
    public function authorize(): bool {
        return auth()->check();
    }

    public function rules(): array {
        return [
            'name' => ['required', 'string', 'max:50', new UniqueFilterRule($this->filter)],
            'type' => ['required', 'integer', 'in:1,2,3'],
        ];
    }
}
