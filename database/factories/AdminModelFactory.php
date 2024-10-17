<?php

namespace Database\Factories;

use App\Models\AdminModel;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdminModelFactory extends Factory
{
    protected $model = AdminModel::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt('password'),
        ];
    }
    public function withRole($roleName = 'admin', $guardName = 'admin')
    {
        $admin = $this->create();
        $role = Role::firstOrCreate(['name' => $roleName, 'guard_name' => $guardName]);
        $admin->roles()->attach($role->id);

        return $admin;
    }
}
