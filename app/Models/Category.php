<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Filters\V1\QueryFilter;

class Category extends Model
{

    protected $table = "category";
    protected $guarded=[];

    use HasFactory;

    public function category_post_type(){
       return  $this->belongsToMany(PostType::class,"post_type_category","post_type_id");
    }
    public function scopeFilter(Builder $builder, QueryFilter $filters) {
        return $filters->apply($builder);
    }

}
