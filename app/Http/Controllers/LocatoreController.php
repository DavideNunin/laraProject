<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\ElencoFaq;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\newOfferRequest;
use App\Http\Requests\newModifyDataRequest;
use App\Models\Resources\Offerta;
use App\Models\Resources\Foto;
use App\Models\Resources\Opzionamento;
use App\Models\Resources\PostoLetto;
use App\Models\Resources\Appartamento;
use App\Models\Resources\Contratto;
use Carbon\Carbon;

class LocatoreController extends Controller {

    protected $_locatoreModel;
    protected $_faqModel;
    protected $_userModel;
    protected $_opzionamentoModel;
    protected $_offertaModel;
    protected $_contrattoModel;
    protected $_appartamentoModel;
    protected $_postoLettoModel;


    public function __construct() {
        $this->middleware('can:isLocatore');
        $this->_faqModel = new ElencoFaq;
        $this->_userModel = new User;
        $this->_opzionamentoModel = new Opzionamento;
        $this->_offertaModel = new Offerta;
        $this->_contrattoModel = new Contratto;
        $this->_appartamentoModel = new Appartamento;
        $this->_postoLettoModel = new PostoLetto;
    }

    public function index() {
        $user = 1;
        $elfaq= $this->_faqModel->getAll();
        return view('home')
            ->with('utente', $user)
            ->with('elfaq', $elfaq);
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

        return redirect()->action('LocatoreController@index');
    }

    public function offerteLocatore($paged = 200){
        $user_id = auth()->user()->id;
        $catalogo_offerte =  $this->_offertaModel->get_offerta_from_user($user_id);
        //$catalogo_offerte = Offerta::where('user_id',$user_id);
        return view('locatore/offertelocatore')
                        ->with('catalogo', $catalogo_offerte->paginate($paged));
    }

    public function inserisciofferta(){
        return view('locatore/inserisciofferta');
    }

    public function aggiungiListaOfferte(newOfferRequest $request){

        $offerta = new Offerta;
        $appartamento = new Appartamento;
        $postoLetto = new PostoLetto;
        $foto = new Foto;

        $utente = auth()->user();
        $offerta->user_id = $utente->id;
        $mytime = Carbon::now();
        $offerta->dataPubblicazione = $mytime;
        $offerta->fill($request->validated());
        $offerta->save();

        $idOffer = $offerta -> offerta_id;       //dd($idOffer); 
        
        if($offerta->tipologia == 'A'){
            $appartamento-> offerta_id = $idOffer;
            $appartamento -> fill ($request->validated());
            $appartamento->save();
        }

        else{
        $postoLetto -> offerta_id = $idOffer;
        $postoLetto -> fill ($request->validated());
        $postoLetto->save();
        }

        $foto-> offerta_id = $idOffer;
        if(!is_null (request()->nome_file)){
        $imageName = time().'.'.request()->nome_file->getClientOriginalExtension();
        request()->nome_file->move(public_path('images'), $imageName);
        $foto -> nome_file = $imageName;
        $foto -> save();    
        }

        else{
        $foto -> nome_file = 'missing_foto.jpg';
        $foto -> save(); 
        }
  
        //inserimento foto merdose del cazzo del pipo del culo
        return redirect()->action('LocatoreController@offerteLocatore');

        }
    

    public function eliminaOffertaLocatore($id){
        $foto = Foto::where('offerta_id',$id)->first();
        $filename=$foto->nome_file;
        
        $foto->delete();
        if(File::exists(public_path('images/' . $filename)) && $filename != 'missing_foto.jpg'){
            File::delete(public_path('images/'.$filename));

        }

        $appartamento = $this->_appartamentoModel->delete_appartamento_from_offerta($id);
        //$appartamento = Appartamento::where('offerta_id',$id)->delete();
        $postoLetto = PostoLetto::where('offerta_id', $id)->delete();
        $opzionamento = Opzionamento::where('offerta_id', $id)->delete();

        $offerta= Offerta::where('offerta_id',$id)->delete();

        return redirect()->action('LocatoreController@offerteLocatore');
    }

    public function modificaOfferta($id){
        
        $offerta = Offerta::find($id);
        $appartamento = Appartamento::where('offerta_id',$id)->get();
        $postoLetto = PostoLetto::where('offerta_id',$id)->get();

        if ($offerta != null){
        if (Gate::forUser(Auth()->user())->allows('yourOffer', $offerta, auth()->user())){
            return view('locatore/modificaofferta')
                    ->with('offerta', $offerta)
                    ->with('appartamento', $appartamento)
                    ->with('postoletto', $postoLetto);
        }
        else return redirect()->to("https://www.youtube.com/shorts/Pd8E3bJ04VM");
        }
        else return redirect()->to("https://www.youtube.com/shorts/Pd8E3bJ04VM");
    }

    public function updateOffer(newOfferRequest $request, $id){
        $offerta = Offerta::find($id);
        $appartamento = Appartamento::where('offerta_id',$id)->first();
        $postoLetto = PostoLetto::where('offerta_id',$id)->first();
        $foto = Foto::where('offerta_id', $id)->first();

        $offerta->fill($request->validated());
        $offerta->update();
        
        if($offerta->tipologia == 'A'){
            $appartamento-> offerta_id = $id;
            $appartamento -> fill ($request->validated());
            $appartamento->update();
        }

        else{
        $postoLetto -> offerta_id = $id;
        $postoLetto -> fill ($request->validated());
        $postoLetto->update();
        }


        if(!is_null (request()->nome_file)){
            $imageName = time().'.'.request()->nome_file->getClientOriginalExtension();
            request()->nome_file->move(public_path('images'), $imageName);
            $foto -> nome_file = $imageName;
            $foto -> save();    
        }
        
        return redirect()->action('LocatoreController@offerteLocatore');
        
    }

    public function singolaOfferta($id){
        //devo spostare queste 5 righe nei model cosi da dover richiamare solo 4 funzioni, è molto bello
        $url = "https://www.youtube.com/shorts/Pd8E3bJ04VM";
        $offerta = Offerta::find($id);

        $appartamento = Appartamento::where('offerta_id',$id)->get();
        $postoLetto = PostoLetto::where('offerta_id',$id)->get();

        $opzionamento  = Opzionamento::whereIn('offerta_id', [$id])->get();
            
        $users = User::join('opzionamento', 'users.id', '=', 'opzionamento.user_id')
                    ->where('opzionamento.offerta_id', '=', $id)
                    ->distinct('users.username')
                    ->get(['users.*']);

        if ($offerta != null){
        $contratti = $this->_contrattoModel->get_contratti_utente($id);
        //dd($contratti);

            if (Gate::forUser(Auth()->user())->allows('yourOffer', $offerta, auth()->user())){
            return view('locatore/singolaoffertaLocatore')
                        ->with('offerta', $offerta)
                        ->with('appartamento', $appartamento)
                        ->with('postoletto', $postoLetto)
                        ->with('opz', $opzionamento)
                        ->with('user', $users)
                        ->with('contratti', $contratti);
            }
            else return redirect()->to("https://www.youtube.com/shorts/Pd8E3bJ04VM");
        }
        else return redirect()->to("https://www.youtube.com/shorts/Pd8E3bJ04VM");



    }

    public function deleteOpzionamento(Request $request){
        $id = $request->input()['id'];
        $opzionamento = Opzionamento::find($id);
        $opzionamento->delete();
        //return response()->json(['redirect'=>$request->input()['offerta']]);

        return response()->json(['pippo'=>route('dettaglioOfferta', ['id' => $request->input()['offerta']])]);
    }

    public function contratto($id_opzionamento) {
        $opzionamento = $this->_opzionamentoModel->get_opzionamento_from_id($id_opzionamento);
        if(!$opzionamento){
            //errore! Hai cercato un contratto che non hai stipulato tu
            return redirect()->action('LocatoreController@index');
        }
        $proprietario = Auth::user();
            //stipula contratto
        $contratto = $this->_contrattoModel->stipulaContratto($opzionamento->user_id, $proprietario->id, $opzionamento->offerta_id);
        $this->_offertaModel->set_opzionabile_off($opzionamento->offerta_id);


        $info = $this->_contrattoModel->get_contratto_info($contratto->id);
        $this->_opzionamentoModel->contratto_stipulato($opzionamento->offerta_id, $id_opzionamento);

            $details_offerta = '';
            if($info[0]->tipologia == 'A') {
            $details_offerta = $this->_appartamentoModel->get_appartamento($info[0]->offerta_id); 
            }
        elseif($info[0]->tipologia == 'P'){
            $details_offerta = $this->_postoLettoModel->get_postoLetto($info[0]->offerta_id);     
        }
        
        return view('locatore.contratto')
                    ->with('contratto_info', $info)
                    ->with('info_casa', $details_offerta[0]);
    }

    public function vediContratto($contratto_id) {
        
        $contratto = $this->_contrattoModel->get_contratto_info($contratto_id);
        if($contratto->isEmpty()){
            //errore! Hai cercato un contratto che non hai stipulato tu
            return redirect()->action('LocatoreController@index');
        }
        $details_offerta = '';
        if($contratto[0]->tipologia == 'A') {
           $details_offerta = $this->_appartamentoModel->get_appartamento($contratto[0]->offerta_id); 
        }
        elseif($contratto[0]->tipologia == 'P'){
            $details_offerta = $this->_postoLettoModel->get_postoLetto($contratto[0]->offerta_id);     
        }

        if (Gate::forUser(Auth()->user())->allows('yourContract', auth()->user(), $contratto)){
            return view('locatore.contratto')
                    ->with('contratto_info', $contratto)
                    ->with('info_casa', $details_offerta[0]);
        }
        else return back();
    }

    




}

