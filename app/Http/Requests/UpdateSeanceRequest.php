<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSeanceRequest extends FormRequest
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
            'hall' => 'required|string|min:3|max:225',
            'film' => 'required|string|min:3|max:225',
            'start' => ['required', Rule::date()->format("H:i")],
            'width' => 'required|integer|min:0',
        ];
    }
}
