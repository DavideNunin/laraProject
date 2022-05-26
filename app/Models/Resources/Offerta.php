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
            $join->on('fotos.offerta_id', '=', 'offerta.offerta_id')
                 ->where('offerta.offerta_id', '=', $this->id);
        })
        ->get();

        return $foto;
    }

    public function get_offerta_from_id($id) {
        return Offerta::find($id);
    }


    /*$utenti = User::join('opzionamento', function($join) use ($id){
        $join->on('users.id', '=', 'opzionamento.user_id')
        ->where('opzionamento.offerta_id', '=', $id);
    })
    ->get();
    return $utenti;*/


    public function get_offerte_opzionate($tipo, $start, $end) {

        if($tipo=='all') {
            $offerte = Offerta::join('opzionamento', function($join) use($tipo, $start, $end) {
            $join->on('offerta.id', '=', 'opzionamento.offerta_id')->whereBetween('opzionamento.data', [$start, $end]);
        })->distinct('offerta.id')->count('offerta.id');
        }

        else {
            $offerte = Offerta::join('opzionamento', function($join) use($tipo, $start, $end) {
                $join->on('offerta.id', '=', 'opzionamento.offerta_id')
                ->where('offerta.tipologia', '=', $tipo)->whereBetween('opzionamento.data', [$start, $end]);
            })->distinct('offerta.id')->count('offerta.id');
        }
        return $offerte;
    }

    public function offerte_in_website($tipo, $start, $end) {
        if($tipo=='all') {
            $offerte = Offerta::whereBetween('offerta.dataPubblicazione', [$start, $end])
                        ->count('offerta.id');
        }

        else {
            $offerte = Offerta::where('offerta.tipologia', '=', $tipo)->whereBetween('offerta.dataPubblicazione', [$start, $end])
                        ->count('offerta.id');
        }
        return $offerte;
    }
}

