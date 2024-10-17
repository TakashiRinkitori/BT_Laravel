<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AdminModel;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $admin = AdminModel::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456789'), // Hash mật khẩu trước khi lưu
        ]);

        // Chạy seeder cho role
        $this->call(RoleAndPermissionSeeder::class);

        // Gán vai trò cho admin
        $admin->assignRole('admin');
    }
}
