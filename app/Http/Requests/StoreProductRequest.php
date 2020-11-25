<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'store_id' => 'required|exists:stores,id',
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|between:4,100',
            'short_description' => 'between:10,255',
            'description' => 'required|min:10',
            'price' => 'required|numeric',
            'on_layaway' => 'sometimes|boolean',
            'comment' => 'max:255',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'category_id.required' => 'You must select a category.',
            'name.required' => 'Product name is required.',
            'name.between' => 'Product name must be between :min and :max characters.',
            'short_description.between' => 'Short description must be between :min and :max characters.',
            'description.min' => 'Description must be at least :min characters.',
            'comment.max' => 'Comment can be a maximum of :max characters.',
        ];
    }
}
