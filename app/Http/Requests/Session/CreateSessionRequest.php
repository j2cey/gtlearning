<?php

namespace App\Http\Requests\Session;

use App\Models\Session;

class CreateSessionRequest extends SessionRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('session-create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Session::createRules();
    }
}
