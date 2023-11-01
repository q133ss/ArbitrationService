<?php

namespace App\Http\Requests\Master\LeadsController;

use Closure;
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
                function(string $attribute, mixed $value, Closure $fail): void
                {
                    $offers = Auth()->user()->acceptedOffers;
                    if($offers->where('id', $value)->isEmpty()){
                        $fail('Указан не верный оффер');
                    }
                }
            ],
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

            'phone.required' => 'Укажите телефон',
            'phone.string' => 'Не верный формат телефона',

            'name.string' => 'Не верно указанно имя',
            'city.string' => 'Не верно указан город'
        ];
    }
}
