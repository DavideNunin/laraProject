<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\ElencoFaq;
use App\Models\Resources\Utente;
use App\Models\Resources\Offerta;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\LocatoreController;

class PublicController extends Controller {

    protected $_catalogModel;
    protected $_faqModel;
    protected $_userModel;
    protected $_offertaModel;

    public function __construct() {
        $this->_catalogModel = new Catalog;
        $this->_faqModel = new ElencoFaq;
        $this->_userModel = new Utente;
        $this->_offertaModel = new Offerta;
    }

    public function showHomeUser1() {
        $user = 0;
        $elfaq= $this->_faqModel->getAll();
        return view('home')
            ->with('utente', $user)
            ->with('elfaq', $elfaq);
    }

    ///////////////////////////////////////////////////////////////////////////////////////
    //login function

    public function login() {
        return view('auth/login');

    }

    public function register(){
        return view('registration');
    }

    public function offerte_user_1() {

        //Estraggo il catalogo delle offerte
        $catalogo_offerte = $this->_catalogModel->getAll();
        $user_type = 0;

        return view('offerta/offerte')
                        ->with('catalogo', $catalogo_offerte)
                        ->with('type_user', $user_type);

    }

    public function offerte_user_2() {

        //Estraggo il catalogo delle offerte
        $catalogo_offerte = $this->_catalogModel->getAll();
        $user_type = 1;

        return view('offerta/offerte')
                        ->with('catalogo', $catalogo_offerte)
                        ->with('type_user', $user_type);

    }

    ///////////////////////////////////////////////////////////////////////////////////////////

    //FUNZIONI LOCATARIO

    public function homelocatore(){
        $user = 1;
        $elfaq= $this->_faqModel->getAll();
        return view('home')
            ->with('utente', $user)
            ->with('elfaq', $elfaq);
    }

    public function offerteLocatore(){
        $catalogo_offerte = $this->_userModel->get_offerte_utente();
        $user_type = 1;

        return view('offerta/offertelocatore')
                        ->with('catalogo', $catalogo_offerte)
                        ->with('type_user', $user_type);
    }

    public function offerta_singola($id_offerta){
        // questa fa partire la view singola_locatore o singola_locatario
        // in base all'utente autenticato
        $user_type = 1;
        $offerta = $this->_offertaModel->get_offerta_from_id($id_offerta);
        $utenti_opzione = $this->_userModel->get_offerte_opzionate($id_offerta);

        return view('offerta/singola_locatore')  
                        ->with('offerta', $offerta)
                        ->with('utenti', $utenti_opzione)
                        ->with('type_user', $user_type);
    }

}
