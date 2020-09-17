<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\Support\Components\Fields\Field\Traits;


trait Status
{

    protected $options = [];

    public function status($options=[]){

        $this->options = $options;

        $this->type = "status";

        //$this->cellRenderFramework = "CellRendererStatus";

        $this->setOptions(['draft'=>'Rascunho','published'=>'Publicado']);

        return $this;
    }

}
