<?php

namespace App\Http\Requests\Master\FinanceController;

use App\Models\UserCard;
use App\Services\CreditCardValidation;
use Closure;
use Illuminate\Foundation\Http\FormRequest;

class AddCardRequest extends FormRequest
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
            'card' => [
                'required',
                function(string $attribute, mixed $value, Closure $fail): void
                {
                    $card = str_replace(' ', '',$value);
                    if(UserCard::where('card', $card)->exists()){
                        $fail('Карта с таким номером уже добавлена');
                    }
                },
                new CreditCardValidation()],
        ];
    }

    public function messages(): array
    {
        return [
            'card.required' => 'Введите номер карты'
        ];
    }
}
