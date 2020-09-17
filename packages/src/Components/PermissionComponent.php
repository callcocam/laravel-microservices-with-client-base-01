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
use Call\Support\Helpers\LoadRouterHelper;

class PermissionComponent extends AbstractComponent {

    protected $groups = [
        'index'=>'Read',
        'edit'=>'Edit',
        'create'=>'Create',
        'show'=>'Show',
        'destroy'=>'Delete'
    ];

    public function actions()
    {
        return [
            Actions::make('Disable All')->route('permissions','disable')->icon('ArchiveIcon'),
            Actions::make('Enable All')->route('permissions','enable')->icon('CheckIcon')
        ];
    }
    public function columns(){

        $routes = LoadRouterHelper::make();
        return [
            Column::make('id')->hidden(),
            Column::make('Name')->searchable()->select($routes),
            Column::make("groups")->radio($this->groups),
            Column::make('Status')->status(),
            Column::make('Actions')->actions('permissions'),
        ];
    }
}
