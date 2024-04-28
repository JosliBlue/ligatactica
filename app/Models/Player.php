<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    public function division()
    {
        // Un jugador pertenece a una sola division
        return $this->belongsTo(Division::class);
    }
}
