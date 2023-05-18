<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryName extends Model
{
    protected $table = 'category_name';
    protected $fillable = ['category'];
    use HasFactory;

    public function category(){
        return $this->hasMany(Category::class, 'question_id');
    }
}
