<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\Http\Menu\Routes\Traits;


trait Get
{

    /**
     * @param $path /posts
     * @param $controller PostController
     * @param string $method index
     * @param string $route post
     * @return mixed
     */
    public function get($path, $controller, $method = 'index', $route = '')
    {
        $router = $this->route->get($this->pattern($path), sprintf("%s@%s", $controller, $method));
        return $this->register($router, $route);
    }

}
