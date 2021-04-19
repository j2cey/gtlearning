<?php

namespace App\Http\Requests\Cours;

use App\Models\Cours;
use Illuminate\Foundation\Http\FormRequest;

class CreateCoursRequest extends CoursRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('cours-create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Cours::createRules();
    }
}
