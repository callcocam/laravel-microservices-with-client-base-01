<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Suports\Components\Fields\Field\Traits;


trait SwitchCase
{

    protected $switch;
    protected $equal;

    public function switch($switch, $equal){

        $this->type = "switch";

        $this->class('w-full mb-base');

        $this->cellRenderFramework("cellRenderSwitch");

        $this->switchRenderFramework("FormRendererText");

        $this->acceptSwitch($switch);

        $this->equalSwitch($equal);

        return $this;
    }

    /**
     * Template que sera uasado pode ser qualquer campo
     * @param $switchRenderFramework
     * @return $this
     */
    public function switchRenderFramework($switchRenderFramework):self
    {
        $this->switchRenderFramework = $switchRenderFramework;

        return $this;
    }

    /**
     * Qual campo do options sera verificado com o campo equal
     * @param $value
     * @return $this
     */
    public function acceptSwitch($value):self
    {
        $this->switch = $value;
        return $this;
    }

    /**
     * Qual coluna sera usada para comparar os valores ex:id, name ou status pode ser qualquer coluna da tabela
     * A comparação sera feita entre o campo equal e switch
     * @param $value
     * @return $this
     */
    public function equalSwitch($value):self
    {
        $this->equal = $value;

        return $this;
    }

    public function hasSwitch(){
        return $this->type === "switch";
    }
}
