<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Model
{
    use HasRoles;
    use HasFactory;
    protected $fillable=["username", "email","password","phone_number"];

    public function posts(){
        return $this->belongsToMany(Post::class);
    }
    // Optional: If you need to reference post types specific to the admin's roles
    public function postTypes()
    {
        return $this->hasManyThrough(PostType::class, Role::class);
    }
    public function roles(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'admin_role'); // 'admin_role' is the pivot table
    }

}
