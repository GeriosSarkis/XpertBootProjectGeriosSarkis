<?php


namespace App\Http\Filters\V1;


class PostsFilter extends QueryFilter
{
    public function include($value) {
        return $this->builder->with($value);
    }
    public function title($value)
    {
        $likeStr = str_replace('*', '%', $value);
        return $this->builder->where('title', 'like', $likeStr);
    }
    public function category($value){
        return $this->builder->where("categort", $value);

    }
    public function updatedAt($value) {
        $dates = explode(',', $value);

        if (count($dates) > 1) {
            return $this->builder->whereBetween('updated_at', $dates);
        }

        return $this->builder->whereDate('updated_at', $value);
    }
    public function createdAt($value) {
        $dates = explode(',', $value);

        if (count($dates) > 1) {
            return $this->builder->whereBetween('created_at', $dates);
        }

        return $this->builder->whereDate('created_at', $value);
    }
}

?>