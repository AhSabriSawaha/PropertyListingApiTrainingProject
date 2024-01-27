<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePropertyRequest extends FormRequest
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
            'address' => [$this->isPostRequest(), 'max:255'],
            'listing_type' => ['required'],
            'city' => [$this->isPostRequest()],
            'zip_code' => [$this->isPostRequest()],
            'description' => ['required'],
            'build_year' => ['required'],
            'price' => ['required'],
            'berdrooms' => ['required'],
            'bathrooms' => ['required'],
            'sqft' => ['required'],
            'price_sqft' => ['required'],
            'property_type' => ['required'],
            'status' => ['required'],
        ];
    }
    private function isPostRequest() {
        return request()->isMethod('post') ? 'required' : 'sometimes';
    }
}
