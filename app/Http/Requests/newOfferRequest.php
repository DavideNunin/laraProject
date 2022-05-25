<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class newOfferRequest extends FormRequest {

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
            'ncivico' => 'required',
            'via' => 'required|max:25',
            'genereRichiesto' => 'required|max:1',
            'citta'=>'required|max:15',
            'descrizione' => 'required|max:50',
            'periodo' => 'required| max:10',
            'titolo'=>'required|max:20',
            'tipologia'=>'required|max:1',
            'prezzo' => 'required|numeric|min:0',
            'etaRichiesta' => 'required|integer|min:18'
        ];
    }

}
