<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nombre',
        'fecha_inicio',
        'fecha_fin',
        'status'
    ];

    public function divisions()
    {
        // Una season puede tener/estar en varias divisions
        return $this->hasMany(Division::class);
    }
}
