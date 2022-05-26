<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\ElencoFaq;
use App\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\newOfferRequest;
use App\Models\Resources\Offerta;
use App\Models\Resources\Foto;
use App\Models\Resources\PostoLetto;
use App\Models\Resources\Appartamento;
use App\Models\Resources\Contratto;
use Carbon\Carbon;

class LocatoreController extends Controller {

    protected $_locatoreModel;
    protected $_faqModel;
    protected $_userModel;


    public function __construct() {
        $this->middleware('can:isLocatore');
        $this->_faqModel = new ElencoFaq;
        $this->_userModel = new User;

    }

    public function index() {
        $user = 1;
        $elfaq= $this->_faqModel->getAll();
        return view('home')
            ->with('utente', $user)
            ->with('elfaq', $elfaq);
    }

    public function offerteLocatore($paged = 3){
        $user_id = auth()->user()->id;
        $catalogo_offerte = Offerta::where('user_id',$user_id);
        return view('offerta/offertelocatore')
                        ->with('catalogo', $catalogo_offerte->paginate($paged));
    }

    public function inserisciofferta(){
        return view('locatore/inserisciofferta');
    }

    public function aggiungiListaOfferte(newOfferRequest $request){

        $offerta = new Offerta;
        $utente = auth()->user();
        $offerta->user_id = $utente->id;
        $mytime = Carbon::now();
        $offerta->dataPubblicazione = $mytime;
        $offerta->fill($request->validated());
        $offerta->save();

        return redirect()->action('LocatoreController@index');
    }

    public function eliminaOffertaLocatore($id){
        $foto = Foto::where('offerta_id',$id)->delete();

        $appartamento = Appartamento::where('offerta_id',$id)->delete();
        $postoLetto = PostoLetto::where('offerta_id', $id)->delete();

        $offerta= Offerta::where('offerta_id',$id)->delete();

        return redirect()->action('LocatoreController@index');
    }


}

