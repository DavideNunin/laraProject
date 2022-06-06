<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Appartamento extends Model{
    protected $table = 'appartamento';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function first_appartamento_from_offertaId($id){
        return Appartamento::where('offerta_id', '=', $id)->first();
    }

    public function get_appartamento_from_offertaId($id){
        return Appartamento::where('offerta_id', '=', $id)->get();
    }

    public function delete_appartamento_from_offertaId($id){
        return Appartamento::where('offerta_id', '=', $id)->delete();

    }
}