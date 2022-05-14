<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Support\Facades\Log;

class PublicController extends Controller {

    protected $_catalogModel;

    public function __construct() {
        $this->_catalogModel = new Catalog;
    }

    public function showHomeUser1() {

        //Categorie Top
        //$topCats = 'prima PAROLA MAGICA';

        return view('home');

    }

    public function showCatalog2($topCatId) {

        //Categorie Top

        return view('catalog')
                        ->with('parola_magica', $topCatId);

    }

    public function login() {

        return view('login');

    }

    public function offerte_user_1() {

        //Estraggo il catalogo delle offerte
        $catalogo_offerte = $this->_catalogModel->getAll();
        $user_type = 1;

        return view('offerte')
                        ->with('catalogo', $catalogo_offerte)
                        ->with('type_user', $user_type);

    }

    /*public function login() {
        return view('login');
    }



  public function doLogin()
    {
    }*/

}