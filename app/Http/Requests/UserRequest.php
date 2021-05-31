<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'image_profile' => 'file|image|mimes:jpeg,png',
            'introduction' => 'max:400',
            'email' => 'required|max:255|email',
        ];
    }

    public function attributes()
    {
        return [
            'image_profile' => 'プロフィール画像',
            'introduction' => '自己紹介',
            'email' => 'Eメール',
        ];
    }
}
