<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\LocatoreController;

class PublicController extends Controller {

    protected $_catalogModel;

    public function __construct() {
        $this->_catalogModel = new Catalog;
    }

    public function showHomeUser1() {
        $user = 0;
        return view('home')
            ->with('utente', $user);

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
        return view('home')
            ->with('utente', $user);
    }

    public function offerteLocatore(){
        $catalogo_offerte = $this->_catalogModel->getAll();
        $user_type = 1;

        return view('offerte')
                        ->with('catalogo', $catalogo_offerte)
                        ->with('type_user', $user_type);
    }

}