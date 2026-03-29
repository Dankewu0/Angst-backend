<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class BuildRequest extends FormRequest
{

    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'perPage' => 'nullable|integer|min:1|max:100',
        ];
    }
    public function messages(): array
    {
        return [
        'perPage.min' => 'Количество записей на страницу должно быть не меньше 1.',
        'perPage.max' => 'Количество записей на страницу не должно превышать 100.',
        ];
    }
}
