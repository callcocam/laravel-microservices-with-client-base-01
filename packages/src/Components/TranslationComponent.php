<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\Components;


use Call\Support\Components\AbstractComponent;
use Call\Support\Components\Actions;
use Call\Support\Components\Fields\Field\Column;
use Call\Support\Components\Fields\Field\Link;

class TranslationComponent extends AbstractComponent {


    public function actions()
    {
        return [
            Actions::make('Disable All')->route('translations','disable')->icon('ArchiveIcon'),
            Actions::make('Enable All')->route('translations','enable')->icon('CheckIcon'),
            Actions::make('Delete All')->route('translations','deleteAll'),
        ];
    }

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
