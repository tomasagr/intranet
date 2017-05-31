<?php

namespace Intranet\Http\Requests\API;

use Intranet\Models\UsuarioTema;
use InfyOm\Generator\Request\APIRequest;

class CreateUsuarioTemaAPIRequest extends APIRequest
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
        return UsuarioTema::$rules;
    }
}
