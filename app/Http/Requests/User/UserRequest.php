<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'=>'required|regex:/^[\w\- \p{Cyrillic}]*$/u',
            'surname'=>'required|regex:/^[\w\- \p{Cyrillic}]*$/u',
            'patronymic'=>'required|regex:/^[\w\- \p{Cyrillic}]*$/u',
            'login'=>'required|regex:/^[\w\- \p{Cyrillic}]*$/u',
            'email'=>'required|email',
            'password'=>'required|min:6|max:20|same:password_repeat',
        ];
    }
}
