<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\Http\Menu\Routes\Traits;


use Illuminate\Support\Facades\Route;

trait Resource
{

    public function resources($path, $resource, $route)
    {

        if (!Route::has(sprintf('admin.%s.index', strtolower($route))) && !Route::has(strtolower($route))) {
           $this->route->namespace('Http\\Controllers\\Api')->resource($this->pattern($path), $resource)->names([
                'index' => sprintf('admin.%s.index', strtolower($route)),
                'create' => sprintf('admin.%s.create', strtolower($route)),
                'store' => sprintf('admin.%s.store', strtolower($route)),
                'show' => sprintf('admin.%s.show', strtolower($route)),
                'edit' => sprintf('admin.%s.edit', strtolower($route)),
                'update' => sprintf('admin.%s.update', strtolower($route)),
                'destroy' => sprintf('admin.%s.destroy', strtolower($route)),
            ])->parameters([
                strtolower($route) => 'id'
            ]);

            if ($this->middleware) {
                $this->route->middleware($this->middleware);
            }
            $this->middleware = null;
        }
    }

}
