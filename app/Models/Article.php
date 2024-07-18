<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id',
        'user_id',
        'img',
        'category_id',
        'title',
        'content',
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
       return  $this->belongsTo(Category::class);
    }
}
