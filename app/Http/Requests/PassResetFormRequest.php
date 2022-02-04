<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PassResetFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'current_password' => 'required|password',
            'new_password' => 'required|min:8',
            'new_confirm_password' => 'required|same:new_password'
        ];
    }
    public function messages()
    {
        return [
            'new_password.min' =>'La contraseña debe tener como minimo :min caracteres.',
            'new_confirm_password.same' => 'Las contraseñas no coinciden'
        ];
    }
}
