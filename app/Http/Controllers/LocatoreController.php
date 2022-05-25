<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\ElencoFaq;
use App\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\newOfferRequest;
use App\Models\Resources\Offerta;

class LocatoreController extends Controller {

    protected $_locatoreModel;
    protected $_faqModel;
    protected $_userModel;


    public function __construct() {
        $this->middleware('can:isLocatore');
        $this->_faqModel = new ElencoFaq;
        $this->_userModel = new User;

    }

    public function index() {
        $user = 1;
        $elfaq= $this->_faqModel->getAll();
        return view('home')
            ->with('utente', $user)
            ->with('elfaq', $elfaq);
    }

    public function offerteLocatore(){
        $user_id = auth()->user()->username;
        $catalogo_offerte = $this->_userModel->get_offerte_utente($user_id);
        return view('offerta/offertelocatore')
                        ->with('catalogo', $catalogo_offerte);
    }

    public function inserisciofferta(){
        return view('locatore/inserisciofferta');
    }

    public function aggiungiListaOfferte(newOfferRequest $request){

        $offerta = new Offerta;
        $utente = auth()->user();
        $offerta->user_id = $utente->id;
        $offerta->fill($request->validated());
        $offerta->save();

        return redirect()->action('LocatoreController@index');
    }

}

