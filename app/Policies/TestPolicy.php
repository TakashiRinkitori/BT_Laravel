<?php

namespace App\Policies;

use App\Models\AdminModel;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TestPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function create(AdminModel $admin)
    {
        return $admin->hasRole('admin') || $admin->hasRole('editor');
    }
    public function update(AdminModel $admin)
    {
        return $admin->hasRole('admin') || $admin->hasRole('editor');
    }

    public function delete(AdminModel $admin)
    {
        return $admin->hasRole('admin');
    }
}
