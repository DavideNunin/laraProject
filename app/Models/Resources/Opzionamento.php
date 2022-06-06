<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Resources\Offerta;

class Opzionamento extends Model
{
    protected $table = 'opzionamento';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function get_opzionamento_from_id($id) {
        return Opzionamento::find($id);
    }

    public function get_opzionamento_from_offertaId($id){
        return Opzionamento::whereIn('offerta_id', [$id])->get();
    }

    public function delete_opzionamento_from_offertaId($id){
        return Opzionamento::where('offerta_id','=', $id)->delete();
    }

    public function delete_opzionamento($id){
       return Opzionamento::find($id)->delete();
    }

    public function contratto_stipulato($offerta_id, $id_opzionamento){
        return Opzionamento::where('offerta_id', '=', $offerta_id)
        ->where('id', '!=', $id_opzionamento)
        ->delete();
    }

    public function remove_opzionamento($offerta, $user){
        Opzionamento::where('offerta_id','=',$offerta)->where('user_id','=',$user)->delete();
    }

    public function get_offerte_opzionate(){
        return Offerta::join('opzionamento',function($join){
            $join->on('offerta.offerta_id','=','opzionamento.offerta_id')->where('opzionamento.user_id','=',auth()->user()->id);
        });
    }
}



