<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSaleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->isAdmin();
    }

    public function rules(): array
    {
        return [
            'notes'               => ['nullable', 'string', 'max:255'],
            'items'               => ['required', 'array', 'min:1'],
            'items.*.product_id'  => ['required', 'integer', 'exists:cafeteria_products,id'],
            'items.*.quantity'    => ['required', 'integer', 'min:1'],
        ];
    }
}
