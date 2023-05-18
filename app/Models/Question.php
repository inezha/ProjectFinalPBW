<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Answer;

class Question extends Model
{
    protected $table = 'question';
    protected $fillable = ['question','image','user_id'];
    use HasFactory;

    public function answer(){
        return $this->hasMany(Answer::class, 'question_id');
    }
    
    public function category(){
        return $this->hasMany(Category::class, 'question_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

}
