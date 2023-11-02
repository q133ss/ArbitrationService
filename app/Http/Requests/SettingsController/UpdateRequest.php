<?php

namespace App\Http\Requests\SettingsController;

use Closure;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'required|string',
            'old_password' => ['nullable', function(string $attribute, mixed $value, Closure $fail): void
            {
                if(!Hash::check($value, Auth()->user()->password)){
                    $fail('Неверный пароль');
                }
            }],
            'new_password' => ['nullable','min:8', function(string $attribute, mixed $value, Closure $fail): void
            {
                if($this->old_password != null && $value == null){
                    $fail('Введите новый пароль');
                }elseif($this->old_password == null && $value != null){
                    $fail('Введите старый пароль');
                }
            }]
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Введите имя',
            'name.string' => 'Имя должно быть строкой',

            'new_password.min' => 'Пароль должен содержать не менее 8 символов'
        ];
    }
}
