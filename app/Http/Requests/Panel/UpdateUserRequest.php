<?php

namespace Intranet\Http\Requests\Panel;

use Illuminate\Foundation\Http\FormRequest;
use Intranet\User;

class UpdateUserRequest extends FormRequest
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
            'fullname' => 'required',
            'email' => 'required',
            'bio' => 'required',
            'position' => 'required',
            'rol_id' => 'required',
            'status' => 'required',
            'sector_id' => 'required',
            'unit_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'fullname.required' => 'Nombre requerido',
            'email.required' => 'Email requerido',
            'bio.required' => 'Bio requerida',
            'position.required' => 'Posición requerida',
            'rol_id.required' => 'Rol requerido',
            'status.required' => 'Estado requerido',
            'sector_id.required' => 'Sector requerido',
            'unit_id.required' => 'Unidad requerida'
        ];
    }
}
