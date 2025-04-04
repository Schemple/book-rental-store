<?php

namespace App\Providers;

use App\Repositories\Eloquent\BookRepositoryEloquent;
use App\Repositories\Interfaces\BookRepository;
use App\Services\BookService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(BookRepository::class, BookRepositoryEloquent::class);
        $this->app->singleton(BookService::class);

    }
}
