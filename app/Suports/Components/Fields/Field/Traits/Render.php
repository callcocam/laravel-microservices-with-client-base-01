<?php


namespace App\Suports\Components\Fields\Field\Traits;


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
