<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{
    use HasFactory;

    protected $fillable = [
        'expert_name',
        'email',
        'password',
        'expert_img',
        'bio',
        'certifications',
        'experience',
        'price_per_hours',
        'Consultation_id'
    ];

    public function consultation(){
        return $this->hasMany(Consultation::class);
    }
    
    public function comment(){
        return $this->hasMany(Comment::class);
    }

    public function chat(){
        return $this->hasMany(Chat::class);
    }
}
