<?php

namespace App\Http\Requests\Admin\NumbersController;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNumberRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'offer_id' => 'required|exists:users,id'
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.exists' => 'Указанного пользователя не существует',
            'user_id.required' => 'Укажите пользователя',
            'offer_id.exists' => 'Указанного оффера не существует',
            'offer_id.required' => 'Укажите оффер'
        ];
    }
}
