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



    public function admin()
    {
        return $this->belongsToMany(admin::class,"post_admin");

    }
    public function media()
    {
        return $this->belongsToMany(media::class,"post_media");
    }
    public function category()
    {
        return $this->belongsToMany(category::class,"post_category")
        ;

    }
    public function attach_category(int $category_id)
    {
        return $this->category()->attach($category_id);
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