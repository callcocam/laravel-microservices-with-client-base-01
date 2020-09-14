<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Suports\Components\Traits;

use Illuminate\Database\Eloquent\Builder;

trait NewRecord {

    public function newRecord(Builder $builder){

        $results = null;

        $this->getAttrByAttribute($results);

        return $this->data;
    }
}
