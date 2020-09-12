<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Suports\Components\Fields;

use App\Suports\Components\Fields\Field\Traits\Attributes;
use App\Suports\Components\Fields\Field\Traits\Cover;
use App\Suports\Components\Fields\Field\Traits\HasComponents;
use App\Suports\Components\Fields\Field\Traits\Hidden;
use App\Suports\Components\Fields\Field\Traits\Input;
use App\Suports\Components\Fields\Field\Traits\Radio;
use App\Suports\Components\Fields\Field\Traits\Render;
use App\Suports\Components\Fields\Field\Traits\Status;
use Illuminate\Support\Str;

class AbstractField {

    use Input, Radio, Attributes, Status, Render, Cover,HasComponents, Hidden;

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

}
