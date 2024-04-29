<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    protected $fillable = [
        'rango',
        'tipo',
        'genero',
        'team_id',
        'season_id'
    ];

    public function team()
    {
        // Una division pertenece a una solo team
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function season()
    {
        // Una division pertenece a una temporada
        return $this->belongsTo(Season::class, 'season_id');
    }

    public function players()
    {
        // Una division puede tener/estar en varios player
        return $this->hasMany(Player::class);
    }
}
