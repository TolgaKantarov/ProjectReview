<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubmitProjectRequest extends FormRequest
{

    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'description' => 'required',
            'link' => 'required|url',
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
