<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'chat_id',
        'text'
    ];

    public function user() {
        $this->belongsTo(Chat::class);
    }

    public function expert() {
        $this->belongsTo(Expert::class);
    }
}
