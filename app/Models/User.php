<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /*
    Que campos del objeto pueden ser manipulados
    a travez de este modelo
    */
    protected $fillable = [
        'nombre',
        'email',
        'password',
        'date_birth',
        'status'
    ];

    /*
    Que campos no se van a poder manipular a travez del modelo
    no es necesario colocarlos
    (por default si no los pones en $fillable se colocan en $guarded)

    protected $guarded = [

    ];
    */

    /*
    Oculta los datos cuando queremos mostrarlos,
    por ejemplo si se hace una api este metodo oculta estos datos
    */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /*
    Al momento de manipular un valor, debe ser de tal tipo de dato
    */
    protected $casts = [
        /*
        'date_birth' => 'date',
        'status' => 'bool',
        */];

    public function team()
    {
        //Un user puede tener/estar en un equipo(pero hecho para que pueda tener mas)
        return $this->hasOne(Team::class);
    }
}
