<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class FilmCreateRequest extends FormRequest
{    
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'name' => Str::title($this->name),
        ]);
    }

    /**     
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'unique:films,name', 'min:3', 'max:50'],
            'description' => ['required', 'string', 'min:20', 'max:200'],
            'duration' => ['required', 'integer', 'gt:0'],
            'country' => ['required', 'string', 'min:3', 'max:50'],
            'poster' => ['required', 'image'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Имя обязательно для заполнения',
            'name.string' => 'Должна быть строка',
            'name.unique' => 'Фильм с таким именем уже есть',
            'name.min' => 'В имени должно быть не менее трёх символов',
            'name.max' => 'В имени должно быть не более 50 символов',
            'description.required' => 'Описание не должно быть пустым',
            'description.string' => 'Должна быть строка',
            'description.min' => 'В описании должно быть не меньше 20 символов',
            'description.max' => 'В описании должно быть не более 200 символов',
            'duration.required' => 'Продолжительность фильма в минутах обязательна',
            'duration.integer' => 'Продолжительность должна быть целым числом в минутах',
            'duration.gt' => 'Продолжительность должна быть больше 0',
            'country.required' => 'Поле не должно быть пустым',
            'country.string' => 'Должна быть строка',
            'country.min' => 'В названии страны должно быть не менее трёх символов',
            'country.max' => 'В названии страны должно быть не более 50 символов',
            'poster.required' => 'Добавьте постер фильма',
            'poster.image' => 'Постер должен быть изображением в формате jpg, jpeg, png',
        ];
    }
}
