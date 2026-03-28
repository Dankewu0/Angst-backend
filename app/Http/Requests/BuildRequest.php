<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class BuildRequest extends FormRequest
{
<<<<<<< HEAD
    /**
     * Determine if the user is authorized to make this request.
     */
=======
>>>>>>> fc2cd7fe379a1017e1f3cd81ca69750b3e2a146a
    public function authorize(): bool
    {
        return false;
    }

<<<<<<< HEAD
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
=======
    public function rules(): array
    {
        return [
>>>>>>> fc2cd7fe379a1017e1f3cd81ca69750b3e2a146a
        ];
    }
}
