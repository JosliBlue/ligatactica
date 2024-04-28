<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'url_foto',
        'user_id',
        'status'
    ];

    public function user()
    {
        // Un team pertenece a un usuario
        return $this->belongsToOne(User::class);
    }

    public function divisions()
    {
        // Un team puede tener/estar en varias divisions
        return $this->hasMany(Division::class);
    }
}
