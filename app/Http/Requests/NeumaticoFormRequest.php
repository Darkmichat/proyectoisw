<?php

namespace Proyectox\Http\Requests;

use Proyectox\Http\Requests\Request;

class NeumaticoFormRequest extends Request
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
            'marca'=>'required|max:10',
            'modelo'=>'required|max:50',
            'aro'=>'required|max:50',
            'presion'=>'required|max:20',
            'kilometraje'=>'required|max:20',

        ];
    }
}