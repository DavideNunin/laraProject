<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\ElencoFaq;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\newOfferRequest;
use App\Http\Requests\newAppartamentoRequest;
use App\Http\Requests\newPostolettoRequest;
use App\Http\Requests\newFotoRequest;
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

    public function offerteLocatore($paged = 200){
        $user_id = auth()->user()->id;
        $catalogo_offerte = Offerta::where('user_id',$user_id);
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

        $appartamento = Appartamento::where('offerta_id',$id)->delete();
        $postoLetto = PostoLetto::where('offerta_id', $id)->delete();

        $offerta= Offerta::where('offerta_id',$id)->delete();

        return redirect()->action('LocatoreController@offerteLocatore');
    }

    public function modificaOfferta($id){
        
        $offerta = Offerta::find($id);
        $appartamento = Appartamento::where('offerta_id',$id)->get();
        $postoLetto = PostoLetto::where('offerta_id',$id)->get();

        
        if (Gate::forUser(Auth()->user())->allows('yourOffer', $offerta, auth()->user())){
            return view('locatore/modificaofferta')
                    ->with('offerta', $offerta)
                    ->with('appartamento', $appartamento)
                    ->with('postoletto', $postoLetto);
        }
        else return 'ehi Coniglio, hai fegato?';
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

        if (Gate::forUser(Auth()->user())->allows('yourOffer', $offerta, auth()->user())){
        return view('locatore/singolaoffertaLocatore')
                    ->with('offerta', $offerta)
                    ->with('appartamento', $appartamento)
                    ->with('postoletto', $postoLetto)
                    ->with('opz', $opzionamento)
                    ->with('user', $users);
        }
        else return redirect()->to("https://www.youtube.com/shorts/Pd8E3bJ04VM");

    }

}

