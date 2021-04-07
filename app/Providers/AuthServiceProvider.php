<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    // action and roles 
    public static $permissions = [  
              
        'create-blog' => [1],
        'store-blog' => [1],
        'edit-blog' => [1],
        'update-blog' => [1],
        

        'admin' => [2],
        'approve-blog' => [2],
        'destroy-blog' => [1, 2],
        'index-user' =>[2],
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //

        
        // Roles based authorization

        //admin all
        // Gate::before(
        //     function ($user, $ability) {
        //         if ($user->role === 2) {
        //             return true;
        //         }
        //     }
        // );

        foreach (self::$permissions as $action=> $roles) {
            Gate::define(
                $action,
                function (User $user) use ($roles) {
                    if (in_array($user->roleid, $roles)) {
                        return true;
                    }
                }
            );
        }
    }
}
