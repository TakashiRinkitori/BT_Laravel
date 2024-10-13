<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role ;
use Spatie\Permission\Models\Permission;


class RoleAndPermissionSeeder extends Seeder
{
    public function run()
    {
        // Tạo roles
        $adminRole = Role::create(['name' => 'admin', 'guard_name' => 'admin']);
        $editorRole = Role::create(['name' => 'editor', 'guard_name' => 'admin']);
        $userRole = Role::create(['name' => 'user', 'guard_name' => 'admin']);

        // Tạo permissions nếu cần
        // $permission = Permission::create(['name' => 'edit user']);

        // Gán permission cho role nếu cần
        // $adminRole->givePermissionTo($permission);
    }
}
