<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostType extends Model
{

    protected $guarded=[];
    ///from _POSTTye to PostTypassad
    use HasFactory;

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
    public function categories(){
        return $this->belongsToMany(Category::class, 'categories_posts_types'); // Explicitly set the pivot table
    }


}
