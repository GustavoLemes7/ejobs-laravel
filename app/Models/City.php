<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'ibge_code',
        'name',
        'latitude',
        'longitude',
        'capital',
        'ddd',
        'timezone',
        'siafi_id',
        'state_id',
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}