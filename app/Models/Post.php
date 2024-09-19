<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Filters\V1\QueryFilter;
class Post extends Model
{
    use HasFactory;
    protected $fillable = ["title", "content"];

    public function post_types() // Corrected naming convention
    {
        return $this->belongsTo(PostType::class); // Assuming one post belongs to one post type
    }
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function admin()
    {
        return $this->belongsToMany(Admin::class);

    }


    public function post_type()
{
    return $this->belongsTo(PostType::class);
}
    public function media()
    {
        return $this->belongsToMany(Media::class);
    }
    public function attach_post_type(int $post_type_id)
    {
        return $this->post_type()->attach($post_type_id);

    }


    public function attach_media(int $media_id)
    {
       return  $this->media()->attach($media_id);
    }

    public function attach_admin(int $admin_id)
    {
        return  $this->admin()->attach($admin_id);
    }
    public function attach_tag(int $tag_id)
    {
        return  $this->tags()->attach($tag_id);
    }

    public function scopeFilter(Builder $builder, QueryFilter $filters) {
        return $filters->apply($builder);
    }
}
