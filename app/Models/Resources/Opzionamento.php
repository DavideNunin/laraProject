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

    public function contratto_stipulato($offerta_id, $id_opzionamento){
        return Opzionamento::where('offerta_id', '=', $offerta_id)
        ->where('id', '!=', $id_opzionamento)
        ->delete();
    }
}



