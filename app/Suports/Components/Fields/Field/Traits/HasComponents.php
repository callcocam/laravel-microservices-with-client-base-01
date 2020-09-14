<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Suports\Components\Fields\Field\Traits;


use App\Suports\Components\Fields\Field\Link;
use Illuminate\Support\Str;

trait HasComponents
{
    /**
     * @var array
     */
    protected $components = [];

    /**
     * @var bool
     */
    protected $hidden = false;

    public function actions($route){

        $this->components(
            [
                Link::make('Edit')->edit($route),
                Link::make('Show')->show($route),
                Link::make('Destroy')->destroy($route),
            ]
        )->hidden_edit();
        return $this;
    }
    /**
     * @param  array  $components
     * @param  bool  $hidden
     * @param  bool  $hiddenMessage
     *
     * @return $this
     */
    public function components(array $components = []): self
    {
        $this->type = "Action";
        $this->components = $components;
        $this->cellRenderFramework = "CellRendererArrayComponents";
        return $this;
    }

    /**
     * @param $component
     *
     * @return $this
     */
    public function addComponent($component): self
    {
        $this->components[] = $component;

        return $this;
    }

    /**
     * @return bool
     */
    public function hasComponents(): bool
    {
        return count($this->components) > 0;
    }


    protected function component(&$component,$key, $value){

        $component[$key] = $value;

        return $component;
    }

    protected function attrs(&$attributes, $model){

        $attrs = $attributes;
        if($attrs){
            if(isset($attrs['href']) && is_callable($attributes['href'])){
                $attributes['href'] = app()->call($attributes['href'],compact('model'));
            }
        }
        return $attributes;
    }
}
