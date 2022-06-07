<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FilterRequest extends FormRequest
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
            'citta' => 'nullable|sometimes|max:40',
            'eta_minima' => 'nullable|sometimes|numeric|min:18',
            'ciaone' => 'nullable|sometimes',
            'data_inizio_locazione' => 'nullable|sometimes',
            'tipologia' => 'nullable|sometimes|max:1|min:1',
            'fascia_prezzo' => 'nullable|sometimes',
            'ncamere'=>'nullable|sometimes|numeric',
            'sesso'=>'nullable|sometimes|max:1',
            'superficie' =>'nullable|sometimes|numeric',
            'nbagni'=>'nullable|sometimes|numeric',
            'terrazzo'=>'nullable|sometimes|numeric|max:1|min:1',
            'doppia' => 'nullable|sometimes|numeric',
            'luogo_studio'=> 'nullable|sometimes|numeric',
            'finestra'=>'nullable|sometimes|numeric|max:1|min:1',
            'nposti_letto'=>'nullable|sometimes|numeric',
            'superficie_posto_letto'=>'nullable|sometimes|numeric|min:1|max:100',
            'locale_ricreativo' => 'nullable|sometimes|numeric|max:1|min:1'
        ];
    }
}
