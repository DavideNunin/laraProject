<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class newModifyDataRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Nella form non mettiamo restrizioni d'uso su base utente
        // Gestiamo l'autorizzazione ad un altro livello
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
            'nome'=> 'sometimes',
            'cognome'=> 'sometimes',
            'username' => 'sometimes',
            'data_nascita' => 'sometimes',
            'sesso' => 'sometimes',
            'telefono' => 'sometimes',
            'old_password' => 'required|password',
            'password' => 'sometimes|required_with:conferma_password|same:conferma_password',
            'conferma_password' => 'sometimes|required_with:password|same:password'
        ];
    }
    public function messages(){
            return [
            'old_password.password' => 'wrong password'
                                    ];
    }
}
