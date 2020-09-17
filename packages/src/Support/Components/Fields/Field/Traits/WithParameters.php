<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\Support\Components\Fields\Field\Traits;


trait WithParameters
{


    public function refresh($route){

        return route(sprintf("admin.%s.index", $route));
    }

    public function endpoint($route){

        return route(sprintf("admin.%s.create", $route), $this->getUpdatesQueryParametersClean());
    }

    public function getUpdatesQueryParameters($model)
    {
        return ["id" => $model->getKey()];
    }


    public function getUpdatesQueryParametersClean()
    {
        return $this->resolveQuery();
    }

    public function resolveQuery()
    {
        // The "page" query string item should only be available
        // from within the original component mount run.
        return request()->query();
    }
}
