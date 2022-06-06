<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table = 'faq';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function get_faq($id){
        return Faq::find($id);
    }

    public function delete_faq($id){
        return Faq::find($id)->delete();
    }

    public function update_faq($id, $dom, $ris) {
        Faq::where('id', '=', $id)->update(['domanda' => $dom, 'risposta' => $ris]);
    }
}
