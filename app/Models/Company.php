<?php
namespace App\Models;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model{

    use  HasFactory;

    protected $fillable = [
        'user_id',
        'trade_name',
        'legal_name',
        'description',
        'cnpj',
        'state_registration',
        'founded_at',
        'logo_url',
        'website_url',
        'employee_count',
        'contact_phone',
        'contact_email',
        
    ];

    protected function casts(): array
    {
        return [
            'opening_date' => 'date',
            'employee_count' => 'integer',
            'is_active' => 'boolean',
        ];
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

   public function job(){
        return $this->hasMany(Job::class);
   }

} 