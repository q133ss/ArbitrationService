<?php

namespace App\Http\Requests\Operator\LeadController;

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
            'offer_id' => 'required|exists:offers,id',
            'master_id' => 'required|exists:users,id',
            'phone' => 'nullable',
            'name' => 'nullable',
            'city' => 'nullable'
        ];
    }

    public function messages(): array
    {
        return [
            'offer_id.required' => 'Укажите оффер',
            'offer_id.exists' => 'Указанного оффера не существует',

            'master_id.required' => 'Укажите мастера',
            'master_id.exists' => 'Указанного мастера не существует'
        ];
    }
}
