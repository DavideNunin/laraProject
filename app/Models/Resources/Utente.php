<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Utente extends Model
{
    protected $table = 'utente';
    protected $primaryKey = 'username';
    public $timestamps = false;


    public function get_offerte_utente(){
        $offertautente = Offerta::join('utente', function($join){
            $join->on('offerta.user_id', '=', 'utente.username')
                 ->where('utente.username', '=', 'mario.rossi');
        })
        ->get();
        return $offertautente;
    }

    public function get_offerte_opzionate($id){
        $utenti = Utente::find('gennaro.bullo');
        $gino = Utente::join('opzionamento', function($join){
            $join->on('utente.username', '=', 'opzionamento.user_id');
                 
        })
        ->get();
        return $utenti;
    }

}