<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Filters\V1\QueryFilter;

class Category extends Model
{

    protected $table = "category";
    protected $fillable=["name"];

    use HasFactory;

    public function post_type(){
        $this->belongsToMany(PostType::class);
    }
    public function scopeFilter(Builder $builder, QueryFilter $filters) {
        return $filters->apply($builder);
    }

}
