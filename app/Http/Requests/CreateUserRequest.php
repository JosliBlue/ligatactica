<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            /*
            'new_email' => 'required|email|unique:users,email',
            'new_nombre' => 'required|string|max:255',
            'new_pass' => 'required|string|min:8|confirmed',
            'confirm_new_pass' => 'required|same:new_pass',
            'new_date_birth' => 'required|date|before:now-17y|after:now-100y',
            'role' => 'required|string|in:PRESIDENT,ADMIN',
            */
        ];
    }
}
