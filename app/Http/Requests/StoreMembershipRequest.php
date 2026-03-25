<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMembershipRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->isAdmin();
    }

    public function rules(): array
    {
        return [
            'name'          => ['required', 'string', 'max:80'],
            'description'   => ['nullable', 'string'],
            'price'         => ['required', 'numeric', 'min:0'],
            'duration_days' => ['required', 'integer', 'min:1'],
            'features_text' => ['nullable', 'string'],
            'is_active'     => ['nullable', 'boolean'],
        ];
    }

    protected function passedValidation(): void
    {
        $lines = array_filter(
            array_map('trim', explode("\n", $this->input('features_text', ''))),
            fn ($l) => $l !== ''
        );

        $this->merge([
            'features'  => array_values($lines) ?: null,
            'is_active' => $this->boolean('is_active'),
        ]);
    }

    public function validated($key = null, $default = null): array
    {
        $data = parent::validated($key, $default);
        unset($data['features_text']);
        $data['features']  = array_filter(
            array_map('trim', explode("\n", $this->input('features_text', ''))),
            fn ($l) => $l !== ''
        );
        $data['features']  = array_values($data['features']) ?: null;
        $data['is_active'] = $this->boolean('is_active');

        return $data;
    }
}
