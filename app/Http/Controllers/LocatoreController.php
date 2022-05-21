<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\ElencoFaq;
use App\Models\Resources\Utente;
use Illuminate\Support\Facades\Log;

class LocatoreController extends Controller {

    protected $_locatoreModel;
    protected $_faqModel;
    protected $_userModel;


    public function __construct() {
        $this->middleware('can:isLocatore');
        $this->_faqModel = new ElencoFaq;
        $this->_userModel = new Utente;

    }

    public function index() {
        $user = 1;
        $elfaq= $this->_faqModel->getAll();
        return view('home')
            ->with('utente', $user)
            ->with('elfaq', $elfaq);
    }

    public function showViewLocatore(){
        $user = 1;
        return view('home')
            ->with('utente', $user); 
    }

    public function offerteLocatore(){
        $catalogo_offerte = $this->_userModel->get_offerte_utente();
        $user_type = 1;

        return view('offerta/offertelocatore')
                        ->with('catalogo', $catalogo_offerte)
                        ->with('type_user', $user_type);
    }

}