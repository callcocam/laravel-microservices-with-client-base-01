<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\Support\Components\Fields\Field\Traits;


trait Render
{

  protected $cellRenderFramework = null;


    /**
     * @param null $cellRenderFramework
     */
    public function cellRenderFramework($cellRenderFramework): self
    {
        $this->cellRenderFramework = $cellRenderFramework;

        return $this;
    }

}
