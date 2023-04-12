<?php

namespace App\Http\Requests\Login;

use Illuminate\Foundation\Http\FormRequest;

class StoreLoginRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'username' => ['required', 'exists:users'],
            'password' => ['required']
        ];
    }
}
