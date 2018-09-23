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
            'rut'=>'required|max:30',
            'nombre_conductor'=>'required|alpha',
            'email_conductor'=>'required|max:20',
            'telefono'=>'required|max:20',
        ];
    }
}