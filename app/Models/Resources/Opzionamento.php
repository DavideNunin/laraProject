<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Opzionamento extends Model
{
    protected $table = 'opzionamento';
    protected $primaryKey = 'id,offerta_id,user_id';
    public $timestamps = false;
    //
}
