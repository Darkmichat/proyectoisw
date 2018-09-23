<?php

namespace Proyectox\Http\Requests;

use Proyectox\Http\Requests\Request;

class VehiculoFormRequest extends Request
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
            'patente'=>'required|max:7',
            'marca'=>'required|max:50',
            'tipo'=>'required|max:50',
            'modelo'=>'required|max:20',
        ];
    }
}
