<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\ElencoFaq;

class AdminController extends Controller {

    protected $_faqModel;
    protected $elfaq;

    public function __construct() {
        $this->middleware('can:isAdmin');
        $this->_faqModel = new ElencoFaq;
        $elfaq= $this->_faqModel->getAll();
    }

    public function index() {
        return view('home')
            ->with('elfaq', $this->elfaq);
    }

    public function faqmanager() {
        $elfaq= $this->_faqModel->getAll();
        return view('faqmanager')
            ->with('elfaq', $elfaq);
    }


}