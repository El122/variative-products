<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class VariationRequest extends FormRequest {
    public function authorize(): bool {
        return auth()->check();
    }

    public function rules(): array {
        return [
            'price' => ['required', 'numeric'],
            'description' => ['required', 'string'],
            'variation' => ['required', 'array'],
        ];
    }
}
