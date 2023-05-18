<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $fillable = ['question_id','category_name_id'];
    use HasFactory;

    public function question(){
        return $this->belongsTo(Question::class, 'question_id');
    }

    public function category_name(){
        return $this->belongsTo(CategoryName::class, 'category_name_id');
    }
}
