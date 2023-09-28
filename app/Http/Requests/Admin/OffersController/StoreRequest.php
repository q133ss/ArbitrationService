<?php

namespace App\Http\Requests\Admin\OffersController;

use App\Models\User;
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
            'name' => 'required|string',
            'except' => 'required|string',
            'description' => 'required|string',
            'target' => 'required|string|max:255',
            'price' => 'required|integer',
            'advertiser_id' => [
                'required',
                'integer',
                'exists:users,id',
                function(string $attribute, mixed $value, Closure $fail): void
                {
                    if(User::find($value)->role->tech_name != 'advertiser'){
                        $fail('Данный пользователь не является рекламодателем');
                    }
                }
            ]
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

            'advertiser_id.required' => 'Укажите рекламодателя',
            'advertiser_id.integer' => 'Поле рекламодатель должно быть числом',
            'advertiser_id.exists' => 'Указанного рекламодателя не существует'
        ];
    }
}
