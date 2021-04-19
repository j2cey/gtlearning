<?php

namespace App\Http\Requests\Chapitre;

use App\Models\Chapitre;
use Illuminate\Foundation\Http\FormRequest;

class ChapitreRequest extends FormRequest
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
        return Chapitre::defaultRules();
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return Chapitre::messagesRules();
    }
}
