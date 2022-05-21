<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = false;


    public function get_offerte_utente(){
        $offertautente = Offerta::join('users', function($join){
            $join->on('offerta.user_id', '=', 'users.id')
                 ->where('users.username', '=', $this->username);
        })
        ->get();

        return $offertautente;
    }

    public function get_offerte_opzionate($id){
        $utenti = Utente::join('opzionamento', function($join) use ($id){
            $join->on('utente.id', '=', 'opzionamento.user_id')
            ->where('opzionamento.offerta_id', '=', $id);
        })
        ->get();
        return $utenti;
    }

}