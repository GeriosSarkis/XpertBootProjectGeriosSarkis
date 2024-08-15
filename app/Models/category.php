<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Filters\V1\QueryFilter;

class category extends Model
{

    protected $table = "category";
    protected $fillable=["name"];

    use HasFactory;

    public function post(){
        $this->belongsToMany(Post_PostType::class);
    }

    public function scopeFilter(Builder $builder, QueryFilter $filters) {
        return $filters->apply($builder);
    }

}
