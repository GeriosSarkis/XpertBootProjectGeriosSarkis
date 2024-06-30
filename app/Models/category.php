<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{

    protected $table = "table_category";
    use HasFactory;

    public function post(){
        $this->belongsTo(Post::class);
    }

}