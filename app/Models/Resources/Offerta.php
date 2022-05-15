<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Offerta extends Model {

    protected $table = 'offerta';
    protected $primaryKey = 'offertaId';
    public $timestamps = false;

    // restituisce un vettore con le righe delle foto relative all'offerta passata
    public function get_foto_offerta($offerta_id) {
        return Offerta::whereIn('offerta_id', $offerta_id)->get();
    }
}
