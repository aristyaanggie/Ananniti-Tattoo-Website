<?php

declare(strict_types=1);

namespace App\Providers;

use App\Repositories\BookingRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\Contracts\BookingRepositoryInterface;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Contracts\ReviewRepositoryInterface;
use App\Repositories\Contracts\SectionRepositoryInterface;
use App\Repositories\Contracts\SettingRepositoryInterface;
use App\Repositories\ProductRepository;
use App\Repositories\ReviewRepository;
use App\Repositories\SectionRepository;
use App\Repositories\SettingRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(SectionRepositoryInterface::class, SectionRepository::class);
        $this->app->bind(BookingRepositoryInterface::class, BookingRepository::class);
        $this->app->bind(ReviewRepositoryInterface::class, ReviewRepository::class);
        $this->app->bind(SettingRepositoryInterface::class, SettingRepository::class);
    }

    public function boot(): void
    {
        //
    }
}
