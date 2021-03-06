<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\Support\Components\Fields;

use Call\Support\Components\Fields\Field\Traits\{Attributes,
    CheckboxGroup,
    Cover,
    HasComponents,
    HasVisible,
    Hidden,
    Input,
    MultipleCheckbox,
    Radio,
    Render,
    Select,
    Status,
    SwitchCase};
use Illuminate\Support\Str;

class AbstractField {

    use Input, Radio, Attributes, Status, Render, Select, Cover,HasComponents, Hidden, HasVisible, SwitchCase, CheckboxGroup, MultipleCheckbox;

    protected $model = null;
    /**
     * @var
     */
    protected $type = 'text';

    /**
     * @var
     */
    protected $text;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var null
     */
    protected $default;

    /**
     * @var null
     */
    protected $value;

    /**
     * @var bool
     */
    protected $searchable = false;

    /**
     * @var null
     */
    protected $searchCallback;

    /**
     * @var bool
     */
    protected $sortable = true;

    /**
     * @var
     */
    protected $sortCallback;

    /**
     * @var bool
     */
    protected $unescaped = false;

    /**
     * @var bool
     */
    protected $html = false;

    /**
     * @var string
     */
    protected $icon;

    /**
     * This column is a custom attribute on the model and not a column in the database.
     *
     * @var bool
     */
    protected $customAttribute = false;



    /**
     * @param $property
     *
     * @return mixed
     */
    public function __get($property)
    {
        return $this->{$property};
    }

    /**
     * @param $value
     * @return $this
     */
    public function value($value){

        $this->value = $value;

        return $this;
    }

    /**
     * @param $model
     * @return $this
     */
    public function model($model){

        $this->model = $model;

        return $this;
    }

    /**
     * @param  callable|null  $callable
     *
     * @return $this
     */
    public function searchable(callable $callable = null): self
    {

        $this->searchCallback = $callable;
        $this->searchable = true;

        return $this;
    }

    /**
     * @return bool
     */
    public function isSearchable(): bool
    {
        return $this->searchable;
    }

    /**
     * @param  callable|null  $callable
     *
     * @return $this
     */
    public function sortable(callable $callable = null): self
    {

        $this->sortCallback = $callable;
        $this->sortable = true;

        return $this;
    }

    /**
     * @return bool
     */
    public function isSortable(): bool
    {
        return $this->sortable;
    }

    /**
     * @return $this
     */
    public function unescaped(): self
    {
        $this->unescaped = true;

        return $this;
    }

    /**
     * @return bool
     */
    public function isUnescaped(): bool
    {
        return $this->unescaped;
    }

    /**
     * @return $this
     */
    public function html(): self
    {

        $this->html = true;

        return $this;
    }

    /**
     * @param $icon
     * @return $this
     */
    public function icon($icon): self
    {

        $this->icon = $icon;

        return $this;
    }

    /**
     * @return bool
     */
    public function isHtml(): bool
    {
        return $this->html;
    }

    /**
     * @return $this
     */
    public function customAttribute(): self
    {
        $this->customAttribute = true;

        return $this;
    }

    /**
     * @return bool
     */
    public function isCustomAttribute(): bool
    {
        return $this->customAttribute;
    }


    /**
     * @param $option
     * @param $value
     *
     * @return $this
     */
    public function setOption($option, $value): self
    {
        $this->options[$option] = $value;

        return $this;
    }

    /**
     * @param  array  $options
     *
     * @return $this
     */
    public function setOptions(array $options = []): self
    {
        $this->options = array_merge($this->options, $options);

        return $this;
    }

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }


    /**
     * @return array
     */
    public function getComponents(): array
    {
        $components = [];
        foreach ($this->components as $item) {
            $component =  $this->component($component, 'options', $item->options);
            $component =  $this->component($component, 'attributes',$this->attrs($item->attributes, $this->model));
            $component =  $this->component($component, 'cellRenderFramework', $item->cellRenderFramework);
            $component =  $this->component($component, 'hidden', $item->hidden);
            $component =  $this->component($component, 'formRenderFramework', sprintf("FormRenderer%s", Str::title($item->type)));

            if($item->hasSwitch()){
                if($this->model)
                    $component =  $this->component($component, 'value', $this->model->{$item->name});
                $component =  $this->component($component, 'text', $item->text);
                $component =  $this->component($component, 'type', $item->type);
                $component =  $this->component($component, 'name', $item->name);
                $component =  $this->component($component, 'equal', $item->equal);
                $component =  $this->component($component, 'accept', $item->switch);
                $component =  $this->component($component, 'switchRenderFramework', $item->switchRenderFramework);
            }
            $components[] = $component;
        }
        return $components;
    }
}
