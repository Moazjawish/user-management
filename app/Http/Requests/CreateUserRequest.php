<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File ;
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
    public function rules(User $user): array
    {
        return [
            'first_name' => ['required','min:5'],
            'last_name' => ['required','min:5'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'password' => ['required','confirmed',Password::defaults()],
            'password_confirmation' => ['required',],
            'image' => ['required',File::image()->min('1kb')->max('10mb')->types([['png', 'jpg', 'jpeg']])],
            'position' => ['required','min:5'],
            'salary' => ['required','min:5'],
        ];
    }
}
