<?php


namespace App\Suports\Traits;


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
