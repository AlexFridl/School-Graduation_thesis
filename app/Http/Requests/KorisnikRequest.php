<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KorisnikRequest extends FormRequest
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

            'tbKorIme' => 'required|regex:/^[A-Z][a-z]{2,}(\s[\w\d]+)*$/|unique:korisniks,korisnicko_ime',
            'tbLozinka' => 'required|regex:/^[\S]{4,10}$/',
            'ddlUloga' => 'required|not_in:0'
        ];
    }
    public function messages()
    {
        return [
            'tbKorIme.required' => 'Korisničko ime je obavezno!',
            'tbKorIme.regex' => 'Korisničko ime nije dobrog formata, mora sadrzati najmanje tri slova!',
            'tbKorIme.unique' => 'Ovo korisničko ime već postoji, mora biti jedinstveno!',
            'tbLozinka.required' => 'Lozinka je obavezna!',
            'tbLozinka.regex' => 'Lozinka mora imati od cetiri do deset karaktera!',
            'ddlUloga.required' => 'Odabrati ulogu!',
            'ddlUloga.not_in' => 'Morate odabrati ulogu!'

        ];
    }
}
