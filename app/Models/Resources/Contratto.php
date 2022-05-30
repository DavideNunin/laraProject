<?php
namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Contratto extends Model
{
    protected $table = 'contratto';
    protected $primaryKey = 'id';
    public $timestamps = false;


    public function get_contratti($tipo, $start, $end) {
        if($tipo=='all') {
            $contratti_locati = Contratto::join('offerta', function($join) use($tipo, $start, $end) {
            $join->on('contratto.offerta_id', '=', 'offerta.id')
            ->whereBetween('contratto.dataStipula', [$start, $end]);
        })->distinct('offerta.id')->count('offerta.id');
        }

        else {
            $contratti_locati = Contratto::join('offerta', function($join) use($tipo, $start, $end) {
                $join->on('contratto.offerta_id', '=', 'offerta.id')
                ->whereBetween('contratto.dataStipula', [$start, $end])
                ->where('offerta.tipologia', '=', $tipo);
            })->distinct('offerta.id')->count('offerta.id');
        }
        return $contratti_locati;
    }
}
