<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\ElencoFaq;
use App\User;
use App\Http\Requests\newModifyDataRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

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
    public function offerteOpzionate(){
        $user_id= auth()->user()->id;
        $offOpz = $this->_userModel->get_offerte_opzionate($user_id);
        return view('offerta/offerteopzionate')
                            ->with('offerte_opzionate', $offOpz );

    }

    public function myProfile(){
        $user =auth()->user();
        return view('locatario/profilo')
                            ->with('user_info',$user);
    }
    public function updateData(newModifyDataRequest $request){
        $id=auth()->user()->id;
        dd($id);
        $utente= Utente::find($id);

        $utente->fill($request->validated());
        $utente->update();
        return redirect()->action('LocatarioController@index');

    }
    public function chatMenu(){
        $utente=auth()->user();
        return view('chatmenu')
            ->with('user_info',$utente);

    }
}
