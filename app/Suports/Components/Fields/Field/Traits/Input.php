<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Suports\Components\Fields\Field\Traits;


trait Input
{

    public function input(){

        $this->type = "text";

        $this->class('w-full mb-base');

        return $this;
    }
}
