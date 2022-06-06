<?php
namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Contratto extends Model
{
    protected $table = 'contratto';
    protected $primaryKey = 'id';
    public $timestamps = false;


    public function get_contratti($tipo, $start, $end) {
        if($tipo=='all') {
            $contratti_locati = Contratto::join('offerta', function($join) use($tipo, $start, $end) {
            $join->on('contratto.offerta_id', '=', 'offerta.offerta_id')
            ->whereBetween('contratto.dataStipula', [$start, $end]);
        })->distinct('offerta.offerta_id')->count('offerta.offerta_id');
        }

        else {
            $contratti_locati = Contratto::join('offerta', function($join) use($tipo, $start, $end) {
                $join->on('contratto.offerta_id', '=', 'offerta.offerta_id')
                ->whereBetween('contratto.dataStipula', [$start, $end])
                ->where('offerta.tipologia', '=', $tipo);
            })->distinct('offerta.offerta_id')->count('offerta.offerta_id');
        }
        return $contratti_locati;
    }

    public function stipulaContratto($studente, $proprietario, $offerta) {
        $contratto = new Contratto;
        $contratto->studente_id = $studente;
        $contratto->locatore_id = $proprietario;
        $contratto->offerta_id = $offerta;
        $contratto->dataStipula = Carbon::now()->format('Y:m:d');

        $contratto->save();

        return $contratto;
    }

    public function get_contratti_utente($offerta_id){
        return Contratto::where('locatore_id', '=', Auth::user()->id)
        ->where('offerta_id', '=', $offerta_id)->get();
    }

    public function get_contratto_info($id) {
        return DB::table('contratto')
        ->join('users', 'users.id', '=', 'contratto.studente_id')
        ->join('offerta', 'offerta.offerta_id', '=', 'contratto.offerta_id')
        ->where('contratto.id', '=', $id)
        ->get();
    }

    public function get_contratto_from_offerta($id){
        return Contratto::where('offerta_id','=',$id)->get();
    }

    public function get_offerte_contratto(){
        return Offerta::join('opzionamento', function($join) {
            $join->on('opzionamento.offerta_id', '=', 'offerta.offerta_id');
        })->join('contratto', function($join) {
            $join->on('contratto.studente_id', '=', 'opzionamento.user_id');
        })
        ->where('opzionamento.user_id', '=', auth()->user()->id)
        ->where('contratto.studente_id', '=', auth()->user()->id)
        ->get();
    }
}
