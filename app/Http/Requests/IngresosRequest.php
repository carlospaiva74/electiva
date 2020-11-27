<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IngresosRequest extends FormRequest
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
            'proveedor' => 'required|integer|numeric|min:1',
            'tipo'      => 'required|string|max:20',
            'serie'     => 'required|integer|numeric|max:9999999',
            'numero'    => 'required|integer|numeric|max:9999999999',
            'id'        => 'required|array',
            'compra'    => 'required|array',
            'venta'     => 'required|array',
        ];
    }
}
