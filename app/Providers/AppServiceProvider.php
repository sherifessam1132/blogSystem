<?php

namespace App\Providers;

use App\Models\Channel;
use Illuminate\Filesystem\Cache;
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
//        \view()->share('channels',Channel::all());
        \view()->composer('*',function ($view){
           $channel=\Illuminate\Support\Facades\Cache::rememberForever('channels',function (){
              return Channel::all();
           });
           $view->with('channels',$channel);
        });
        Paginator::useBootstrap();

    }
}
