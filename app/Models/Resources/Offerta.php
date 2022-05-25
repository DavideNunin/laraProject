<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Resources\Foto;

class Offerta extends Model {

    protected $table = 'offerta';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    public $timestamps = false;

    // restituisce un vettore con le righe delle foto relative all'offerta passata

    // non so se ha senso metterla nel model della classe foto

    public function get_foto_offerta() {

        $foto = Foto::join('offerta', function ($join) {
            $join->on('fotos.offerta_id', '=', 'offerta.id')
                 ->where('offerta.id', '=', $this->id);
        })
        ->get();

        return $foto;
    }

    public function get_offerta_from_id($id) {
        return Offerta::find($id);
    }

}
