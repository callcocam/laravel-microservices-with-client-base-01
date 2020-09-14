<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Suports\Components\Fields\Field;


use App\Suports\Components\Fields\AbstractField;
use Illuminate\Support\Str;

class Column extends AbstractField {

    /**
     * Column constructor.
     *
     * @param $text
     * @param $name
     */
    public function __construct($text, $name)
    {
        $this->text = $text;
        $this->name = $name ?? Str::snake(Str::lower($text));
    }

    /**
     * @param  null  $text
     * @param  null  $attribute
     *
     * @return static
     */
    public static function make($text = null, $attribute = null)
    {
        $column = new static($text, $attribute);

        return $column;
    }

    public function toArray(){
        $components = null;
        if($this->model){
            if($this->hasComponents()){
                $components = $this->getComponents();
            }
        }
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
           'components'=>$components,
           'formRenderFramework'=>sprintf("FormRenderer%s", Str::title($this->type)),
           'cellRenderFramework'=>$this->cellRenderFramework,
           'attributes'=>$this->getAttributes()
       ];
    }

}
