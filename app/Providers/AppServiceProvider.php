<?php

namespace App\Providers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Password::defaults(static function (): Password {
            return Password::min(3)
                // ->letters()
                // ->mixedCase()
                // ->numbers()
                // ->symbols()
                // ->uncompromised()
                ;
        });

        Gate::define('view-user-tasks', function(User $user, Task $task){
            return $user->id == $task->user_id  || $user->role === 'admin';
        });

        Gate::define('isAdmin', function(User $user){
            return $user->role === 'admin' ? Response::allow() : Response::deny('you must be an admin');
        });
    }
}
