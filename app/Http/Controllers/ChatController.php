<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\sendMessageRequest;
use App\User;
use App\Models\Resources\Messaggio; 
use App\Models\Resources\Chat;
use Carbon\Carbon;

class ChatController extends Controller
{
    protected $_chatModel;
    public function __construct() {
        $this->middleware('can:isAuth');
        $this->_chatModel = new Chat;
    }

    public function index() {
        $utenti_in_chat = $this->_chatModel->get_utenti_chat();
        //$prova = $this->_chatModel->add_utente_chat($utenti_in_chat, '2');
        //dd($users);
        return view('chat.chat')
            ->with('id', $utenti_in_chat);
    }

    public function index_cliccato(Request $request){

        $user=User::find($request->get('id'));
        $utenti_in_chat = $this->_chatModel->get_utenti_chat();
        $users = $utenti_in_chat->toArray();
        array_push($users, $prova);

        //return response()->json(['redirect' => $user, 'messaggi' =>$messaggi]);
        return view('chat.chat')
            ->with('id', $users);
    }

    public function startChat(Request $request) {
        $user=User::find($request->get('id'));
        $this->_chatModel->set_read($request->get('id'));
        $messaggi = $this->_chatModel->get_messaggi($request->get('id'));

        return response()->json(['user' => $user, 'messaggi' =>$messaggi]);
    }

    public function sendMessage(sendMessageRequest $request) {
        $chat = new Chat;
        $messaggio = new Messaggio;
        $messaggio->testo = $request->messaggio;
        $messaggio->letto = 0;
        $messaggio->data_ora_invio =  Carbon::now()->format('Y:m:d H:i:s');
       // dd($messaggio);
        $messaggio->save();

        $chat->destinatario = $request->destinatario;
        $chat->mittente = Auth::user()->id;
        $chat->messaggio = $messaggio->id;
        $chat->save();

        return response()->json(['destinatario' => $request->destinatario]);
    }
}
