<?php

namespace App\Http\Requests\UsersController;

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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'role_id' => 'required|integer|exists:roles,id',
            'confirmed' => 'nullable'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Введите имя',
            'name.string' => 'Имя должно быть строкой',
            'email.required' => 'Введите email',
            'email.email' => 'Неверный тип email',
            'email.unique' => 'Пользователь с таким email уже сущесвует',
            'password.required' => 'Введите пароль',
            'password.string' => 'Пароль должен быть строкой',
            'password.min' => 'Пароль должен состоять как минимум из 8 символов',
            'role_id.required' => 'Выберите роль',
            'role_id.integer' => 'Роль должна быть числом',
            'role_id.exists' => 'Указанной роли не существует'
        ];
    }
}
