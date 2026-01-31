<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSeanceRequest extends FormRequest
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
            'seances' => 'array',
            'seances.*.hall' => 'required|string|min:1',
            'seances.*.film' => 'required|string|min:3',
            'seances.*.start' => ['required', Rule::date()->format("H:i")],
            'seances.*.width' => 'required|integer|min:0',
        ];
    }
}
