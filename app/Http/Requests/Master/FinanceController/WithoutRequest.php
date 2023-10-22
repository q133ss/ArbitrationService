<?php

namespace App\Http\Requests\Master\FinanceController;

use Closure;
use Illuminate\Foundation\Http\FormRequest;

class WithoutRequest extends FormRequest
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
            'card_id' => 'required|exists:user_cards,id',
            'sum' => [
                'required',
                'integer',
                'min:1000',
                function(string $attribute, mixed $value, Closure $fail){
                    if(Auth()->user()->balance - $value < 0){
                        $fail('На балансе не достаточно средств');
                    }
                }
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'card_id.required' => 'Укажите карту',
            'card_id.exists' => 'Указана не вернная карта',
            'sum.required' => 'Введите сумму',
            'sum.integer' => 'Сумма должна быть числом',
            'sum.min' => 'Минимальная сумма 1000 руб'
        ];
    }
}
