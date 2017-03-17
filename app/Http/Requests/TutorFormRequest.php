<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TutorFormRequest extends Request
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
            'rut'=>'required|max:20',
            'nombre'=>'required|max:100',
            'apellidos'=>'required|max:20',
            'telefono'=>'required|max:15',
            'email'=>'required|max:50',        ];
    }
}
