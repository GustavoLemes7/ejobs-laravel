<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model {

use HasFactory;

protected $fillable = [
        'user_id',
        'full_name',
        'cpf',
        'gender',
        'description',
        'resume_url',
        'profile_photo_url',
        'birth_date',
        'linkedin',
        'github',
        'contact_phone',
        'contact_email',
    ];

    protected function casts(): array
    {
        return [
            'birth_date' => 'date',
        ];
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

     public function experience(){
        return $this->hasMany(Experience::class);
    }

    public function education(){
        return $this->hasMany(Education::class);
    }

    public function skills(){
        return $this->hasMany(Skill::class);
    }
}