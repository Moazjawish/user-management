<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

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
            'first_name' => ['required','min:5'],
            'last_name' => ['required','min:5'],
            'email' => 'required|email|max:255|unique:users,email',
            'password' => ['required','confirmed',Password::defaults()],
            'password_confirmation' => ['required'],
            'image' => ['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048000'],
            'position' => ['required','min:5'],
            'salary' => ['required','min:5', 'numeric'],
            'role' => 'user',
        ];
    }
}
