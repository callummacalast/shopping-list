<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShoppingItemRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'shopping_list_id' => 'required',
            'name' => 'required|max:255',
            'quantity' => 'required|numeric',
            'price' => 'nullable|numeric',
            'purchased' => 'boolean'
        ];
    }


    public function messages(): array
    {
        return [
            'name.required' => 'You forgot your item',
            'name.unique' => 'You already have this on your list!'
        ];
    }
}
