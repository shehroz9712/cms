<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialsRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'file|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|integer|in:0,1',
            'platform_id' => 'required|integer',
            'order' => 'required|integer',
        ];
    }
}
