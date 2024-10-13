<?php

namespace App\Policies;

use App\Models\AdminModel;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
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

    public function viewAny(AdminModel $admin)
    {
        dd($admin);
    }
}
