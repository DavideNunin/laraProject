<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Gate;
use App\Models\Resources\Offerta;
use App\Models\Resources\PostoLetto;
use App\Models\Resources\Appartamento;
use App\Models\Resources\Contratto;
use App\Models\Catalog;

class OffertaController extends Controller
{
    protected $_catalogModel;
    protected $_userModel;
    protected $_offertaModel;
    protected $_contrattoModel;
    protected $_postoLettoModel;
    protected $_appartamentoModel;


    public function __construct() {
        $this->_catalogModel = new Catalog;
        $this->_userModel = new User;
        $this->_offertaModel = new Offerta;
        $this->_contrattoModel = new Contratto;
        $this->_postoLettoModel = new PostoLetto;
        $this->_appartamentoModel = new PostoLetto;
        
    }

    public function offerte_user_1() {
        $catalogo_offerte = $this->_catalogModel->getAll();

        return view('offerta/offerte')
                        ->with('catalogo', $catalogo_offerte);
    }
    

    public function offerta_singola($id_offerta){
        $user_type = 1;
        $offerta = $this->_offertaModel->get_offerta_from_id($id_offerta);
        $utenti_opzione = $this->_userModel->get_offerte_opzionate($id_offerta);

        return view('offerta/singola_locatore')  
                        ->with('offerta', $offerta)
                        ->with('utenti', $utenti_opzione)
                        ->with('type_user', $user_type);
    }

    public function vediContratto($contratto_id) {
        $this->middleware('can:isAuth');
        $contratto = $this->_contrattoModel->get_contratto_info($contratto_id);

        if($contratto->isEmpty()){
            //errore! Hai cercato un contratto che non hai stipulato tu
            return redirect()->action('LocatoreController@index');
        }
        $details_offerta = '';
        if($contratto[0]->tipologia == 'A') {
           $details_offerta = $this->_appartamentoModel->get_appartamento_from_offertaId($contratto[0]->offerta_id); 
        }
        elseif($contratto[0]->tipologia == 'P'){
            $details_offerta = $this->_postoLettoModel->get_postoLetto_from_offertaId($contratto[0]->offerta_id);     
        }


        if($contratto != null){
            if (Gate::forUser(Auth()->user())->allows('yourContract', auth()->user(), $contratto)){       
            return view('locatore.contratto')
                    ->with('contratto_info', $contratto)
                    ->with('info_casa', $details_offerta[0]);
                             }
        else return redirect()->back()->with('success', "Attenzione! Hai provato ad accedere ad un contratto che non hai stipulato");
        }
        else return redirect()->back()->with('success', "Attenzione! Hai provato ad accedere ad un contratto che non hai stipulato");
    }


}
