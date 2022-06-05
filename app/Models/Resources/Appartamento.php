<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Appartamento extends Model{
    protected $table = 'appartamento';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function get_appartamento($id){
        return Appartamento::where('offerta_id', '=', $id)->get();
    }
}