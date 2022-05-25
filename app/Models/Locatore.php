<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Models\Resources\Offerta;


class Locatore extends Model{
    public function getFieldsbyType(){
        return Offerta::where('')->get();
    }
}
