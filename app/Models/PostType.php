<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostType extends Model
{

    protected $guarded=[];
    ///from _POSTTye to PostTypassad
    use HasFactory;
    protected $table = 'post_type';
    public function posts()
    {
        return $this->belongsToMany(Post::class,"post__post_type_id");
    }
    public function category_post_type()
    {
        return $this->belongsToMany(Category::class, "post_type_category");


    }


}
