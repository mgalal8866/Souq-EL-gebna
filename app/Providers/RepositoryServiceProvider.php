<?php

namespace App\Providers;

use App\Repository\DBUserRepository;
use App\Repository\DBSlideRepository;
use Illuminate\Support\ServiceProvider;
use App\Repository\DBCategoryRepository;
use App\Repositoryinterface\UserRepositoryinterface;
use App\Repositoryinterface\Sliderepositoryinterface;
use App\Repositoryinterface\CategoryRepositoryinterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryinterface::class, DBUserRepository::class);
        $this->app->bind(CategoryRepositoryinterface::class, DBCategoryRepository::class);
        $this->app->bind(Sliderepositoryinterface::class, DBSlideRepository::class);
        $this->app->bind(UserRepositoryinterface::class, DBUserRepository::class);

    }
    public function boot(): void
    {
        //
    }
}
