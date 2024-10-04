<?php

namespace Database\Seeders;

use App\Models\CustomRole;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create or update permissions if they already exist
        Permission::firstOrCreate(['name' => 'create post type'], ['guard_name' => 'web']);
        Permission::firstOrCreate(['name' => 'edit post type'], ['guard_name' => 'web']);
        Permission::firstOrCreate(['name' => 'delete post type'], ['guard_name' => 'web']);
        Permission::firstOrCreate(['name' => 'view post type'], ['guard_name' => 'web']);

        // Create or find the role 'Editor'
        $role = Role::firstOrCreate(['name' => 'Editor'], ['guard_name' => 'web']);

        // Assign Permissions to the Role
        $role->givePermissionTo('create post type');
        $role->givePermissionTo('edit post type');
        $role->givePermissionTo('delete post type');
        $role->givePermissionTo('view post type');
        Permission::firstOrCreate(['name' => 'view post types']);
        Permission::firstOrCreate(['name' => 'create post types']);
        Permission::firstOrCreate(['name' => 'edit post types']);
        Permission::firstOrCreate(['name' => 'delete post types']);

        // Create Roles and Assign Permissions
        $role = Role::firstOrCreate(['name' => 'Post Manager', 'guard_name' => 'admin']);
        $role->givePermissionTo('view post types');
        $role->givePermissionTo('create post types');
        $role->givePermissionTo('edit post types');
        $role->givePermissionTo('delete post types');

        // Assign role to an admin
        $admin = Admin::find(1);  // Find the admin by ID
        $admin->assignRole('Post Manager');
    }
}
