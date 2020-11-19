<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            'nombre'         => 'required|string|max:100',
            'email'          => 'required|string|email|max:255|unique:users,email,'.$this->id,
            'password'       => 'required|string|min:8|confirmed',
            'rol'            => 'required|integer|numeric|min:1',
            'tipo_documento' => 'required|string|max:1',
            'num_documento'  => 'required|numeric',
            'direccion'      => 'required|string|max:70',
            'telefono'       => 'required|numeric'
        ];
    }
}
