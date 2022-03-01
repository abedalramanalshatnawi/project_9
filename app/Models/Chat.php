<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    protected $fillable = [
       
    ];

    public function expert() {
        $this->belongsTo(Expert::class);
    }
    public function user() {
        $this->belongsTo(User::class);
    }

    public function message(){
        return $this->hasMany(Message::class);
    }
}
