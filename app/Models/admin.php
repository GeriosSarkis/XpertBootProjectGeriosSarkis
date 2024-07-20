<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    use HasFactory;
    protected $fillable=["username", "email","password","phone_number"];
    protected $table = "admin";
    public function posts(){
        return $this->belongsToMany(Post::class);
    }
    public function roles(){
        return $this->belongsTo(admin::class);
    }
}
