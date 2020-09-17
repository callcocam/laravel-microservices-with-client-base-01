<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\Support\Components\Fields\Field;


use Call\Support\Components\Fields\AbstractField;
use Call\Support\Components\Fields\Field\Traits\WithParameters;
use Illuminate\Support\Str;

class Link extends AbstractField
{
    use WithParameters;
    /**
     * Link constructor.
     *
     * @param $text
     */
    public function __construct($text = false)
    {
        if ($text) {
            $this->text($text);
        }
        $this->cellRenderFramework("ActionRenderLink");
        $this->pack("feather");
        $this->size("small");
        $this->class("mr-2");
        $this->label(null);
    }

    /**
     * @param $text
     *
     * @return self
     */
    public static function make($text): self
    {
        $column = new static($text);

        return $column;
    }

    /**
     * @param $text
     *
     * @return self
     */
    public function text($text): self
    {
        return $this->setAttribute('text', $text);
    }

    /**
     * @param $label
     *
     * @return self
     */
    public function label($label): self
    {
        return $this->setAttribute('label', $label);
    }

    /**
     * @param $pack
     *
     * @return self
     */
    public function pack($pack): self
    {
        return $this->setAttribute('pack', $pack);
    }

    /**
     * @param $color
     *
     * @return self
     */
    public function color($color): self
    {
        return $this->setAttribute('color', $color);
    }

    /**
     * @param $size
     *
     * @return self
     */
    public function size($size): self
    {
        return $this->setAttribute('size', $size);
    }

    /**
     * @param $class
     *
     * @return $this
     */
    public function class($class): self
    {
        return $this->setAttribute('class', $class);
    }

    /**
     * @param $id
     *
     * @return $this
     */
    public function id($id): self
    {
        return $this->setAttribute('id', $id);
    }

    /**
     * @param $icon
     *
     * @return $this
     */
    public function icon($icon): self
    {
        return $this->setAttribute('icon', $icon);
    }

    /**
     * @param $href
     *
     * @return $this
     */
    public function href($href): self
    {
        return $this->setAttribute('href', $href);
    }

    /**
     * @param $model
     *
     * @return $this
     */
    public function destroy($route): self
    {
        $this->cellRenderFramework("ActionRenderDestroy");
        $this->icon('icon-trash');
        $this->color('danger');
        return $this->href(function($model) use($route) {
            return [
                'name'=>sprintf('admin.%s.destroy', $route),
                'params'=>$this->getUpdatesQueryParameters($model),
                'query'=>$this->getUpdatesQueryParametersClean(),
            ];
        });
    }

    /**
     * @param $model
     *
     * @return $this
     */
    public function edit($route): self
    {
        $this->cellRenderFramework("ActionRenderEdit");
        $this->icon('icon-edit');
        $this->color('primary');
        return $this->href(function($model) use($route) {
            return [
                'name'=>sprintf('admin.%s.edit', $route),
                'params'=>$this->getUpdatesQueryParameters($model),
                'query'=>$this->getUpdatesQueryParametersClean(),
            ];
        });
    }

    /**
     * @param $href
     *
     * @return $this
     */
    public function show($route): self
    {
        $this->cellRenderFramework("ActionRenderShow");
        $this->icon('icon-eye');
        $this->color('warning');
        return $this->href(function($model) use($route) {
            return [
                'name'=>sprintf('admin.%s.show', $route),
                'params'=>$this->getUpdatesQueryParameters($model),
                'query'=>$this->getUpdatesQueryParametersClean(),
            ];
        });
    }


    public function toArray(){
        return [
            'type'=>$this->type,
            'text'=>$this->text,
            'name'=>$this->name,
            'searchable'=>$this->searchable,
            'sortable'=>$this->sortable,
            'hidden_list'=>$this->hidden_list,
            'hidden_show'=>$this->hidden_show,
            'hidden_create'=>$this->hidden_create,
            'hidden_edit'=>$this->hidden_edit,
            'html'=>$this->html,
            'options'=>$this->options,
            'formRenderFramework'=>sprintf("FormRenderer%s", Str::title($this->type)),
            'cellRenderFramework'=>$this->cellRenderFramework,
            'attributes'=>$this->getAttributes()
        ];
    }

}
