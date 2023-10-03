<?php

namespace App\Http\Requests\Adv\OfferController;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'string|max:255',
            'city' => 'string|max:255',
            'status' => 'in:hold,accept,cancel'
        ];
    }

    public function messages(): array
    {
        return [
            'name.string' => 'Имя должно быть строкой',
            'name.max' => 'Имя не должно быть больше 255 символов',

            'city.string' => 'Город должен быть строкой',
            'city.max' => 'Город не должен быть больше 255 символов',

            'status.in' => 'Указан не верный статус'
        ];
    }
}
