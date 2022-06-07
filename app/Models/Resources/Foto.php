<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $table = 'fotos';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function get_Foto_from_offerta_id($id){
        return Foto::where('offerta_id', '=', $id)->get();
    }

}

?>
