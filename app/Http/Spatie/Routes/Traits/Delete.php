<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Spatie\Routes\Traits;


trait Delete
{

    /**
     * @param $path /posts
     * @param $controller PostController
     * @param string $method delete
     * @param string $route post
     * @return mixed
     */
    public function delete($path, $controller, $method = 'delete', $route = '')
    {
        $router = $this->route->delete($this->pattern($path), sprintf("%s@%s", $controller, $method));
        return $this->register($router, $route);
    }
}
