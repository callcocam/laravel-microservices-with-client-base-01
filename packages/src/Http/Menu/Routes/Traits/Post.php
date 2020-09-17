<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\Http\Menu\Routes\Traits;


trait Post
{

    /**
     * @param $path /posts
     * @param $controller PostController
     * @param string $method store
     * @param string $route post
     * @return mixed
     */
    public function post($path, $controller, $method = 'store', $route = '')
    {
        $router = $this->route->post($this->pattern($path), sprintf("%s@%s", $controller, $method));

        return $this->register($router, $route);
    }


}
