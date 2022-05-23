<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Models\Resources\Offerta;

use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function hasRole($role) {
        $role = (array)$role;
        return in_array($this->tipologia, $role);
    }

    public function get_offerte_utente($username){
        $offertautente = Offerta::join('users', function($join) use ($username){
            $join->on('offerta.user_id', '=', 'users.id')
                 ->where('users.username', '=', $username);
        })
        ->get();
        return $offertautente;
    }

    public function get_offerte_opzionate($id){
        $offerte_opz= Offerta::where('id')
            ->whereIn("offerta.id", function($query){
                    $query->from("opzionamento")
                            ->select("offerta_id")
                            ->where("opzionamento.user_id", "=", 1);
            })
            ->get();
        return $offerte_opz;
    }


}
