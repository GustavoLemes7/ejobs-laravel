<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidate_id',
        'job_listing_id',
        'applied_at',
        'status',
    ];

    public function Job(){
        return $this->belongsTo(Job::class);
    }

    public function Candidate(){
        return $this->BelongsTo(Candidate::class);
    }
}