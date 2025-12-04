<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaceRequest extends FormRequest
{
    /**
     * Определите, имеет ли пользователь право сделать этот запрос.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Получите правила проверки, применяемые к запросу.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'hall_id' => ['required', 'integer'],
            'row' => ['required', 'integer'],
            'place' => ['required', 'integer'],
            'status' => ['required', 'string'],
            'price' => ['required', 'decimal']
        ];
    }

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(
            response($validator->errors(), Response::P_UNPROCESSABLE_ENTITY)
        );
    }
}
