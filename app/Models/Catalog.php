<?php

namespace App\Models;

use App\Models\Resources\Offerta;

class Catalog {

    public function getAll() {
        return Offerta::all();
    }


}
