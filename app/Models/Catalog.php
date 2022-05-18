<?php

namespace App\Models;

use App\Models\Resources\Offerta;
use App\Models\Resources\Utente;


class Catalog {

    public function getAll() {
        return Offerta::all();
    }
  
}
