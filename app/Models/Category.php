<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Filters\V1\QueryFilter;

class Category extends Model
{


    use HasFactory;
    protected $table = 'categories';

    protected $guarded=[];

    public function categries_posts_types(){
        return $this->belongsToMany(PostType::class, 'categories_posts_types'); // Explicitly set the pivot table
    }

    public function scopeFilter(Builder $builder, QueryFilter $filters) {
        return $filters->apply($builder);
    }

}
