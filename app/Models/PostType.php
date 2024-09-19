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
    public function category_post_type()
    {
        return $this->belongsToMany(Category::class,);


    }


}
