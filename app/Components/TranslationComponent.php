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

class TranslationComponent extends AbstractComponent {


    public function columns(){

        return [
            Column::make('id')->hidden(),
            Column::make('Name')->searchable()->input(),
            Column::make('Description')->input(),
            Column::make('Status')->status(),
            Column::make('Actions')->components(
                     [
                         Link::make('Edit')->edit('translations'),
                         Link::make('Show')->show('translations'),
                         Link::make('Destroy')->destroy('translations'),
                     ]
            ),
        ];
    }
}
