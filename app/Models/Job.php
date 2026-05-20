<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'title',
        'modality',
        'work_schedule',
        'contract_type',
        'salary',
        'description',
        'requirements',
        'status',
        'company_id',
        'position_id',
        'category_id',
    ];

    protected function casts(): array
    {
        return [
        ];
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function position(){
        return $this->belongsToMany(Position::class);
    }

    public function category(){
        return $this->belongsToMany(Category::class);
    }
}