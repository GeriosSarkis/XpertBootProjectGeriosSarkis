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

}
?>
