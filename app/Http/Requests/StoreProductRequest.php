<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->isAdmin();
    }

    public function rules(): array
    {
        return [
            'name'        => ['required', 'string', 'max:100'],
            'description' => ['nullable', 'string', 'max:255'],
            'category'    => ['required', 'string', 'max:60'],
            'sale_price'  => ['required', 'numeric', 'min:0'],
            'cost_price'  => ['required', 'numeric', 'min:0'],
            'stock'       => ['required', 'integer', 'min:0'],
            'min_stock'   => ['required', 'integer', 'min:0'],
            'is_active'   => ['boolean'],
        ];
    }
}
