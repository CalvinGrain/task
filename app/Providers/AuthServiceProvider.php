<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Blogs;
use App\Models\news;
use App\Policies\BlogsPolicy;
use App\Policies\newsPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Blogs::class => BlogsPolicy::class,
        news::class => newsPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        //
    }
}
