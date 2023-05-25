<?php

namespace App\Providers;


use App\Models\User;
use Illuminate\Support\Facades\Gate;
use App\Models\Article;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        \App\Models\Article::class => \App\Policies\ArticlePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
    Gate::before(function (User $user, string $ability) {
    if ($user->isAdmin()) {
        return true;
    }
});
    }
}
