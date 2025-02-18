<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $failIfExist = function ($failAttribute) {
            return function ($attribute, $value, $fail) use ($failAttribute) {
                if ($attribute == $failAttribute) {  // Проверяем, что поле есть в запросе
                    $fail($attribute.' не должно присутствовать в запросе.');
                }
            };
        };
        return [
            'Id' => [$failIfExist('Id')],
            'Email' => [$failIfExist('Email')],
            'Name' => 'required|string',
            'RefID' => [$failIfExist('RefID')],
            'TelegramID' => [$failIfExist('TelegramID')],
            'is_admin' => [$failIfExist('is_admin')],
            'JoinTime' => [$failIfExist('JoinTime')],
            'BalanceUSDT' => [$failIfExist('BalanceUSDT')],
        ];
    }
}
