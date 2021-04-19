<?php

namespace App\Http\Requests\Auteur;

use App\Models\Auteur;

class UpdateAuteurRequest extends AuteurRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $auteur = $this->route('auteur');//Auteur::where('uuid', $this->route('auteur'))->first();
        return $auteur && $this->user()->can('auteur-update', $auteur);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Auteur::updateRules($this->auteur);
    }
}
