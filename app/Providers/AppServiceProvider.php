<?php

namespace App\Providers;

use App\Models\Channel;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
//        if ($this->app->isLocal()){
//            $this->app->register(  Barryvdh\Debugbar\LaravelDebugbar::class);
//        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \view()->share('channels',Channel::all());
        Paginator::useBootstrap();

    }
}
