<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Spatie\Routes\Traits;


trait Put
{

    /**
     * @param $path /posts
     * @param $controller PostController
     * @param string $method update
     * @param string $route post
     * @return mixed
     */
    public function put($path, $controller, $method = 'update', $route = '')
    {
        $router = $this->route->put($this->pattern($path), sprintf("%s@%s", $controller, $method));
        return $this->register($router, $route);
    }

}
