<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ZakazaniRequest extends FormRequest
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
            'ime'=>'required|regex:/^[A-Z][a-z]{2,}(\s[\w]+)*$/',
            'prezime'=>'required|regex:/^[A-Z][a-z]{2,}(\s[\w]+)*$/',
            'email'=>'required|email',
            'datum'=>'required|date',
            'brTel' => 'required',
            'ddlTretman' => 'required|not_in:0',
            'ddlTermini' => 'required|not_in:0'
        ];
    }

    public function messages()
    {
        return [
            'ime.required' => 'Unesite ime!',
            'ime.regex' => 'Ime nije dobrog formata, mora sadržati najmanje tri slova!',
            'prezime.required' => 'Unesite prezime!',
            'prezime.regex'=>'Prezime nije dobrog formata, mora sadržati najmanje tri slova!',
            'email.required'=>'Unesite email!',
            'email.email'=>'Email mora biti u formatu email-a!',
            'datum.required' => 'Odaberite datum!',
            'brTel.required' => 'Unesite broj telefona!',
            'ddlTretman.not_in' => 'Morate odabrati tretman!',
            'ddlTermini.not_in' => 'Morate odabrati termin!'
        ];
    }
}
