<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'tbNaslovBlog' => 'required|min:3,regex:/^([A-ZŠĐŽĆČa-zđšžćč\d\s]{1,}){1,}$/',
            'tbPodnaslovBlog' => 'required',
            'tbTekstBlog' => 'required|regex:/^([A-ZŠĐŽĆČa-zđšžćč\d\s\.\:"\!\?\`\s\_\-\/\,\\\*\+\\(\)]{1,}){1,}$/',
            'unosSlike' => 'required|mimes:jpeg,jpg,bmp,png,gif,JPEG,JPG,BMP,PNG|file'
        ];
    }

    public function messages()
    {
        return [
            'tbNaslovBlog.required' => 'Unesite naslov!',
            'tbNaslovBlog.min' => 'Naslov mora imati najmanje tri karaktera!',
            'tbPodnaslovBlog.required' => 'Unesite podnaslov!',
            'tbTekstBlog.required' => 'Unesite tekst!',
            'unosSlike.required' => 'Unesite sliku!',
            'unosSlike.mimes'=> 'Slika nije dobrog formata!'

        ];
    }



}
