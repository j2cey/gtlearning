<?php

namespace App\Http\Requests\Cours;

use App\Models\Cours;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCoursRequest extends CoursRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $cour = $this->route('cour');//Cours::where('uuid',$this->route('cour'))->first();
        return $cour && $this->user()->can('cours-update', $cour);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Cours::updateRules($this->cour);
    }
}
