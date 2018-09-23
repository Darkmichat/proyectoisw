<?php

namespace Proyectox\Http\Requests;

use Proyectox\Http\Requests\Request;

class AsignadoFormRequest extends Request
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
            'rut'=>'required|max:13',
            'id_vehiculo'=>'required',
        ];
    }
}
