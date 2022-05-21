<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resources\Utente;
use App\Models\Resources\Offerta;
use App\Models\Catalog;

class OffertaController extends Controller
{
    protected $_catalogModel;
    protected $_userModel;
    protected $_offertaModel;

    public function __construct() {
        $this->_catalogModel = new Catalog;
        $this->_userModel = new Utente;
        $this->_offertaModel = new Offerta;
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
