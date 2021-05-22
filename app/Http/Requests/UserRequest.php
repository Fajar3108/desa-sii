<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'username' => ['required', 'min:5', 'max:8', 'alpha_dash', Rule::unique('users')],
            'email' => ['required', 'email', Rule::unique('users')],
            'password' => 'required',
            'role' => 'required',
        ];
    }
}
