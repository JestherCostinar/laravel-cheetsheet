<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
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
        $rules = [
            'title' => 'required|max:255|unique:posts,title,' . $this->id,
            'excerpt' => 'required',
            'body' => 'required',
            'image' => ['mimes:png,jpg,jpeg', 'max:5048'],
            'min_to_read' => 'min:0|max:60'
        ];
        
        if (in_array($this->method(), ['POST'])) {
            $rules['image'] = ['required', 'mimes:png,jpg,jpeg', 'max:5048'];
        }

        return $rules;
    }
}
