<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\ElencoFaq;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\LocatoreController;

class PublicController extends Controller {

    protected $_catalogModel;
    protected $_faqModel;

    public function __construct() {
        $this->_catalogModel = new Catalog;
        $this->_faqModel = new ElencoFaq;
    }

    public function showHomeUser1() {
        $user = 0;
        $elfaq= $this->_faqModel->getAll();
        return view('home')
            ->with('utente', $user)
            ->with('elfaq', $elfaq);
    }

    public function login() {
        return view('login');

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
        return view('home')
            ->with('utente', $user);
    }

}
