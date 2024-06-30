<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    use HasFactory;
    protected $table = "table_admin";
    public function posts(){
        return $this->belongsToMany(Post::class);
    }
    public function roles(){
        return $this->belongsTo(admin::class);
    }
}