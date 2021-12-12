<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\{
    CategoryRepository,
    UserRepository,
    ProfileRepository
};

use App\Repositories\Eloquent\{
    EloquentCategoryRepository,
    EloquentUserRepository,
    EloquentProfileRepository
};

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(CategoryRepository::class, EloquentCategoryRepository::class);
        $this->app->bind(UserRepository::class, EloquentUserRepository::class);
        $this->app->bind(ProfileRepository::class, EloquentProfileRepository::class);
    }
}
