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
        $opzionamenti= Offerta::join('opzionamento',function($join){
            $join->on('offerta.offerta_id','=','opzionamento.offerta_id')->where('opzionamento.user_id','=',auth()->user()->id);
            })->paginate($paged);

        Log::debug($opzionamenti);

        return view('offerta/offerteopzionate')
            ->with('offerte_opzionate',$opzionamenti);
    }

    public function myProfile(){
        $user =auth()->user();
        return view('locatario/profilo')
                            ->with('user_info',$user);
    }
    public function updateData(newModifyDataRequest $request){
        Log::debug("guarda giuse");
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
        $opzionamento=Opzionamento::where('offerta_id','=',$id_offerta)->where('user_id','=',$user_id);
        $opzionamento->delete();
        return redirect()->action('LocatarioController@index');
    }

    public function ricercaOfferte($paged = 200){
        $offerte= Offerta::paginate($paged);
        return view('locatario/ricerca')->with('risultati',$offerte);
    }

    public function chatMenu(){
        $utente=auth()->user();
        return view('chatmenu')
            ->with('user_info',$utente);
    }

    public function opzionaOfferta(newOpzionamentoRequest $request){
        Log::debug("Entrato");
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
