<?php

namespace Intranet\Http\Requests\Panel;

use Illuminate\Foundation\Http\FormRequest;
use Intranet\Models\Panel\Vacaciones;

class UpdateVacacionesRequest extends FormRequest
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
        return Vacaciones::$rules;
    }
}
