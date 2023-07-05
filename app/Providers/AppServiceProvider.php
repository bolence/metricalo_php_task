<?php

namespace App\Providers;

use App\Interfaces\BlogInterface;
use App\Policies\BlogPolicy;
use App\Services\BlogService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BlogInterface::class, BlogService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
