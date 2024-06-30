<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   protected $table="table_post";
    use HasFactory;
    protected $fillable = ["title", "content", "Image_id"];
    public function admin(){
       return  $this->belongsTo(admin::class);

    }
    public function medias(){
      return   $this->belongsToMany(media::class);
    }
    public function category(){
        return $this->belongsTo(category::class);

    }

}