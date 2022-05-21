<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\ElencoFaq;
use App\User;
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
        $this->_userModel = new User;
        $this->_offertaModel = new Offerta;
    }

    public function showHomeUser1() {
        $user = 0;
        $elfaq= $this->_faqModel->getAll();
        return view('home')
            ->with('utente', $user)
            ->with('elfaq', $elfaq);
    }

    public function login() {
        return view('auth/login');

    }

    public function register(){
        return view('registration');
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

}
