<?php

namespace App\Providers;

use App\Modules\Admin\Role\Models\Role;
use App\Modules\Admin\Role\Policies\RolePolicy;
use App\Modules\Admin\Sources\Models\Source;
use App\Modules\Admin\Sources\Policies\SourcePolicy;
use App\Modules\Admin\User\Models\User;
use App\Modules\Admin\User\Policies\UserPolicy;
use Carbon\Carbon;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Role::class => RolePolicy::class,
        User::class => UserPolicy::class,
        Source::class => SourcePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();

        Passport::tokensExpireIn(Carbon::now()->addDays(30));

        Passport::refreshTokensExpireIn(Carbon::now()->addDays(45));
    }
}
