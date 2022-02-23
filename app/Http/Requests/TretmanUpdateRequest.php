<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TretmanUpdateRequest extends FormRequest
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
            'tbNaziv' => 'regex:/^([A-ZŠĐŽĆČa-zđšžćč\d\s]{1,}){1,}$/',
//            'tbNaziv' => 'regex:/^[\w\d]{2,}(\s[\w\d]+)*$/',
            'taTekst' => 'regex:/^([A-ZŠĐŽĆČa-zđšžćč\d\s\.\:"\!\?\`\s\_\-\/\,\*\+(\)]{1,}){1,}$/',
            'fSlika' => 'mimes:jpeg,jpg,bmp,png,gif,JPEG,JPG,BMP,PNG|file'
        ];
    }

    public function messages()
    {
        return [
            'tbNaziv.regex' => 'Naziv tretmana nije dobrog formata!',
            'taTekst.regex' => 'Tekst nije dobrog formata!',
            'fSlika.mimes' => 'Slika nije dobrog formata!'
        ];
    }
}
