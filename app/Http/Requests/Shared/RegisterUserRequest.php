<?php

namespace App\Http\Requests\Shared;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:100', 'regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/u'],
            'first_last_name' => ['required', 'string', 'min:2', 'max:50', 'regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/u'],
            'second_last_name' => ['required', 'string', 'min:2', 'max:50', 'regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/u'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'username' => ['required', 'string', 'min:3', 'max:50', Rule::unique('users', 'username')],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }
}
