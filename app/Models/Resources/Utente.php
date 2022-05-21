<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Utente extends Model
{
    protected $table = 'utente';
    protected $primaryKey = 'id';
    public $timestamps = false;


    public function get_offerte_utente(){
        $offertautente = Offerta::join('utente', function($join){
            $join->on('offerta.user_id', '=', 'utente.id')
                 ->where('utente.username', '=', 'mario.rossi');
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