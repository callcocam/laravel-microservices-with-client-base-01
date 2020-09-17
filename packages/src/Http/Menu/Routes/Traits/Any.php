<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\Http\Menu\Routes\Traits;


trait Any
{

    /**
     * @param $path /posts
     * @param $controller PostController
     * @param string $method get, post, put, delete
     * @param string $route post
     * @return mixed
     */
    public function any($path, $controller, $method, $route = '')
    {
        $router = $this->route->any($this->pattern($path), sprintf("%s@%s", $controller, $method));
        return $this->register($router, $route);
    }

}
