<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\ElencoFaq;
use App\Models\Resources\Utente;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\LocatoreController;

class PublicController extends Controller {

    protected $_catalogModel;
    protected $_faqModel;
    protected $_userModel;

    public function __construct() {
        $this->_catalogModel = new Catalog;
        $this->_faqModel = new ElencoFaq;
        $this->_userModel = new Utente;
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
        $user_type = 1;

        return view('offerte')
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

    public function offerte_user_2(){
        $catalogo_offerte = $this->_userModel->get_offerte_utente();
        $user_type = 1;

        return view('offertelocatore')
                        ->with('catalogo', $catalogo_offerte)
                        ->with('type_user', $user_type);
    }
}
