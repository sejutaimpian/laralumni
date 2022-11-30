<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\AkunModel;
use App\Models\KabarModel;
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

        // Gate
        Gate::define('admin', function (AkunModel $user) {
            return $user->role == 'admin';
        });
        Gate::define('kabar', function (AkunModel $user, $idakun) {
            return $user->id == $idakun;
        });
    }
}
