<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Suports\Components;

use App\Suports\Components\Fields\AbstractField;
use App\Suports\Components\Fields\Field\Traits\WithParameters;
use App\Suports\Components\Traits\Attribute;
use App\Suports\Components\Traits\NewRecord;
use App\Suports\Components\Traits\EditRecord;
use App\Suports\Components\Traits\Foreign;
use App\Suports\Components\Traits\Pagination;
use App\Suports\Components\Traits\Search;
use App\Suports\Components\Traits\Sorting;
use App\Suports\Components\Traits\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

abstract class AbstractComponent {

use Search, Sorting, Foreign, Attribute, Pagination, Table, WithParameters, EditRecord, NewRecord;

    protected $components;
    /**
    * @var Request
    */
    private $request;
    /**
     * @var null
     */
    private $id;

    /**
     * AbstractComponent constructor.
     * @param Request $request
     * @param null $id
     */
    public function __construct(Request $request, $id=null) {

        $this->request = $request;

        $this->updatesQueryString = array_merge($this->updatesQueryString,$request->query());

        $this->id = $id;
    }

    /**
     * @return AbstractField
     */
  abstract  public function columns();

  public function filter(Builder $builder){


       if ($this->searchEnabled && in_array($this->search_query,array_keys($this->updatesQueryString)) && !empty(trim($this->updatesQueryString[$this->search_query]))) {

            $builder->where(function (Builder $builder) {

                foreach ($this->columns() as $column) {

                    if ($column->searchable) {
                        if (is_callable($column->searchCallback)) {

                            $builder = app()->call($column->searchCallback, ['builder' => $builder, 'term' => $this->updatesQueryString[$this->search_query]]);

                        } elseif (Str::contains($column->name, '.')) {

                            $relationship = $this->relationship($column->name);

                            $builder->orWhereHas($relationship->attribute, function (Builder $builder) use ($relationship) {

                                $builder->where($relationship->attribute, 'like', '%'.$this->updatesQueryString[$this->search_query].'%');

                            });

                        } else {
                            $builder->where($builder->getModel()->getTable().'.'.$column->name, 'like', '%'.$this->updatesQueryString[$this->search_query].'%');

                        }
                    }

                }
            });
        }
        $this->sortField = $this->getUpdatesQueryString('column', 'id');

        $this->sortDirection = $this->getUpdatesQueryString('direction', 'asc');

        if (Str::contains($this->sortField, '.')) {

            $relationship = $this->relationship($this->sortField);

            $sortField = $this->attribute($builder, $relationship->attribute, $relationship->attribute);

        } else {

            $sortField = $this->sortField;

        }

        if (($column = $this->getColumnByAttribute($this->sortField)) !== null && is_callable($column->sortCallback)) {

            return app()->call($column->sortCallback, ['builder' => $builder, 'direction' => $this->sortDirection]);

        }

        if($this->paginationEnabled):
            $results = $builder->orderBy($sortField, $this->sortDirection)->paginate($this->getUpdatesQueryString($this->perPageName),["*"], $this->pageName);
        else:
            $results = $builder->orderBy($sortField, $this->sortDirection)->get();
       endif;

       $this->getAttrByAttribute();
       if($results){
          $this->getAttrResultByAttribute($results);
       }

       $this->getOptionsAttributes();

       return $this->data;
    }

    private function getUpdatesQueryString($key, $default=null){

      if(isset($this->updatesQueryString[$key]))
          return $this->updatesQueryString[$key];

      return $default;
    }
}
