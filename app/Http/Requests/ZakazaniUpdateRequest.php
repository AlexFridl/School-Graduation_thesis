<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ZakazaniUpdateRequest extends FormRequest
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
            'ime'=>'regex:/^[A-Z][a-z]{2,}(\s[\w]+)*$/',
            'prezime'=>'regex:/^[A-Z][a-z]{2,}(\s[\w]+)*$/',
            'email'=>'email',
            'datum'=>'date',
            'brTel' => 'required',
            'ddlTretman' => 'not_in:0',
            'ddlTermini' => 'not_in:0'
        ];
    }

    public function messages()
    {
        return [

            'ime.regex' => 'Ime nije dobrog formata, mora sadržati najmanje tri slova!',
            'prezime.regex'=>'Prezime nije dobrog formata, mora sadržati najmanje tri slova!',
            'email.email'=>'Email mora biti u formatu email-a!',
            'brTel.required' => 'Unesite broj telefona!',
            'ddlTretman.not_in' => 'Morate odabrati tretman!',
            'ddlTermini.not_in' => 'Morate odabrati termin!'
        ];
    }
}
