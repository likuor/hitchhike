<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpotRequest extends FormRequest
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
            'title' => 'required|max:50',
            'body' => 'required|max:400',
            'latitude' => 'max:30',
            'longitude' => 'max:30',
            'prefecture' => 'required|max:10',
            'city' => 'max:30',
            'street' => 'max:30',
            'image_file_name.*.photo' => 'file|image|mimes:jpeg,png',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'タイトル',
            'body' => '本文',
            'image_file_name' => '画像'
        ];
    }
}
