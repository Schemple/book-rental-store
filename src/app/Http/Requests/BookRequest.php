<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'title'=>'required|string|max:255',
            'author'=>'required|string|max:255',
            'category_id'=>'required|integer|exists:categories,id',
            'description'=>'required|string|max:255',
            'price'=>'required|decimal|min:0.01',
            'quantity'=>'required|integer|min:1',
            'image'=> 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }
}
