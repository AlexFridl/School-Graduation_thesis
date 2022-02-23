<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TipTretmanaRequest extends FormRequest
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
            'tbNazivTipTretmana' => 'required|regex:/^([A-ZŠĐŽĆČa-zđšžćč\d\s]{1,}){1,}$/'
//                        'tbNazivTipTretmana' => 'required|regex:/^[A-Z][a-z]{2,}(\s[\w\d]+)*$/'
        ];
    }
    public function messages()
    {
        return [
            'tbNazivTipTretmana.required' => 'Unesite naziv tipa tretmana!',
            'tbNazivTipTretmana.regex' => 'Ime nije dobrog formata, mora sadrzati najmanje tri slova!'
        ];
    }
}
