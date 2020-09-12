<?php

namespace App\Providers;

use App\Suports\Acl\AclServiceProvider;
use App\Suports\Tenant\TenantServiceProvider;
use Illuminate\Routing\Router;
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
        $this->app->register(TenantServiceProvider::class);
        $this->app->register(AclServiceProvider::class);

        $this->app->bind(
            'AutoRoute',
            function ($app) {
                return new \App\Http\Spatie\Routes\AutoRouteGenerate(app(Router::class));
            }
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //AutoGenerate::make()->load()->routes();
    }
}
