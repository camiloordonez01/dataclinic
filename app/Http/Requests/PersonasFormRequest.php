<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonasFormRequest extends FormRequest
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
            'nombres' => 'required|max:255',
            'apellidos' => 'required|max:255',
            'tipo_documento' => 'required|max:45',
            'documento' => 'required|max:45',
            'fecha_nacimiento' => 'required|max:45',
            'telefono' => 'required|max:45',
            'celular' => 'required|max:45',
            'correo' => 'required|max:120',
            'genero' => 'required|max:1'
        ];
    }
}
