<?php

namespace App\Http\Requests;   
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class BannerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
          
      $id = $this->id; 
        return [
            'title' => 'required|min:3',   
            'discount' => 'nullable|string',
            'banner_image' => 'required|mimes:png,jpg,jpeg,webp|max:3048',
            'decription' => 'nullable|string',
            'quick_link' => 'nullable|url',

        ];
    }
    function messages()
    {
        return [
            'title.required' => 'The product title is required.',
            'banner_image.mimes' => 'Each gallery image must be a file of type: png, jpg, jpeg, webp.',
        ];
    }
}
