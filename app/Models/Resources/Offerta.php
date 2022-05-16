<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Resources\Foto;

class Offerta extends Model {

    protected $table = 'offerta';
    protected $primaryKey = 'id';
    public $timestamps = false;

    // restituisce un vettore con le righe delle foto relative all'offerta passata

    // non so se ha senso metterla nel model della classe foto

    public function get_foto_offerta($offerta_id) {
        
        $foto = Foto::join('offerta', 'fotos.offerta_id', '=', 'offerta.id')
               ->get(['fotos.nome_file']);

        return $foto;
    }
}
