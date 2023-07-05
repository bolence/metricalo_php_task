<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class BlogCreatePost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'blog_title' => 'required|max:120',
            'blog_slug'  => 'max:150',
            'blog_text'  => 'required',
            'user_id'    => 'required',
        ];
    }

    /**
     * Error messages
     *
     * @return array
     */
    public function messages(): array
    {

        return [
            'blog_title.required' => '',
            'blog_slug.max' => '',
            'blog_text.required' => '',
        ];
    }
}
