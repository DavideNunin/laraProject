<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\ElencoFaq;
use App\Models\Resources\Faq;
use App\Models\Catalog;
use App\Models\Resources\Offerta;
use App\Models\Resources\Contratto;
use App\Http\Requests\NewFaqRequest;
use App\Http\Requests\NewStatsRequest;
use Illuminate\Http\Request;

class AdminController extends Controller {

    protected $_catalogModel;
    protected $_faqModel;
    protected $elfaq;
    protected $_offertaModel;
    protected $_contrattoModel;


    public function __construct() {
        $this->middleware('can:isAdmin');
        $this->_faqModel = new ElencoFaq;
        $this->_catalogModel = new Catalog;
        $this->_offertaModel = new Offerta;
        $this->_contrattoModel = new Contratto;
    }

    public function index() {
        $elfaq= $this->_faqModel->getAll();
        return view('home')
            ->with('elfaq', $elfaq);
    }

    public function faqmanager() {
        $elfaq= $this->_faqModel->getAll();
        return view('admin.faq_manager')
            ->with('elfaq', $elfaq);
    }

    /**
     * Store a new blog post.
    */

    public function newFaq(NewFaqRequest $request) {
        $faq = new Faq;
        $faq->domanda = $request->domanda;
        $faq->risposta = $request->risposta;
        $faq->save();

        return response()->json(['redirect' => route('faqmanager')]);
    }
    public function deleteFaq(Request $request) {
        $id_todelete = $request->get('id');
        $faq=Faq::find($id_todelete);
        $faq->delete();
        //return json_encode($faq->delete());
        return response()->json(['redirect' => route('faqmanager')]);
    }

    public function loadFaq(Request $request) {
        $faq=Faq::find($request->get('id'));
        $domanda = $faq->domanda;
        $risposta = $faq->risposta;
        return response()->json(['domanda' => $domanda, 'risposta' =>$risposta]);
    }

    public function updateFaq(NewFaqRequest $request) {
        $id = $request->id;
        $domanda = $request->domanda;
        $risposta = $request->risposta;

       Faq::where('id', '=', $id)->update(['domanda' => $domanda, 'risposta' => $risposta]);
        return response()->json(['redirect' => route('faqmanager')]);
    }



    public function stats() {
        $catalogo_offerte = $this->_catalogModel->getAll();
        return view('stats');
    }

    public function find(NewStatsRequest $request) {

        $offerte_opzionate = $this->_offertaModel->get_offerte_opzionate($request->tipo, $request->start_stats, $request->end_stats);
        $offerte_nel_sito = $this->_offertaModel->offerte_in_website($request->tipo, $request->start_stats, $request->end_stats);
        $contratti_locati = $this->_contrattoModel->get_contratti($request->tipo, $request->start_stats, $request->end_stats);

        return view('stats')
        ->with('start', $request->start_stats)
        ->with('end', $request->end_stats)
        ->with('tipo', $request->tipo)
        ->with('offerte_opzionate', $offerte_opzionate)
        ->with('contratti_locati', $contratti_locati)
        ->with('offerte_nel_sito', $offerte_nel_sito);    
    }

}