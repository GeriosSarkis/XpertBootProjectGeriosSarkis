<?php

namespace Database\Seeders;

use App\Models\CustomRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Permissions
        Permission::create(['name' => 'create post type']);
        Permission::create(['name' => 'edit post type']);
        Permission::create(['name' => 'delete post type']);
        Permission::create(['name' => 'view post type']);

        // Create Roles and Assign Permissions
        $role = CustomRole::findByName('Editor'); // If the role is already created

        if (!$role) {
            $role = CustomRole::create(['name' => 'Editor']); // Create a new role if it doesn't exist
        }

        // Assign Permissions to the Role
        $role->givePermissionTo('create post type');
        $role->givePermissionTo('edit post type');
        $role->givePermissionTo('delete post type');
        $role->givePermissionTo('view post type');

    }
}
