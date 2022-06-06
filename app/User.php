<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Models\Resources\Offerta;
use App\Models\Resources\Opzionamento;
use Illuminate\Support\Facades\Log;

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
        'nome', 'cognome', 'username', 'data_nascita', 'tipologia', 'sesso', 'telefono', 'password',
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

    public function isAuth() {
        return Auth::check();
    }

    public function get_user($id){
        return User::find($id);
    }

    public function get_offerte_utente($username){
        $offertautente = Offerta::join('users', function($join) use ($username){
            $join->on('users.id', '=', 'offerta.user_id')
                 ->where('users.username', '=', $username);
        })
        ->get();
        return $offertautente;
    }

    public function get_locatario_from_opzionamentoId($id) {
        return User::join('opzionamento', function ($join) use ($id) {
            $join->on('users.id', '=', 'opzionamento.user_id')
            ->where('opzionamento.id', '=', $id);
        })
        ->get();    
    }

    public function get_richieste_opzionamento($id){
       return User::join('opzionamento', 'users.id', '=', 'opzionamento.user_id')
                    ->where('opzionamento.offerta_id', '=', $id)
                    ->distinct('users.username')
                    ->get(['users.*']);

    }

    public function get_locatori(){
        return User::where('tipologia', '=', 'l')->get(['id', 'nome', 'cognome']);
    }
}
