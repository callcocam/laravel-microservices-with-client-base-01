<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\Support\Components\Fields\Field\Traits;


trait MultipleCheckbox
{

    public function multiple_checkbox($options=[], $defaults=null){

        $this->options=$options;

        $this->type = "multiple_checkbox";

        $this->class('w-full mb-base');

        $this->defaults($defaults);

        return $this;
    }

}
