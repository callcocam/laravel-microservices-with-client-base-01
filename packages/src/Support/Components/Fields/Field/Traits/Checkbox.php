<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\Support\Components\Fields\Field\Traits;


trait Checkbox
{

    public function checkbox(){

        $this->type = "checkbox";

        //$this->cellRenderFramework = "CellRendererCheckbox";

        return $this;
    }


}
