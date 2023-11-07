<?php

namespace App\Http\Requests\RegisterController;

use Closure;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|string|min:8',
            'role_id' => 'required|integer|exists:roles,id|in:2,3',
            're-password' => [
                'required',
                function(string $attribute, mixed $value, Closure $fail){
                    if($this->password != $value){
                        $fail('Пароли не совпадают');
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

            'email.required' => 'Введите email',
            'email.email' => 'Неверный формат email',

            'password.required' => 'Введите пароль',
            'password.string' => 'Пароль должен быть строкой',
            'password.min' => 'Пароль должен состоять как минимум из 8 символов',

            'role_id.required' => 'Выберите роль',
            'role_id.integer' => 'Не верно указана роль',
            'role_id.exists' => 'Не верно указана роль',
            'role_id.in' => 'Не верно указана роль',

            're-password.required' => 'Повторите пароль'
        ];
    }
}
