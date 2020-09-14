<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Suports\Components\Traits;

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
            $col->model($results);
            $this->columns[$col->name] = $col->toArray();
            if($results){
                $data = $results->toArray();
                if(isset($data[$col->name])){
                    $this->columns[$col->name]['value'] = $data[$col->name];
                }
            }
        }

        $this->data['columns'] = $this->columns;

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
                    $col->model($items);
                    $attribute[$col->name]['value'] = $items[$col->name];
                    if($col->hasComponents()){
                        $attribute[$col->name]['components'] = $col->getComponents();
                    }
                }
                $attributes[] = $attribute;
            endforeach;
        endif;
        $source["current_page"] = $results->currentPage();
        $source["first_page_url"] = $results->total();
        $source["from"] = $results->firstItem();
        $source["last_page"] = $results->lastPage();
        $source["last_page_url"] = $results->previousPageUrl();
        $source["next_page_url"] = $results->nextPageUrl();
        $source["path"] = $results->total();
        $source["per_page"] = $results->perPage();
        $source["prev_page_url"] = $results->previousPageUrl();
        $source["to"] = $results->lastItem();
        $source["total"] = $results->total();
        $source["options"] = $results->getOptions();
        $this->data['source']  = $source;
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
