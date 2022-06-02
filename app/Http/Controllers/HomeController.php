<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ElencoFaq;
use App\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\newOfferRequest;
use App\Models\Resources\Offerta;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }
    
    public function catalogoOfferteStandard($paged = 3)
    {
        if(isset(auth()->user()->tipologia)){
            $tipologia_utente=auth()->user()->tipologia;
            if($tipologia_utente=='s'){
                $catalogo_offerte = Offerta::join('users',function($join){
                    $join->on('offerta.user_id','=','users.id');
                    })->paginate($paged);
                return view('locatario/ricerca')->with('risultati',$catalogo_offerte);
            }
        }
        $catalogo_offerte = Offerta::paginate($paged);
        return view('offerta/offerte')
                        ->with('catalogo', $catalogo_offerte);
    }
}
