<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ["title", "content", "Image_id"];
    public function admin(){
       return  $this->belongsTo(admin::class);

    }
    public function medias(){
        $this->belongsToMany(media::class);
    }
    public function category(){
        $this->belongsToMany(category::class);

    }

}