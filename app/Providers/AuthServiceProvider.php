<?php

namespace App\Providers;

<<<<<<< HEAD
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
=======
use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
>>>>>>> 1c1a40f38470702bb4ee55d074fd66a0766f56fb

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
<<<<<<< HEAD
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
=======
        'App\Model' => 'App\Policies\ModelPolicy',
>>>>>>> 1c1a40f38470702bb4ee55d074fd66a0766f56fb
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
<<<<<<< HEAD
    public function boot()
    {
        $this->registerPolicies();

        //
=======

    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        $gate->define('isSuperAdmin', function($user){
            return $user->user_role == 'SuperAdmin';
        });

        $gate->define('isAdmin', function($user){
            return $user->user_role == 'Admin';
        });

        $gate->define('isAuthor', function($user){
            return $user->user_role == 'Author';
        });

        $gate->define('isUser', function($user){
            return $user->user_role == 'User';
        });

>>>>>>> 1c1a40f38470702bb4ee55d074fd66a0766f56fb
    }
}
