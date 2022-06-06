<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class PostoLetto extends Model
{
    protected $table = 'posto_letto';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function first_postoLetto_from_offertaId($id){
        return PostoLetto::where('offerta_id', '=', $id)->first();
    }

    public function get_postoLetto_from_offertaId($id){
        return PostoLetto::where('offerta_id', '=', $id)->get();
    }


    public function delete_postoLetto_from_offertaId($id){
        return PostoLetto::where('offerta_id', '=', $id)->delete();
    }
}

?>
