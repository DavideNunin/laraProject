<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chat;

class ChatController extends Controller
{
    protected $_chatModel;
    public function __construct() {
        $this->middleware('can:isAuth');
        $this->_chatModel = new Chat;
    }

    public function index() {
        $utenti_in_chat = $this->_chatModel->get_utenti_chat();
        return view('chat.chat')
            ->with('id', $utenti_in_chat);
    }
}
