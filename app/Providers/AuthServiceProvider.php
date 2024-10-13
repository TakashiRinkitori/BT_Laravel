<?php

namespace App\Providers;

use App\Models\AdminModel;
use App\Models\ProjectModel;
use App\Models\TaskModel;
use App\Policies\AdminPolicy;
use App\Policies\ProjectPolicy;
use App\Policies\Task;
use App\Policies\TestPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        // TaskModel::class => TestPolicy::class,
        TaskModel::class => Task::class,
        // App\Models\AdminModel::class => App\Policies\AdminPolicy::class,
        AdminModel::class => AdminPolicy::class,
        // App\Models\TaskModel::class => App\Policies\TaskPolicy::class,
        ProjectModel::class => ProjectPolicy::class,

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(){
        $this->registerPolicies();

        Gate::define('manage-user', function ($user) {
            return $user->hasRole('admin') || $user->hasRole('editor');
        });

        Gate::define('view-project', function ($user) {
            return $user->hasRole('user');
        });
    }
}
