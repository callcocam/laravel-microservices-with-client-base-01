<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Components;
use App\Suports\Components\AbstractComponent;
use App\Suports\Components\Fields\Field\Column;

class RoleComponent extends AbstractComponent {

    public function columns(){

        return [
            Column::make('id')->input(),
            Column::make('Name')->searchable()->input(),
            Column::make('Status')->radio(),
        ];
    }
}
