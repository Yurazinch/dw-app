<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeanceRequest extends FormRequest
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
            'film_id' => ['required', 'integer'],
            'start' => ['required', 'time'],            
        ];
    }

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(
            response($validator->errors(), Response::P_UNPROCESSABLE_ENTITY)
        );
    }
}
