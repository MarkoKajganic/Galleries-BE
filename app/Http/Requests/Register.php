<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class Register extends FormRequest
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
        return [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed|regex:/\w*[0-9]{1,}\w*/',
            'accepted_terms' => 'required'
        ];
    }
}
?>
