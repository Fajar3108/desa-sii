<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VillageInfoRequest extends FormRequest
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
            'address' => ['required'],
            'description' => ['required'],
            'no_hp' => ['required', 'numeric'],
            'email' => ['required', 'email:rfc,dns'],
            'start_day' => ['required', 'in:senin,selasa,rabu,kamis,jumat,sabtu,minggu'],
            'end_day' => ['required', 'in:senin,selasa,rabu,kamis,jumat,sabtu,minggu'],
            'start_time' => ['required', 'date_format:H:i'],
            'end_time' => ['required', 'date_format:H:i', 'after:start_time'],
        ];
    }
}
