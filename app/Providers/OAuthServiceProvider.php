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
        //ʹ��singleton�󶨵���
        $this->app->singleton('oauth',function(){
            $qq = $_GET['type'];
            return new OAuthService($qq);
        });

        //ʹ��bind��ʵ�����ӿ��Ա�����ע��
        $this->app->bind('App\Contracts\OAuthContract',function(){
            $qq = $_GET['type'];
            return new OAuthService($qq);
        });
    }
}
