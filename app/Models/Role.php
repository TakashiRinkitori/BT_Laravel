<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name', 'guard_name'];

    public function admins()
    {
       return $this->belongsToMany(AdminModel::class, 'admin_role', 'role_id', 'admin_id');
    }
}
