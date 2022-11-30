<?php

namespace App\Providers;

use App\Models\Recht;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
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
    //public function boot(GateContract $gate)
    public function boot()
    {
        $this->registerPolicies();

        // Implicitly grant "Super-Admin" role all permission checks using can()
        Gate::before(function ($user, $ability) {
            if ($user->hasRole('Super-Admin')) {
                return true;
            }
        });

        foreach($this->gibRechte() as $recht) {
            Gate::define($recht->name, function($user) use ($recht) {
               return $user->hatRolle($recht->rollen);
            });
        }
    }

    protected function gibRechte()
    {
        return Recht::with('rollen')->get();
    }

}
