<?php

namespace Intranet\Http\Requests\Panel;

use Illuminate\Foundation\Http\FormRequest;
use Intranet\Models\Panel\Curiosidades;

class UpdateCuriosidadesRequest extends FormRequest
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
        return Curiosidades::$rules;
    }
}
