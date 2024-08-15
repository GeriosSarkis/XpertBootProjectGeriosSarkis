<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Filters\V1\QueryFilter;
class Post extends Model
{
    protected $table = "post";
    use HasFactory;
    protected $fillable = ["title", "content"];

    public function post_type() // Corrected naming convention
    {
        return $this->belongsTo(Post_PostType::class); // Assuming one post belongs to one post type
    }

    public function admin()
    {
        return $this->belongsToMany(admin::class,"post_admin");

    }
    public function category_post()
    {
        return $this->belongsToMany(category::class);


    }

    public function attach_category(int $category_id)
{
    return $this->category_post()->attach($category_id);
}
    public function media()
    {
        return $this->belongsToMany(media::class,"post_media");
    }


    public function attach_meida(int $media_id)
    {
       return  $this->media()->attach($media_id);
    }
    public function attach_admin(int $admin_id)
    {
        return  $this->admin()->attach($admin_id);
    }
    public function tags(){
        return $this->belongsToMany(tag::class,"post_tag");
    }
    public function scopeFilter(Builder $builder, QueryFilter $filters) {
        return $filters->apply($builder);
    }
}