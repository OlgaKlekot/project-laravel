<?php
namespace App\Models;

class Category extends Model
{
    protected $table = 'categories';
    public $timestamps = false;
    public function postsByCategory() {
        return $this->hasMany(Post::class, 'category_id', 'id');
    }
}