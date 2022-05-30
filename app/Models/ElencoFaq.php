<?php

namespace App\Models;

use App\Models\Resources\Faq;

class ElencoFaq {

    public function getAll() {
        return Faq::all();
    }


}
