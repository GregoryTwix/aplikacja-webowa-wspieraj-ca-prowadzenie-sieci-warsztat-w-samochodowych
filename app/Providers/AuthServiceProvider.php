<?php

namespace App\Providers;

use App\Models\Invoice;
use App\Models\Permissions;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
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

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('client', function (User $user) {
            return !Permissions::where('user_id', Auth::user()->id)->where('permissions_level', '>', 1)->exists();
        });

        Gate::define('staff', function (User $user) {
            return $user->permissions_level == 2;
        });

        Gate::define('manager', function (User $user) {
            return $user->permissions_level == 3;
        });

        Gate::define('owner', function (User $user) {
            return Permissions::where('user_id', Auth::user()->id)->where('permissions_level', 4)->exists();
        });

        Gate::define('manageUsers', function (User $user) {
            return Permissions::where('user_id', Auth::user()->id)->where('permissions_level', 4)->exists();
        });

        Gate::define('showWorkshops', function (User $user) {
            return Permissions::where('user_id', Auth::user()->id)->where('permissions_level', '>', 1)->exists();
        });

        Gate::define('workshop', function (User $user, $id) {
            $permissionValue =  Permissions::where('user_id', Auth::user()->id)
                ->where('permissions_level', '>', 1)
                ->where('workshop_id', $id)
                ->exists();

            $checkOwner =  Permissions::where('user_id', Auth::user()->id)
                ->where('permissions_level', 4)
                ->exists();

            if($permissionValue == 1 || $user->permissions_level == 4 || $checkOwner == 1) {
                return true;
            }

        });

        Gate::define('manageClients', function (User $user, $id) {
            return Permissions::where('user_id', Auth::user()->id)
                ->where('permissions_level', 2)
                ->where('workshop_id', $id)
                ->exists();
        });

        Gate::define('calendar', function (User $user, $id) {
            return Permissions::where('user_id', Auth::user()->id)
                ->where('permissions_level', '>', 1)
                ->where('workshop_id', $id)
                ->exists();
        });

        Gate::define('delivers', function (User $user, $id) {
            return Permissions::where('user_id', Auth::user()->id)
                ->where('permissions_level', '>', 2)
                ->where('workshop_id', $id)
                ->exists();
        });

        Gate::define('invoiceManage', function (User $user, $id) {
            return Permissions::where('user_id', Auth::user()->id)
                ->where('permissions_level', '>', 1)
                ->where('workshop_id', $id)
                ->exists();
        });

        Gate::define('invoiceShow', function (User $user, $id) {
            $isStaff = Permissions::where('user_id', Auth::user()->id)
                ->where('permissions_level', '>', 1)
                ->where('workshop_id', $id)
                ->exists();

            $isInvoiceClient = Invoice::where('user_id', Auth::user()->id)
                ->exists();

            if($isInvoiceClient || $isStaff) {
                return true;
            }
        });

        Gate::define('warehouse', function (User $user, $id) {
            return Permissions::where('user_id', Auth::user()->id)
                ->where('permissions_level', '>', 1)
                ->where('workshop_id', $id)
                ->exists();
        });

        Gate::define('calendarApprove', function (User $user, $id) {
            return Permissions::where('user_id', Auth::user()->id)
                ->where('permissions_level', '>', 2)
                ->where('workshop_id', $id)
                ->exists();
        });

        Gate::define('clientsManage', function (User $user, $id) {
            return Permissions::where('user_id', Auth::user()->id)
                ->where('permissions_level', '>', 1)
                ->where('workshop_id', $id)
                ->exists();
        });

        Gate::define('raport', function (User $user, $id) {
            return Permissions::where('user_id', Auth::user()->id)
                ->where('permissions_level', '>', 2)
                ->where('workshop_id', $id)
                ->exists();
        });

        Gate::define('userVisits', function (User $user) {
            return Permissions::where('user_id', Auth::user()->id)
                ->exists();
        });
    }
}
