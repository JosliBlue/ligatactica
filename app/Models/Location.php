<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'barrio',
        'calle_1',
        'calle_2',
        'url_foto'
    ];

    public function games()
    {
        // Una location puede tener/estar en varios games
        return $this->hasMany(Game::class);
    }
}
