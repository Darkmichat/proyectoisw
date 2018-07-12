<?php

namespace Proyectox\Http\Requests;

use Proyectox\Http\Requests\Request;

class ConductorFormRequest extends Request
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
            'rut'=>'required|max:50',
            'nombre_conductor'=>'max:50',
            'email_conductor'=>'max:20',
            'telefono'=>'max:20',
        ];
    }
}