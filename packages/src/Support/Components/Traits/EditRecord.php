<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\Support\Components\Traits;

use Illuminate\Database\Eloquent\Builder;

trait EditRecord {

    public function edit(Builder $builder){

        $this->model = $builder->where($builder->getModel()->getKeyName(), $this->id)->first();

        $this->getAttrByAttribute($this->model);

        return $this->data;
    }
}
