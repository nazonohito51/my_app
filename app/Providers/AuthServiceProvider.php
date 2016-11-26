<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        $gate->define('create-tweet', function ($user) {
            return true;
        });
        $gate->define('update-tweet', function ($user, $tweet) {
            return $user->id == $tweet->user_id;
        });
        $gate->define('delete-tweet', function ($user, $tweet) {
            return $user->id == $tweet->user_id;
        });

        $gate->define('update-user_profile', function ($user, $user_profile) {
            return $user->id == $user_profile->user_id;
        });
    }
}
