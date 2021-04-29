<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'matricule' => 'required|unique:agents',
            'nom' => 'required',
            'prenom'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'matricule.required' => 'le matricule est obligatoire',
            'matricule.unique' =>"l'agent existe déja",
            'nom.required'=>'le nom est obligatoire',
            'prenom.required'=>'le prenom est obligatoire'
        ];
    }
}
