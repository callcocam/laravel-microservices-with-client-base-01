<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\Support\Traits;


trait HasMenuGenerate
{

    protected $parent;

    protected $items=[];


    /**
     * @param  $item
     */
    public function setItem($item)
    {
        $this->items[] = $item;

        return $this;
    }

    /**
     * @param array $items
     */
    public function setItems(array $items)
    {
        foreach ($items as $item){

            $this->setItem($item);
        }

        return $this;
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

}
