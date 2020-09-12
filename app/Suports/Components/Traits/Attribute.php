<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Suports\Components\Traits;


use Illuminate\Support\Str;

trait Attribute
{

    protected $columns = [];
    protected $data = [];
    protected $options = [];
    /**
     *
     * @return mixed|null
     */
    protected function getAttrByAttribute($results=null)
    {
        $this->columns = [];

        foreach ($this->columns() as $col) {
            $this->columns[$col->name] = [
                'type'=>$col->type,
                'text'=>$col->text,
                'name'=>$col->name,
                'searchable'=>$col->searchable,
                'sortable'=>$col->sortable,
                'html'=>$col->html,
                'options'=>$col->options,
                'formRenderFramework'=>sprintf("FormRenderer%s", Str::title($col->type)),
                'cellRenderFramework'=>$col->cellRenderFramework,
                'attributes'=>$col->getAttributes()
            ];
            if($results){
                $data = $results->toArray();
                if(isset($data[$col->name])){
                    $this->columns[$col->name]['value'] = $data[$col->name];
                }
            }
        }
        if($results){
            $this->data['data'] = $this->columns;
        }
        else{
            $this->data['columns'] = $this->columns;
        }

        return $this;
    }
    /**
     *
     * @return mixed|null
     */
    protected function getAttrResultByAttribute($results)
    {
        $attribute =  $this->columns;

        $attributes = [];

        if($results->isNotEmpty()):
            foreach ($results->items() as $items):
                foreach ($this->columns() as $col) {
                    $attribute[$col->name]['value'] = $items[$col->name];
                    if($col->hasComponents()){
                        $attribute[$col->name]['components'] = $col->getComponents($items);
                    }
                }
                $attributes[] = $attribute;
            endforeach;
        endif;

        $this->data  = array_merge($this->data, $results->toArray());

        $this->data ['data']  = $attributes;

        return $this;
    }

    protected function getOptionsAttributes(){

        $this->data['options'] = [
            'stripe'       => $this->stripe,
            'hoverFlat'    => $this->hoverFlat,
            'maxHeight'    => $this->maxHeight,
            'multiple'     => $this->multiple,
            'notSpacer'    => $this->notSpacer,
            'search'       => $this->search,
            'pagination'   => $this->pagination,
            'maxItems'     => $this->maxItems,
            'state'        => $this->state,
            'sortKey'      => $this->sortKey,
            'noDataText'   => $this->noDataText,
            'sst'          => $this->sst
        ];

        return $this;
    }
}
