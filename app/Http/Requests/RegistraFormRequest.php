<?php

namespace Proyectox\Http\Requests;

use Proyectox\Http\Requests\Request;

class RegistraFormRequest extends Request
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
            'id_vehiculo'=>'required',
            'id_neumatico'=>'required',
            'presion'=>'required',
            'kilometraje'=>'required',
            'fecha_revision'=>'protected',
        ];
    }
}
