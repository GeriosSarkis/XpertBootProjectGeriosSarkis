<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "post";
    use HasFactory;
    protected $fillable = ["title", "content", "Image_id"];
    public function admin()
    {
        return $this->belongsToMany(admin::class,"posts_admins");

    }
    public function medias()
    {
        return $this->belongsToMany(media::class,"posts_medias");
    }
    public function category()
    {
        return $this->belongsToMany(category::class,"posts_category")
        ;

    }
    public function attach_Category(int $category_id)
    {
        $this->category()->attach($category_id);
    }
    public function attach_Meidas(int $media_id)
    {
        $this->medias()->attach($media_id);
    }
}