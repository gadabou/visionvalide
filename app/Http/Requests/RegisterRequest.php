<?php

namespace App\Http\Requests;

use App\Rules\LowerCaseCheck;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
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
        // special charatars for pass regex validation $sp = /[`!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/
        return [
            'name' => ['required', 'string', 'min:2'],
            'position' => ['nullable', 'string'],
            'username' => ['required', 'string', 'min:5', Rule::unique('users')->ignore($this->user, 'username'), new LowerCaseCheck()],
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->user, 'email')],
            'password' => [Route::is('users.update') ? 'nullable' : 'required', 'string', 'min:6',],
            'password_confirmation' => ['required', 'same:password'],
            // 'role' => ['required', 'string'],
            'roles' => ['nullable', 'array'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }

    public function messages()
    {
        return [
            'password.regex' => 'le mot de passe doit contenir au moins un majuscule, un chiffre et un caractère spéciale.',
        ];
    }
}
