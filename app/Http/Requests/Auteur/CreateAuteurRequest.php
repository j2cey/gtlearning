<?php

namespace App\Http\Requests\Auteur;

use App\Models\Auteur;

class CreateAuteurRequest extends AuteurRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('auteur-create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Auteur::createRules();
    }
}
