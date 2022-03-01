<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'consultation_name',
        'consultation_img',
        'title',
        'description',
        'expert_id',
        'category_id'
    ];

    // public function user(){
    //     return $this->hasMany(User::class); ////////////////*****////////// */
    // }

    public function expert(){
        return $this->belongsTo(Expert::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function Subscription(){
        return $this->hasMany(Subscription::class); 
    }

    public function comment() {
        return $this->hasMany(Comment::class);
    }

    // public function user(){
    //     return $this->belongsToMany(User::class); 
    // }
}
