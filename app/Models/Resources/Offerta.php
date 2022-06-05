<?php

namespace App\Models\Resources;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use App\Models\Resources\Foto;

class Offerta extends Model {

    protected $table = 'offerta';
    protected $primaryKey = 'offerta_id';
    protected $guarded = ['offerta_id'];
    public $timestamps = false;

    // restituisce un vettore con le righe delle foto relative all'offerta passata

    // non so se ha senso metterla nel model della classe foto

    public function get_foto_offerta() {

        $foto = Foto::join('offerta', function ($join) {
            $join->on('fotos.offerta_id', '=', 'offerta.offerta_id')
                 ->where('offerta.offerta_id', '=', $this->offerta_id);
        })
        ->get();

        return $foto;
    }

    public function get_offerta_from_id($id) {
        return Offerta::find($id);
    }

    public function get_offerta_from_opzionamentoId($id) {
        return Offerta::join('opzionamento', function ($join) use ($id) {
            $join->on('offerta.offerta_id', '=', 'opzionamento.offerta_id')
            ->where('opzionamento.id', '=', $id);
        })
        ->get();
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
            $join->on('offerta.offerta_id', '=', 'opzionamento.offerta_id')->whereBetween('opzionamento.data', [$start, $end]);
        })->distinct('offerta.offerta_id')->count('offerta.offerta_id');
        }

        else {
            $offerte = Offerta::join('opzionamento', function($join) use($tipo, $start, $end) {
                $join->on('offerta.offerta_id', '=', 'opzionamento.offerta_id')
                ->where('offerta.tipologia', '=', $tipo)->whereBetween('opzionamento.data', [$start, $end]);
            })->distinct('offerta.offerta_id')->count('offerta.offerta_id');
        }
        return $offerte;
    }

    public function offerte_in_website($tipo, $start, $end) {
        if($tipo=='all') {
            $offerte = Offerta::whereBetween('offerta.dataPubblicazione', [$start, $end])
                        ->count('offerta.offerta_id');
        }

        else {
            $offerte = Offerta::where('offerta.tipologia', '=', $tipo)->whereBetween('offerta.dataPubblicazione', [$start, $end])
                        ->count('offerta.offerta_id');
        }
        return $offerte;
    }
    public function scopeIsAppartamento($query){
        return $query->join('appartamento','appartamento.offerta_id','=','offerta.offerta_id',)->select('offerta.*');
    }
    public function scopeIsPostoletto($query){
        return $query->join('posto_letto','posto_letto.offerta_id','=','offerta.offerta_id',)->select('offerta.*');
    }
    public function scopeHasLocRic($query){
        return $query->where('appartamento.loc_ricr',1);
    }
    public function scopeHasncamere($query,$ncamere){
        return $query->where('appartamento.ncamere','>=',$ncamere);
    }
    public function scopeIsInRange($query,$fascia_prezzo){
        $boundaries=explode('-',$fascia_prezzo);
        return $query->where('offerta.prezzo','>=',$boundaries[0])->where('offerta.prezzo','<=',$boundaries[1]);
    }
    public function scopeEtaMin($query,$eta){
        return $query->where('offerta.etaRichiesta','<=',$eta);
    }
    public function scopeHasnbagni($query,$nbagni){
        return $query->where('appartamento.nbagni','>=',$nbagni);
    }
    public function scopeHasTerrazzo($query){
        return $query->where('appartamento.terrazzo',1);
    }
    public function scopeIsDoppia($query,$doppiaval){
        return $query->where('posto_letto.doppia','=',$doppiaval);
    }
    public function scopeHasLuogoStudio($query){
        return $query->where('posto_letto.luogoStudio',1);
    }
}

