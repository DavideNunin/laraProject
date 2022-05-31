<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Support\Facades\Auth;

class Chat extends Model
{
    public function get_utenti_chat(){
        $utente_auth = Auth::user()->id;

        //query che ritorna tutti gli utenti con i quali sto parlando
        $a = User::join('chat', function($join) use ($utente_auth){
            $join->on('users.id', '=', 'chat.mittente')
                 ->where('chat.destinatario', '=', $utente_auth);
        })
        ->get();

        $b = User::where('users.id', '=', $utente_auth)->get();

        /*$b = User::join('chat', function($join) use ($utente_auth){
            $join->on('chat.mittente', '=', 'users.id')
                 ->where('chat.mittente', '=', $utente_auth)
                 ->get('chat.destinatario')
                 ->union($a);
        });
    */

        return $a;
    }
}
