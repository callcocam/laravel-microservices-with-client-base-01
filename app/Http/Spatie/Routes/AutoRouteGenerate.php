<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Spatie\Routes;


use App\Http\Spatie\Routes\Traits\Any;
use App\Http\Spatie\Routes\Traits\Delete;
use App\Http\Spatie\Routes\Traits\Get;
use App\Http\Spatie\Routes\Traits\Post;
use App\Http\Spatie\Routes\Traits\Put;
use App\Http\Spatie\Routes\Traits\Resource;
use Illuminate\Routing\Router;

class AutoRouteGenerate
{
    use Post, Put, Delete, Get, Any, Resource;

    protected $middleware;

    protected $pattern;

    /**
     * @var \Illuminate\Routing\Route
     */
    private $route;

    /**
     * AutoRouteDbService constructor.
     * @param \Illuminate\Routing\Router $route
     */
    public function __construct(Router $route)
    {
        $this->route = $route;
    }

    /**
     * @param $middleware
     * @return AutoRouteGenerate
     */
    public function setMiddleware($middleware)
    {

        $this->middleware = $middleware;

        return $this;
    }

    /**
     * @param $pattern
     * @return AutoRouteGenerate
     */
    public function setPattern($pattern)
    {
        $this->pattern = $pattern;

        return $this;
    }

    /**
     * @param $router
     * @param $route
     * @return mixed
     */
    protected function register($router, $route)
    {
        if (!empty($route)) {
            $router->name($route);
        }
        if ($this->middleware) {
            $router->middleware($this->middleware);
        }
        return $router;
    }

    /**
     * @param $resource
     * @return string
     */
    private function pattern($resource)
    {

        if (!empty($this->pattern)) {
            return sprintf("%s/%s", $resource, $this->pattern);
        }

        return $resource;
    }
}
