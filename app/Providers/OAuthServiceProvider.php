<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\OAuthService;
class OAuthServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //使用singleton绑定单例
        $this->app->singleton('oauth',function(){
            $qq = $_GET['type'];
            return new OAuthService($qq);
        });

        //使用bind绑定实例到接口以便依赖注入
        $this->app->bind('App\Contracts\OAuthContract',function(){
            $qq = $_GET['type'];
            return new OAuthService($qq);
        });
    }
}
