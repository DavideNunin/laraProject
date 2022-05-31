<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Chat extends Model
{
    protected $table = 'chat';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function get_utenti_chat(){
        $utente_auth = Auth::user()->id;

        //query che ritorna tutti gli utenti con i quali sto parlando
        $a = DB::table('chat')->join('users', function($join) use ($utente_auth){
            $join->on('users.id', '=', 'chat.destinatario');
        })
        ->where('chat.mittente', '=', $utente_auth)
        ->distinct('chat.destinatario')
       ->select('chat.destinatario', 'users.username');

        //$b = User::where('users.id', '=', $utente_auth)->get();

        $b = DB::table('chat')->join('users', function($join) use ($utente_auth){
            $join->on('users.id', '=', 'chat.mittente');
        })
        ->where('chat.destinatario', '=', $utente_auth)
        ->distinct('chat.mittente')
        ->select('chat.mittente', 'users.username')
        ->union($a)
        ->get();

        return $b;
    }


    public function get_messaggi($user_cliccato){
        //deve ritornare i messaggi scambiati tra l'utente e user_cliccato
        $utente_auth = Auth::user()->id;

        $messaggi = DB::table('chat')->join('messaggio', function($join) use ($utente_auth){
            $join->on('chat.messaggio', '=', 'messaggio.id');
        })
        ->where([
            ['chat.destinatario', '=', $utente_auth],
            ['chat.mittente', '=', $user_cliccato],
        ])
        ->orWhere([
            ['chat.destinatario', '=', $user_cliccato],
            ['chat.mittente', '=', $utente_auth],
        ])
        ->orderBy('data_ora_invio')
        ->get();

        return $messaggi;
    }

    public function set_read($user_cliccato){
        $utente_auth = Auth::user()->id;
        DB::table('chat')->join('messaggio', function($join) use ($utente_auth){
            $join->on('chat.messaggio', '=', 'messaggio.id');
        })
        ->where([
            ['chat.destinatario', '=', $utente_auth],
            ['chat.mittente', '=', $user_cliccato],
        ])
        ->update(['messaggio.letto' => 1]);
    }
}
