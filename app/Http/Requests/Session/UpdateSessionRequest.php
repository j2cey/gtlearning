<?php

namespace App\Http\Requests\Session;

use App\Models\Session;

class UpdateSessionRequest extends SessionRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $session = $this->route('session'); // Session::where('uuid',$this->route('session'))->first();
        //dd($session, $this->route('session'));
        return $session && $this->user()->can('session-update', $session);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Session::updateRules($this->session);
    }
}
