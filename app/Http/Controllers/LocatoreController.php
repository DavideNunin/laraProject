<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Support\Facades\Log;

class LocatoreController extends Controller {
    public function showViewLocatore(){
        $user = 1;
        return view('home')
            ->with('utente', $user); 
    }

}