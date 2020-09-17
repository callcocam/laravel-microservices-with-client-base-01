<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call;
use App\User;
use Call\Observers\RoleObserver;
use Call\Observers\UserObserver;
use Call\Support\Acl\AclServiceProvider;
use Call\Support\Tenant\TenantServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class CallServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->app->register(TenantServiceProvider::class);
        $this->app->register(AclServiceProvider::class);

        $this->app->bind(
            'AutoRoute',
            function ($app) {
                return new \Call\Http\Menu\Routes\AutoRouteGenerate(app(Router::class));
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

        User::observe(UserObserver::class);
        Role::observe(RoleObserver::class);
    }

}
