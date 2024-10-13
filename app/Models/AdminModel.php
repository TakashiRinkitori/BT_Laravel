<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;

class AdminModel extends Authenticatable
{
    use HasFactory, HasRoles;

    protected $table = 'admins';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getAuthPassword()
    {
        return $this->password;
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'admin_role', 'admin_id', 'role_id');
    }
    protected $casts = [
        'permissions' => 'array',
    ];

    public function hasPermission($permission)
    {
        return in_array($permission, $this->permissions);
    }
}
