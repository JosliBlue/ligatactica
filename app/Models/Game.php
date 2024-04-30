<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $fillable = [
        'division_1_id',
        'division_2_id',
        'fecha',
        'location_id',
        'resultado_division_1',
        'resultado_division_2',
        'status'
    ];

    public function location()
    {
        // Un game puede estar solo en una location
        return $this->belongsTo(Location::class,'location_id');
    }

    public function division1()
    {
        return $this->belongsTo(Division::class, 'division_1_id');
    }

    public function division2()
    {
        return $this->belongsTo(Division::class, 'division_2_id');
    }
}
