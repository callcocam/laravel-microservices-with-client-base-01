<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\Support\Components\Fields\Field\Traits;


trait Radio
{

    protected $options = [];

    public function radio($options=[]){

        $this->options = $options;

        $this->type = "radio";

        $this->cellRenderFramework = "CellRendererRadio";

        return $this;
    }

    /**
     * @return array
     */
    protected function options(): array
    {
        return $this->options;
    }


}
