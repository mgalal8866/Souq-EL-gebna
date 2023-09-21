<?php

namespace App\Providers;

use App\Repository\DBCategoryRepository;
use App\Repository\DBSlideRepository;
use App\Repository\DBUserRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositoryinterface\UserRepositoryinterface;

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
