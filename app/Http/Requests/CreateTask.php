<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTask extends FormRequest
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
            'title' => ['required', 'min:4'],
            'description' => ['required', 'min:4'],
            'status' => ['required'],
            'user_id' => ['required'],
        ];
    }

    public function messages():array
    {
        return [
            'status.required' => ['please select the task status'],
            'user_id.required' => ['please select user to perform task'],
        ];
    }


}
