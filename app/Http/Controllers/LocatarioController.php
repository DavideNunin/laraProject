<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\ElencoFaq;
use App\Models\Resources\Offerta;
use App\Models\Resources\Contratto;
use App\Models\Resources\Opzionamento;
use App\Models\Resources\Appartamento;
use App\Models\Resources\PostoLetto;
use App\Http\Requests\newOpzionamentoRequest;
use Illuminate\Http\Request;    
use App\User;
use App\Http\Requests\newModifyDataRequest;
use App\Http\Requests\FilterRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class LocatarioController extends Controller
{
    protected $_locatarioModel;
    protected $_faqModel;
    protected $_userModel;
    protected $_offertaModel;
    protected $_opzionamentoModel;
    protected $_contrattoModel;


    public function __construct() {
        $this->middleware('can:isLocatario');
        $this->_faqModel = new ElencoFaq;
        $this->_userModel = new User;
        $this->_offertaModel = new Offerta;
        $this->_appartamentoModel = new Appartamento;
        $this->_postoLettoModel = new PostoLetto;
        $this->_opzionamentoModel = new Opzionamento;
        $this->_contrattoModel = new Contratto;
    }
    //
    public function index() {
        $user = 2;
        $elfaq= $this->_faqModel->getAll();
        return view('home')
            ->with('utente', $user)
            ->with('elfaq', $elfaq);
    }
    public function offerteOpzionate($paged = 4){
        $utente_offerta = array();
        $opzionamenti = $this->_opzionamentoModel->get_offerte_opzionate($paged);
        $offerte_contrattualizzate = $this->_contrattoModel->get_offerte_contratto();

        foreach($opzionamenti as $opzionamento) {
            $id = $opzionamento->offerta_id;
            $utente = $this->_offertaModel->get_utente_by_offerta($id);
            array_push($utente_offerta, $utente);
        }

        return view('locatario/offerteopzionate')
            ->with('offerte_opzionate',$opzionamenti)
            ->with('locatori', $utente_offerta)
			->with('offerte_contratto', $offerte_contrattualizzate);

    }

    public function singolaOfferta($id){
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

    public function myProfile(){
        $user =auth()->user();
        return view('/profilo')
                            ->with('user_info',$user);
    }
    public function updateData(newModifyDataRequest $request){
        $utente=auth()->user();

        foreach( $request->validated() as $key => $value){
            if(!is_null($value) && $key!="old_password" && $key!="conferma_password" ){
                if($key=="password") $value= Hash::make($value);
                $utente->{$key} = $value;
            }
        }
        
        $utente->update();
        return redirect()->action('LocatarioController@index');
    }

    public function rimuoviOpzionamento ($id_offerta){
        $user_id=auth()->user()->id;
        $opzionamento = $this->_opzionamentoModel->remove_opzionamento($id_offerta, $user_id);
        //$opzionamento=Opzionamento::where('offerta_id','=',$id_offerta)->where('user_id','=',$user_id);
        //$opzionamento->delete();
        return redirect()->action('LocatarioController@index');
    }

    public function ricercaOfferte($paged = 5, FilterRequest $request){
        $locatori = $this->_userModel->get_locatori();
        Log::debug($request);

        if(count($request->all())!=0){
            $offerte= new Offerta;

            if(isset($request->tipologia)){
                if($request->tipologia=='A'){
                    $offerte=$offerte->IsAppartamento();
                    if(isset($request->locale_ricreativo) && $request->locale_ricreativo==1){
                        $offerte=$offerte->HasLocRic();
                    }
                    if(isset($request->terrazzo) && $request->terrazzo==1){
                        $offerte=$offerte->HasTerrazzo();
                    }
                    if(isset($request->ncamere)){
                        $offerte=$offerte->Hasncamere($request->ncamere);
                    }
                    if(isset($request->nbagni)){
                        $offerte=$offerte->Hasnbagni($request->nbagni);
                    }
                    if(isset($request->nposti_letto)){
                        $offerte=$offerte->Hasnpostiletto($request->nposti_letto);
                    }
                    if(isset($request->superficie)){
                        $offerte=$offerte->HasSuperficie($request->superficie);
                    }
                }
                if($request->tipologia=='P'){
                    $offerte=$offerte->isPostoletto();
                    if(isset($request->doppia)){
                        $offerte=$offerte->IsDoppia($request->doppia);
                    }
                    if(isset($request->luogo_studio) && $request->luogo_studio==1){
                        $offerte=$offerte->HasLuogoStudio();
                    }
                    if(isset($request->finestra) && $request->finestra == 1){
                        $offerte=$offerte->HasFinestra();
                    }
                }
            }

            if(isset($request->fascia_prezzo)){
                $offerte=$offerte->IsInRange($request->fascia_prezzo);
            }
            if(isset($request->eta_minima)){
                $offerte=$offerte->EtaMin($request->eta_minima);
            }
            if(isset($request->sesso)){
                $offerte=$offerte->IsGender($request->sesso);
            }

            if(isset($request->citta)){
                $number_result = $offerte->SearchByCity($request->citta)->count();
                $offerte=$offerte->SearchByCity($request->citta)->paginate($paged)->appends($request->all());
                return view('locatario/ricerca')
                    ->with('risultati',$offerte)
                    ->with('ricerca',str_split($request->citta))
                    ->with('number_result', $number_result)
                    ->with('locatori', $locatori);
            }
            if(isset($request->data_inizio_locazione)){
                $offerte=$offerte->DataFilter($request->data_inizio_locazione);
            }
            Log::debug('query:');
            Log::debug($offerte->toSql());

            $number_result = $offerte->count();
            $offerte=$offerte->paginate($paged)->appends($request->all());
            Log::debug($offerte);
            return view('locatario/ricerca')
                ->with('risultati',$offerte)
                ->with('number_result', $number_result)
                ->with('locatori', $locatori);
        }
        else{
            
            $number_result = $this->_offertaModel->get_all_offerte()->count();
            $offerte=Offerta::paginate($paged);
            
            //dd($offerte[0]->offerta_id);
            return view('locatario/ricerca')
                ->with('risultati',$offerte)
                ->with('number_result', $number_result)
                ->with('locatori', $locatori);
        }
    }

    public function chatMenu(){
        $utente=auth()->user();
        return view('chatmenu')
            ->with('user_info',$utente);
    }

    public function opzionaOfferta(newOpzionamentoRequest $request){
        //Log::debug("Entrato");
        $opzionamento = new Opzionamento;
        $id = $request->input()['id'];

        $utente = auth()->user();
        $mytime = Carbon::now();

        $opzionamento->user_id = $utente->id;
        $opzionamento-> data = $mytime;
        $opzionamento -> offerta_id = $id;

        $opzionamento->fill($request->validated());

        $opzionamento->save();

        return response()->json(['redirect'=>route('offerteopzionate')]);
    }
}

