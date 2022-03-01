<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'user_id',
        'expert_id',
        'consultation_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function expert() {
        return $this->belongsTo(Expert::class);
    }

    public function consultation() {
        return $this->belongsTo(Consultation::class);
    }
}
