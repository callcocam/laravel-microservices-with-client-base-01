<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\Support\Components\Fields\Field\Traits;


trait Select
{

    public function select($options=[]){

        $this->options = $options;

        $this->type = "select";


        return $this;
    }


}
