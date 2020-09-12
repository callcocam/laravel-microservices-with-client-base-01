<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Suports\Traits;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

trait HasScopeGenerate
{

    /**
     * set auto filter
     *
     * @param Builder $builder
     * @param Request $request
     * @param array $filters
     * @return void
     */
    public function scopeComponent(Builder $builder, Request $request, array $filters = [])
    {

        if ($this->getComponent()) {

            return app($this->getComponent(), compact('request'))->filter($builder);
        }

        return $builder->paginate(12);
    }

    /**
     * set auto filter
     *
     * @param Builder $builder
     * @param Request $request
     * @param $id
     * @return void
     */
    public function scopeEdit(Builder $builder, Request $request, $id)
    {

        if ($this->getComponent()) {

            return app($this->getComponent(), compact('request','id'))->edit($builder);
        }

        return $builder->find($id);
    }

}
