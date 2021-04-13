<?php

namespace App\Providers;

use App\Models\Permissions;
use App\Models\Role;
use App\Models\Workshop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $workshops = Workshop::all();
        view()->share('workshops', $workshops);

        view()->composer('*', function ($view)
        {
            $userRole = Permissions::where('user_id', Auth::id())->orderBy('permissions_level', 'desc')->first();
            $roleName = '';

            if($userRole) {
                $role = Role::where('id', $userRole->permissions_level)->first();
                $roleName = $role->name;
            }

            $view->with('role', $roleName);
        });

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
