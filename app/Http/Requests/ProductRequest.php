<?php

namespace App\Http\Requests;   
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class ProductRequest extends FormRequest
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
    //   dd($this->all('id'));
        return [
            'title' => 'required|min:3',
            'selling_price' => 'nullable|numeric',
            'price' => 'nullable|numeric',
            'category' => 'required|integer',
            'brand' => 'required|integer',
            'qty' => 'required|numeric',
             'slug' => $id
            ? ['nullable', Rule::unique('products', 'slug')->ignore($id)]
            : ['nullable', 'unique:products,slug'],
            // 'slug' => $id ? 'nullable|products', 'slug' : 'nullable|unique:products,slug',
            // 'status' => 'nullable|boolean',
            
            'featured_image' => 'nullable|mimes:png,jpg,jpeg,webp|max:3048',
            'gallery_image.*' => 'nullable|mimes:png,jpg,jpeg,webp|max:3048',
            'short_detail' => 'nullable|string|max:500',
            'long_detail' => 'nullable|string',
            'alert_qty' => 'nullable|numeric',
            'sku' => 'nullable|string|max:100',
            'additional_info' => 'nullable|string|max:500',
            'video_url' => 'nullable|url'
        ];
    }
    // function messages()
    // {
    //     return [
    //         'title.required' => 'The product title is required.',
    //         'category.required' => 'Please select a category.',
    //         'brand.required' => 'Please select a brand.',
    //         'qty.required' => 'The quantity is required.',
    //         'featured_image.mimes' => 'The featured image must be a file of type: png, jpg, jpeg, webp.',
    //         'gallery_image.*.mimes' => 'Each gallery image must be a file of type: png, jpg, jpeg, webp.',
    //     ];
    // }
}
