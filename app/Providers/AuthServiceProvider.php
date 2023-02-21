<?php

namespace App\Providers;

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

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
        // Gate::define('isSuperadmin', function ($userlog) {
        //     return $userlog->id_role == 1;
        // });

        // Gate::define('Pimpinan', function ($userlog) {
        //     return $userlog->id_role == '2';
        // });
        // Gate::define('Verifikator', function ($userlog) {
        //     return $userlog->id_role == '3';
        // });
        // Gate::define('Pendata', function ($userlog) {
        //     return $userlog->id_role == '4';
        // });
    }
}
