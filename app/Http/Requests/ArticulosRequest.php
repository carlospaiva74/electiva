<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticulosRequest extends FormRequest
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
            'articulo'     => 'required|string|max:100',
            'codigo'       => 'required|string|max:50|unique:articulos_54,codigo,'.$this->id,
            'categoria'    => 'required|integer|numeric|min:1',
            'precio_venta' => 'required',
            'stock'        => 'required|integer|numeric|min:1',           
            'descripcion'  => 'required|string|max:256',
        ];
    }
}
