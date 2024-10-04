<?php


namespace App\Models;

use Spatie\Permission\Models\Role as SpatieRole;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CustomRole extends SpatieRole
{
    protected $table = 'roles';
    // One-to-many relationship with PostType
    public function postTypes()
    {
        return $this->belongsToMany(PostType::class, 'custom_role_post_type'); // Ensure this is correct
    }
    public function admins(){
        return $this->belongsToMany(Admin::class, 'admin_role');
    }

    public function permissions(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'role_has_permissions','role_id','permission_id');
    }

}
?>
