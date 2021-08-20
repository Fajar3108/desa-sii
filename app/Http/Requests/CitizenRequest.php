<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Citizen;

class CitizenRequest extends FormRequest
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
            'name' => ['required'],
            'nik' => ['required', 'digits:16', Rule::unique('citizens')->ignore($this->citizen)],
            'no_hp' => [Rule::unique('citizens')->ignore($this->citizen)],
            'kk' => ['required', 'digits:16'],
            'birthday' => ['required', 'date'],
            'gender' => ['required', 'in:L,P'],
            'address' => ['required'],
            'rt' => ['required', 'numeric'],
            'rw' => ['required', 'numeric'],
            'status' => ['required', 'in:mampu,kurang_mampu']
        ];
    }
}
