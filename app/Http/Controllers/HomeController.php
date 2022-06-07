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


}

