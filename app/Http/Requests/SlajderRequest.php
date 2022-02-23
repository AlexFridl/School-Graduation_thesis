<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlajderRequest extends FormRequest
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
            'tbNaslov' => 'required|regex:/^[\w\d]{2,}(\s[\w\d]+)*$/',
            'fSlika' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'tbNaslov.required' => 'Unesite naziv slike slajdera!',
            'fSlika.required' => 'Odaberite sliku!'
        ];
    }
}
