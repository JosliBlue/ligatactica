<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;


    public function location()
    {
        // Un game puede estar solo en una location
        return $this->belongsTo(Location::class);
    }
}
