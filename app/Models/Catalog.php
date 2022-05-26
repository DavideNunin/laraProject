<?php

namespace App\Models;

use App\Models\Resources\Offerta;
use App\Models\Resources\User;


class Catalog {

    public function getAll($paged = 4, $order = null) {
        $offerta = Offerta::paginate($paged);
        return $offerta;
    }
  
}
