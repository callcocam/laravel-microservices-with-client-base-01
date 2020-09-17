<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\Support\Components\Fields\Field\Traits;


trait Input
{

    public function input(){

        $this->type = "text";

        $this->class('w-full mb-base');

        return $this;
    }

    /**
     * @param $type
     * @return $this
     */
    public function type($type){
        $this->type = $type;
        return $this;
    }
}
