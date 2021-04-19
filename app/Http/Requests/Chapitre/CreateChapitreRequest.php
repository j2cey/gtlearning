<?php

namespace App\Http\Requests\Chapitre;

use App\Models\Chapitre;
use Illuminate\Foundation\Http\FormRequest;

class CreateChapitreRequest extends ChapitreRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('chapitre-create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Chapitre::createRules();
    }
}
