<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class PostoLetto extends Model
{
    protected $table = 'posto_letto';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function get_postoLetto($id){
        return PostoLetto::where('offerta_id', '=', $id)->get();
    }
}

?>
