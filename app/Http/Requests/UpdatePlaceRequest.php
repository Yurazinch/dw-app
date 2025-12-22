<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePlaceRequest extends FormRequest
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
            'chairs' => 'array',
            'chairs.*.hall' => 'required|string',
            'chairs.*.row' => 'required|integer',
            'chairs.*.place' => 'required|integer',
            'chairs.*.type' => 'required|string',
            'chairs.*.price' => 'required|decimal:0,2',
        ];
    }
}
