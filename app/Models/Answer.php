<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;
use App\Models\User;

class Answer extends Model 
{
    use HasFactory;

    protected $table = 'answer';
    protected $fillable = ['answer', 'user_id', 'question_id'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function question(){
        return $this->belongsTo(Question::class, 'question_id');
    }

}