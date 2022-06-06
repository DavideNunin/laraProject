<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\ElencoFaq;
use App\Models\Resources\Offerta;
use App\Models\Resources\Opzionamento;
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


    public function __construct() {
        $this->middleware('can:isLocatario');
        $this->_faqModel = new ElencoFaq;
        $this->_userModel = new User;
        $this->_offertaModel = new Offerta;
        $this->_opzionamentoModel = new Opzionamento;
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
        $opzionamenti = $this->_opzionamentoModel->get_offerte_opzionate($paged);
        //$opzionamenti= Offerta::join('opzionamento',function($join){
         //   $join->on('offerta.offerta_id','=','opzionamento.offerta_id')->where('opzionamento.user_id','=',auth()->user()->id);
          //  })->paginate($paged);
        //$opzionamenti->paginate($paged);

        Log::debug($opzionamenti);

        return view('locatario/offerteopzionate')
            ->with('offerte_opzionate',$opzionamenti);
    }

    public function myProfile(){
        $user =auth()->user();
        return view('/profilo')
                            ->with('user_info',$user);
    }
    public function updateData(newModifyDataRequest $request){
        Log::debug($request->validated());
        $utente=auth()->user();
        Log::debug("utente prima dell' update");
        Log::debug($utente);
        foreach( $request->validated() as $key => $value){
                Log::debug($key);
                Log::debug($value);
                Log::debug(property_exists($utente,$key));
            if(!is_null($value) && $key!="old_password" && $key!="conferma_password" ){
                if($key=="password") $value= Hash::make($value);
                $utente->{$key} = $value;
            }
        }
        
        $utente->update();
        Log::debug("utente dopo dell' update");
        Log::debug($utente);

        return redirect()->action('LocatarioController@index');
    }

    public function rimuoviOpzionamento ($id_offerta){
        $user_id=auth()->user()->id;
        $opzionamento = $this->_opzionamentoModel->remove_opzionamento($id_offerta, $user_id);
        //$opzionamento=Opzionamento::where('offerta_id','=',$id_offerta)->where('user_id','=',$user_id);
        //$opzionamento->delete();
        return redirect()->action('LocatarioController@index');
    }
    public function filter($paged=4){
    }

    public function ricercaOfferte($paged = 3, FilterRequest $request){

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
                    ->with('number_result', $number_result);
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
                ->with('number_result', $number_result);
        }
        else{
            $number_result = $offerte->count();
            $offerte=Offerta::paginate($paged);//->appends($request);
            //dd($offerte[0]->offerta_id);
            return view('locatario/ricerca')
                ->with('risultati',$offerte)
                ->with('number_result', $number_result);;
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
