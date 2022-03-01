<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'total_price',
        'consultation_id',
        'user_id'
    ];

    public function consultation(){
        return $this->belongsTo(Consultation::class); 
    }

    // public function user(){
    //     return $this->belongsTo(User::class); 
    // }

     public function user(){
        return $this->belongsToMany(User::class, 'subscription_user'); 
    }
}
