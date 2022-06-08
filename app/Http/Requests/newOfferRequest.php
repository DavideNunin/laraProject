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
            'ncivico' => 'required|integer',
            'via' => 'required|max:25|alpha',
            'genereRichiesto' => 'required|max:1',
            'citta'=>'required|max:40|alpha',
            'descrizione' => 'max:700',
            'dataInizioLocazione' => 'required|max:10|date',
            'titolo'=>'required|max:40',
            'tipologia'=>'required|max:1',
            'prezzo' => 'required|numeric|min:0|max:99999999',
            'etaRichiesta' => 'required|integer|min:18',
            
            //campi appartamento
            'superficie' => 'numeric|min:0|nullable|required_if:tipologia,A',
            'loc_ricr' => 'integer|max:1|required_if:tipologia,A',
            'npostiletto' => 'integer|required_if:tipologia,A',
            'ncamere'=>'integer|required_if:tipologia,A',
            'nbagni'=>'integer|required_if:tipologia,A',
            'cucina' => 'integer|max:1|required_if:tipologia,A',
            'terrazzo' => 'integer|max:1|required_if:tipologia,A',

            //campi posto letto
            'superficie_postoletto' => 'numeric|min:0|nullable|required_if:tipologia,P',
            'doppia' => 'integer|max:1|required_if:tipologia,P',
            'luogoStudio' => 'integer|max:1|required_if:tipologia,P',
            'finestra'=>'integer|max:1|required_if:tipologia,P',

            //campi foto
            'nome_file.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000|nullable'
        ];
    }

}
