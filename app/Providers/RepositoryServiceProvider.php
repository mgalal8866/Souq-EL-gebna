<?php

namespace App\Providers;

use App\Repository\DBCartRepository;
use Illuminate\Support\ServiceProvider;
use App\Repository\DBUserRepository;
use App\Repository\DBSlideRepository;
use App\Repository\DBCategoryRepository;
use App\Repository\DBItemsRepository;
use App\Repository\DBOrderRepository;
use App\Repositoryinterface\UserRepositoryinterface;
use App\Repositoryinterface\Sliderepositoryinterface;
use App\Repositoryinterface\CategoryRepositoryinterface;
use App\Repositoryinterface\ItemsRepositoryinterface;
use App\Repositoryinterface\OrderRepositoryinterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
       
        $this->app->bind(OrderRepositoryinterface::class, DBOrderRepository::class);
        $this->app->bind(CategoryRepositoryinterface::class, DBCartRepository::class);
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
