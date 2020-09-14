<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Suports\Components\Fields\Field\Traits;


trait HasVisible
{
    protected $hidden_list=true;
    protected $hidden_edit=true;
    protected $hidden_create=true;
    protected $hidden_show=true;

    /**
     * @return $this
     */
    public function hidden_list(): self
    {

        $this->hidden_list = false;

        return $this;

    }
    /**
     * @return $this
     */
    public function hidden_edit(): self
    {

        $this->hidden_edit = false;

        return $this;

    }
    /**
     * @return $this
     */
    public function hidden_show(): self
    {

        $this->hidden_show = false;

        return $this;

    }
    /**
     * @return $this
     */
    public function hidden_create(): self
    {

        $this->hidden_create = false;

        return $this;

    }

}
