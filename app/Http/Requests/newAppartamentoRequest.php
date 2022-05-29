<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class newAppartamentoRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        // Nella form non mettiamo restrizioni d'uso su base utente
        // Gestiamo l'autorizzazione ad un altro livello
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'superficie' => 'sometimes|numeric|min:0|nullable',
            'loc_ricr' => 'sometimes|integer|max:1',
            'npostiletto' => 'sometimes|required|integer',
            'ncamere'=>'sometimes|required|integer',
            'nbagni'=>'sometimes|required|integer',
            'cucina' => 'sometimes|required|integer|max:1',
            'terrazzo' => 'sometimes|required|integer|max:1',
        ];
    }

}
