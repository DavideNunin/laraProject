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
            'nome'=> 'required',
            'cognome'=> 'required',
            'username' => 'required',
            'data_nascita' => 'required',
            'sesso' => 'required',
            'numero_di_telefono' => 'required',
            'password' => 'required',
            'conforma_password' => 'required'

        ];
    }
}
