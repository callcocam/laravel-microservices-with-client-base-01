<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\Http\Menu\Routes;


use Call\Http\Menu\Routes\Traits\Any;
use Call\Http\Menu\Routes\Traits\Delete;
use Call\Http\Menu\Routes\Traits\Get;
use Call\Http\Menu\Routes\Traits\Post;
use Call\Http\Menu\Routes\Traits\Put;
use Call\Http\Menu\Routes\Traits\Resource;
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
     * @param $path /posts
     * @param $controller PostController
     * @param string $route post
     * @return mixed
     */
    public function actions($path, $controller, $action, $route)
    {
        $this->route->post($this->pattern($path),  sprintf("%s@%s", $controller, $action))->name($route);
   }

    /**
     * @param $path /posts
     * @param $controller PostController
     * @param string $route post
     * @return mixed
     */
    public function uploads($path, $controller, $route)
    {
        $this->route->post($this->pattern(sprintf("%s/upload/file",$path)), sprintf("%sController@uploadFile", $controller))->name(sprintf("upload.%s.up",$route));
        $this->route->post($this->pattern(sprintf("%s/remove/file",$path)), sprintf("%sController@removeFile", $controller))->name(sprintf("upload.%s.del",$route));
        $this->route->get($this->pattern(sprintf("%s/download/file",$path)), sprintf("%sController@downloadFile", $controller))->name(sprintf("upload.%s.down",$route));
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
