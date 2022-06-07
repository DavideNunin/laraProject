<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ElencoFaq;
use App\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\newOfferRequest;
use App\Models\Resources\Offerta;
use App\Models\Resources\Appartamento;
use App\Models\Resources\PostoLetto;
use Carbon\Carbon;

class HomeController extends Controller
{
    
    public function __construct() {
        $this->_offertaModel = new Offerta;
        $this->_appartamentoModel = new Appartamento;
        $this->_postoLettoModel = new PostoLetto;
    }

    public function index()
    {   
        return view('home');
    }
    
    public function catalogoOfferteStandard($paged = 5)
    {   
        $user = array();
        if(isset(auth()->user()->tipologia)){
            $tipologia_utente=auth()->user()->tipologia;
            if($tipologia_utente=='s'){
                return redirect('/locatario/ricercaofferte');
            }
        }

        $catalogo_offerte = Offerta::paginate($paged);
        foreach($catalogo_offerte as $offerta){
            $id = $offerta->offerta_id;
            $utente = $this->_offertaModel->get_utente_by_offerta($id);
            array_push($user, $utente);
        }

        return view('offerta/offerte')
                        ->with('catalogo', $catalogo_offerte)
                        ->with('locatori', $user);
    }

    public function dettaglioOfferta($id){

        $offerta = $this->_offertaModel->get_offerta_from_id($id);

        $appartamento = $this->_appartamentoModel->get_appartamento_from_offertaId($id);
        $postoLetto = $this->_postoLettoModel->get_postoLetto_from_offertaId($id);

        if ($offerta != null){
            return view('locatario/dettagliooffertaLocatario')
                        ->with('offerta', $offerta)
                        ->with('appartamento', $appartamento)
                        ->with('postoletto', $postoLetto);
        }
        else return redirect()->back()->with('success', "Attenzione! Hai provato ad accedere ad un'offerta che non esiste");   
    }

}

