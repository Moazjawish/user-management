<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
        $id = $this->route('user')->id;
        return [
            'first_name' => ['required','min:5'],
            'last_name' => ['required','min:5'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $id],
            'image' => ['image','mimes:jpeg,png,jpg,gif,svg','max:20480'],
            'position' => ['required','min:5'],
            'salary' => ['required','min:5', 'numeric'],
        ];
    }
}
