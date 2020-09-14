<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Components;
use App\Suports\Components\AbstractComponent;
use App\Suports\Components\Fields\Field\Column;
use App\Suports\Components\Fields\Field\Link;
class UserComponent extends AbstractComponent {
    public function columns(){

        return [
            Column::make('id')->hidden(),
            Column::make('Cover')->cover()->route('users'),
            Column::make('Type')->radio(['cpf'=>'Cpf','cnpj'=>'Cnpj']),
            Column::make('Name')->searchable()->input(),
            Column::make('Fantasy')->searchable()->input(),
            Column::make('Email')->input(),
            Column::make('Phone')->input(),
            Column::make('Document')->input(),
            Column::make('Test')->components([
                Column::make('Ie')->switch('cnpj','type'),
                Column::make('Rg')->switch('cpf','type'),
            ])->hidden_list(),
            Column::make('Status')->status(),
            Column::make('Actions')->actions('users'),
        ];
    }
}
