<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Suports\Components\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Edit {

    public function edit(Builder $builder){

        $results = $builder->where($builder->getModel()->getKeyName(), $this->id)->first();

        $this->getAttrByAttribute($results);

        return $this->data;
    }
}
