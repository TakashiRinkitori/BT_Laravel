<?php

namespace App\Policies;

use App\Models\AdminModel;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AdminModel  $adminModel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, AdminModel $adminModel)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\AdminModel  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(AdminModel $admin)
    {
        // dd($admin->id);
        // return false;
        return $admin->hasRole('admin');

        // return $admin->role === 'admin';
        // return $admin->roles()->where('name', 'admin')->exists();
    }
    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AdminModel  $adminModel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(AdminModel $admin)
    {
        return $admin->hasRole('admin');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AdminModel  $adminModel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(AdminModel $admin)
    {
        return $admin->hasRole('admin');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AdminModel  $adminModel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, AdminModel $adminModel)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AdminModel  $adminModel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, AdminModel $admin)
    {
        return $admin->role === 'admin';
    }
}
