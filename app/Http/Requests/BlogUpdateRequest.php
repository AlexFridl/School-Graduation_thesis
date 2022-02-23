<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogUpdateRequest extends FormRequest
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
//            'tbNaslovBlog' => 'regex:/^[A-Z a-z]{2,}(\s[\w\d]+)*$/',
            'tbNaslovBlog' => 'regex:/^([A-ZŠĐŽĆČa-zđšžćč\d\s]{1,}){1,}$/',
            'tbTekstBlog' => 'regex:/^([A-ZŠĐŽĆČa-zđšžćč\d\s\.\:"\!\?\`\s\_\-\/\,\\\*\+\\(\)]{1,}){1,}$/',
            'unosSlike' => 'mimes:jpeg,jpg,bmp,png,gif,JPEG,JPG,BMP,PNG|file'

        ];
    }

    public function messages()
    {
        return [
            'tbNaslovBlog.regex' => 'Naslov nije dobrog formata!',
            'tbTekstBlog.regex' => 'Tekst nije dobrog formata',
            'unosSlike.mimes' => 'Slika nije dobrog formata!'
        ];
    }
}
