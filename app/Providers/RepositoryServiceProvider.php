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
        // $this->app->bind(CateoryAppRepositoryinterface::class, DBCateoryAppRepository::class);
        // $this->app->bind(CategoryRepositoryinterface::class, DBCategoryRepository::class);
        // $this->app->bind(ProductRepositoryinterface::class, DBProductRepository::class);
        // $this->app->bind(SettingRepositoryinterface::class, DBSettingRepository::class);
        // $this->app->bind(SliderRepositoryinterface::class, DBSliderRepository::class);
        // $this->app->bind(WishlistRepositoryinterface::class, DBWishlistRepository::class);
        // $this->app->bind(CouponRepositoryinterface::class, DBCouponRepository::class);
        // $this->app->bind(CartRepositoryinterface::class, DBCartRepository::class);
        // $this->app->bind(InvoRepositoryinterface::class, DBInvoRepository::class);
        // $this->app->bind(CommentRepositoryinterface::class, DBCommentRepository::class);
        // $this->app->bind(NotifictionRepositoryinterface::class, DBNotifictionRepository::class);
        // $this->app->bind(ClientPaymentRepositoryinterface::class, DBClientPaymentRepository::class);
        // $this->app->bind(UserDeliveryRepositoryinterface::class, DBUserDeliveryRepository::class);
        // $this->app->bind(ChatRepositoryinterface::class, DBChatRepository::class);
    }
    public function boot(): void
    {
        //
    }
}
