<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Enums\Role;
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

        Gate::before(function ($user) {
            if ($user->role == Role::ADMIN) return true;
        });

        Gate::define("admin", function ($user) {
            if ($user->is_admin()) return true;
        });

        Gate::define("article", function ($user, $article) {
            if (!$article) return true;

            if ($user->is_author()) {
                if ($user->id == $article->author_id) return true;
            }

            if ($user->is_assistant()) {
                if (auth()->user()->article_access->find($article->id)) return true;
            }
        });

        Gate::define("approve", function ($user) {
            if ($user->is_assistant()) return true;
        });
    }
}
