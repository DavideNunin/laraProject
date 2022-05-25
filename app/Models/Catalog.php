<?php

namespace App\Models;

use App\Models\Resources\Offerta;
use App\Models\Resources\User;


class Catalog {

    public function getAll() {
        $offerta = Offerta::all();
        return $offerta->paginate($paged) ;
    }
  
}
