<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2', Rule::unique('products')->ignore($this->product, 'name')],
            'marketing_price' => ['nullable', 'numeric', 'gte:0'],
            'sale_price' => ['required', 'numeric', 'lt:marketing_price'],
            'in_stock' => ['nullable', 'numeric', 'gte:0'],
            'category_id' => ['required', 'string', 'exists:categories,id'],
            'short_description' => ['required', 'string'],
            'long_description' => ['required', 'string'],
            'tags' => ['nullable', 'array'],
            'main_image_path' => [Route::is('admin.products.store') ? 'required' : 'nullable','file', 'mimes:png,jpg,jpeg'],
            'images.*' => ['required'],
            'images.*.path' => ['required','mimes:png,jpg,jpeg',],// dimensions 500 x 500
        ];
    }

    public function messages() {
        return [
            'images.*.path.required' => 'Ce champ est requis',
        ];
    }
}
