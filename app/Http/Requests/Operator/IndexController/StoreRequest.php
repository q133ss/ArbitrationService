<?php

namespace App\Http\Requests\Operator\IndexController;

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
            'offer_id' => [
                'required',
                'integer',
                'exists:offers,id'
            ],
            'master_id' => 'required|integer|exists:users,id',
            'phone' => 'required|string',
            'name' => 'nullable|string',
            'city' => 'nullable|string'
        ];
    }

    public function messages(): array
    {
        return [
            'offer_id.required' => 'Укажите оффер',
            'offer_id.integer' => 'Указан не верный оффер',
            'offer_id.exists' => 'Указанного оффера не сущесвует',

            'master_id.required' => 'Укажите мастера',
            'master_id.integer' => 'Мастер указан не верно',
            'master_id.exists' => 'Указанного мастера не существует',

            'phone.required' => 'Укажите телефон',
            'phone.string' => 'Не верный формат телефона',

            'name.string' => 'Не верно указанно имя',
            'city.string' => 'Не верно указан город'
        ];
    }
}
