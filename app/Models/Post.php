<?php
namespace App\Models;

class Post extends Model
{
    protected $table = 'posts';
    public $timestamps = false;
    public function author()
    {
        return $this->belongsTo(\App\User::class, 'user_id', 'id');
    }
    public function type()
    {
        return $this->belongsTo(\App\Models\Category::class, 'category_id', 'id');
    }
}