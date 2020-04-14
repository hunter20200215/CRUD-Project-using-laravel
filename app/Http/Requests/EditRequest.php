<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
            'subject' => 'required|max:255',
                //  [
                // 'required',
                // Rule::unique('posts')->ignore($post->id),
                // 'max:255'],
            'intro' => 'required|max:255',
            'description.content' => 'required|max:255'
        ];
    }

    public function messages()
    {
    return [
        'subject.required' => 'This subject is required',
        'intro.required'  => 'This introduction is required',
        'description.required' => 'This description is required'
    ];
    }
}
