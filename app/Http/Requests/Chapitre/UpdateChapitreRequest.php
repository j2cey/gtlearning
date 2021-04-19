<?php

namespace App\Http\Requests\Chapitre;

use App\Models\Chapitre;
use Illuminate\Foundation\Http\FormRequest;

class UpdateChapitreRequest extends ChapitreRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $chapitre = $this->route('chapitre');//Chapitre::where('uuid',$this->route('chapitre'))->first();
        return $chapitre && $this->user()->can('chapitre-update', $chapitre);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Chapitre::updateRules($this->chapitre);
    }
}
