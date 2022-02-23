<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TretmanRequest extends FormRequest
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
            'tbNaziv' => 'unique:tretmans,t_naziv|required|regex:/^([A-ZŠĐŽĆČa-zđšžćč\d\s]{1,}){1,}$/',
//            'tbNaziv' => 'unique:tretmans,t_naziv|required|regex:/^[A-Z][a-z]{2,}(\s[\w\d]+)*$/',
            'taTekst' => 'required|regex:/^([A-ZŠĐŽĆČa-zđšžćč\d\s]{1,}){1,}$/',
            'ddlTipTretmana' => 'required|not_in:0',
            'fSlika' => 'required|mimes:jpeg,jpg,bmp,png,gif,JPEG,JPG,BMP,PNG|file',

        ];
    }
    public function messages()
    {
        return [
            'tbNaziv.unique' => 'Tretman već postoji u bazi!',
            'tbNaziv.required' => 'Unesite naziv tretmana!',
            'tbNaziv.regex' => 'Naziv nije dobrog formata, mora sadrzati najmanje tri slova!',
            'taTekst.required' => 'Tekst je obavezan!',
            'fSlika.required' => 'Unesite sliku!',
            'ddlTipTretmana.not_in' => 'Morate odabrati tip tretmana!'
        ];
    }
}
