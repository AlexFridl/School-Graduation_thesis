<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlajderUpdateRequest extends FormRequest
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
            'tbNaslov'=>'regex:/^[\w\d]{2,}(\s[\w\d]+)*$/',
            'fSlika'=>'mimes:jpeg,jpg,bmp,png,gif,JPEG,JPG,BMP,PNG|file'
        ];
    }

    public function messages()
    {
        return [
            'tbNaslov.regex' => 'Naslov slike nije dobrog formata!',
            'fSlika' => 'Slika nije dobrog formata!'
        ];
    }
}
