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
            'nbagni'=>'nullable|sometimes|numric',
            'terrazzo'=>'nullable|sometimes|numeric|max:1|min:1',
            'doppia' => 'nullable|sometimes|numeric',
            'luogo_studio'=> 'nullable|sometimes|numeric',
            'finestra'=>'nullable|sometimes|numeric|max:1|min:1',
            'nposti_letto'=>'nullable|sometimes|numeric',
            'locale_ricreativo' => 'nullable|sometimes|numeric|max:1|min:1'
        ];
    }
}
