<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    public function games()
    {
        // Una location puede tener/estar en varios games
        return $this->hasMany(Game::class);
    }
}
