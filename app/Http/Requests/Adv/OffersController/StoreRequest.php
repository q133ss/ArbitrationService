<?php

namespace App\Http\Requests\Adv\OffersController;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|string',
            'except' => 'required|string',
            'description' => 'required|string',
            'target' => 'required|string|max:255',
            'price' => 'required|integer',
            'hold' => 'required|string',
            'vector' => 'required|string'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Введите имя',
            'name.string' => 'Имя должно быть строкой',

            'except.required' => 'Введите краткое описание',
            'except.string' => 'Краткое описание должно быть строкой',

            'description.required' => 'Введите описание',
            'description.string' => 'Описание должно быть строкой',

            'target.required' => 'Введите цель',
            'target.string' => 'Цель должна быть строкой',
            'target.max' => 'Цель не должна содержать больше 255 символов',

            'price.required' => 'Введите вознаграждение',
            'price.integer' => 'Вознаграждение должно быть числом',

            'hold.required' => 'Введите холд',
            'hold.string' => 'Холд должен быть строкой',

            'vector.required' => 'Введите направление',
            'vector.string' => 'Направление должно быть строкой'
        ];
    }
}
