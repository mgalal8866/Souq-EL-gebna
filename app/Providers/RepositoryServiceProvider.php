<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\DBUserRepository;
use App\Repository\DBSlideRepository;
use App\Repository\DBCategoryRepository;
use App\Repository\DBItemsRepository;
use App\Repositoryinterface\UserRepositoryinterface;
use App\Repositoryinterface\Sliderepositoryinterface;
use App\Repositoryinterface\CategoryRepositoryinterface;
use App\Repositoryinterface\ItemsRepositoryinterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ItemsRepositoryinterface::class, DBItemsRepository::class);
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
