<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Resources\Offerta;

class Opzionamento extends Model
{
    protected $table = 'opzionamento';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    public $timestamps = false;
}



