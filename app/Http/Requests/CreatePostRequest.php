<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
            //
            'subject' => 'required|unique:posts|max:255',
            'intro' => 'required|max:255',
            'description.content' => 'required|max:255'
        ];
    }

    public function messages()
    {
    return [
        'subject.required' => 'A subject is required',
        'intro.required'  => 'A introduction is required',
        'description.content.required' => 'A description is required'
    ];
    }
}
