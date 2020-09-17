<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\Support\Components\Fields\Field\Traits;


trait CheckboxGroup
{

    protected $headings = [];

    public function checkbox_group($options=[]){

        $this->options=$options;

        $this->type = "checkbox_group";

        $this->class('w-full mb-base');

        return $this;
    }

    /**
     * @param array $headings
     */
    public function headings(array $headings): self
    {
        $this->headings = $headings;

        return $this;
    }

}
