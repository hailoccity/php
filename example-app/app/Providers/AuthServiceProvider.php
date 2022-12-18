<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
//        dd(User::find(1)->name);
        Gate::define('is-admin', function (User $user) {
//            if ($user->is_admin == 0){
//                dd('ok');
//            } else{
//                dd("Error");
//            }
//            dd($user->is_admin == "﻿1");
            return $user->is_admin =="﻿1";
        });
        //
    }
}
