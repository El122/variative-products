<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest {
    public function authorize(): bool {
        return auth()->check();
    }

    public function rules(): array {
        return [
            'name' => ['required', 'string'],
            'vendor' => ['required', 'string'],
            'description' => ['required', 'string'],
        ];
    }
}
