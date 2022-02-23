<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TipTretmanaUpdateRequest extends FormRequest
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
//            'naziv' => 'regex:/^[A-Z][a-z0-9]{2,}(\s[\w\d]+)*$/'
            'naziv' => 'regex:/^([A-ZŠĐŽĆČa-zđšžćč\d\s]{1,}){1,}$/'
        ];
    }
    public function messages()
    {
        return [
            'naziv.regex' => 'Ime nije dobrog formata, mora sadrzati najmanje tri slova!'

        ];
    }
}
