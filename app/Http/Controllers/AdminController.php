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
        $this->_faqModel = new Faq;
        $this->_listFaqModel = new ElencoFaq;
        $this->_catalogModel = new Catalog;
        $this->_offertaModel = new Offerta;
        $this->_contrattoModel = new Contratto;
    }

    public function index() {
        $elfaq= $this->_listFaqModel->getAll();
        return view('home')
            ->with('elfaq', $elfaq);
    }

    public function faqmanager() {
        $elfaq= $this->_listFaqModel->getAll();
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
        $faq = $this->_faqModel->delete_faq($id_todelete);
        return response()->json(['redirect' => route('faqmanager')]);
    }

    public function loadFaq(Request $request) {
        $faq = $this->_faqModel->get_faq($request->get('id'));
        $domanda = $faq->domanda;
        $risposta = $faq->risposta;
        return response()->json(['domanda' => $domanda, 'risposta' =>$risposta]);
    }

    public function updateFaq(NewFaqRequest $request) {
        $id = $request->id;
        $domanda = $request->domanda;
        $risposta = $request->risposta;
        
        $this->_faqModel->update_faq($id, $domanda, $risposta);
        return response()->json(['redirect' => route('faqmanager')]);
    }



    public function stats() {
        $catalogo_offerte = $this->_catalogModel->getAll();
        return view('admin.stats');
    }

    public function find(NewStatsRequest $request) {
        $data_inizio = '';
        $data_fine = '';
        $tipo = '';
        if($request->start_stats == null){
            $request->start_stats = '1900-03-08';
            $data_inizio = 'Sempre';
        }
        else {
            $data_inizio = $request->start_stats;
        }
        if($request->end_stats == null){
            $request->end_stats = '3000-03-08';
            $data_fine = 'Sempre';
        }
        else {
            $data_fine = $request->end_stats;
        }
        if($request->tipo == null){
            $request->tipo = 'all';
        }

        $offerte_opzionate = $this->_offertaModel->get_offerte_opzionate($request->tipo, $request->start_stats, $request->end_stats);
        $offerte_nel_sito = $this->_offertaModel->offerte_in_website($request->tipo, $request->start_stats, $request->end_stats);
        $contratti_locati = $this->_contrattoModel->get_contratti($request->tipo, $request->start_stats, $request->end_stats);

        $tipo = '';
        if($request->tipo == 'p') {
            $tipo = 'Posto letto';
        }
        elseif($request->tipo == 'a') {
            $tipo = 'Appartamento';
        }
        elseif($request->tipo == 'all'){
            $tipo = 'Posto letto & Appartamento';
        }

        return view('admin.stats')
        ->with('start', $data_inizio)
        ->with('end', $data_fine)
        ->with('tipo', $tipo)
        ->with('offerte_opzionate', $offerte_opzionate)
        ->with('contratti_locati', $contratti_locati)
        ->with('offerte_nel_sito', $offerte_nel_sito);    
    }

}