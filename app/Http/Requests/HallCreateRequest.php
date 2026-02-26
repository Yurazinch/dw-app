<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class HallCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'name' => Str::lower($this->name),
        ]);
    }

    /**     
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'unique:halls,name', 'min:3', 'max:20']
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Имя обязательно для заполнения',
            'name.string' => 'Должна быть строка',
            'name.unique' => 'Зал с таким именем уже есть',
            'name.min' => 'В имени должно быть не менее трёх символов',
            'name.max' => 'В имени должно быть не более 20 символов',
        ];
    }
}
