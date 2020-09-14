<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Suports\Components\Fields\Field\Traits;


trait Hidden
{

    public function hidden(){
        $this->type = "hidden";
        $this->hidden_edit();
        $this->hidden_create();
        $this->hidden_show();
        $this->hidden_list();
        return $this;
    }
}
