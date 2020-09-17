<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\Components;
use Call\Role;
use Call\Support\Components\AbstractComponent;
use Call\Support\Components\Actions;
use Call\Support\Components\Fields\Field\Column;
class UserComponent extends AbstractComponent {

    protected $groups = [
        'index',
        'edit',
        'create',
        'delete'
    ];

    public function actions()
    {
        return [
            Actions::make('Disable All')->route('users','disable')->icon('ArchiveIcon'),
            Actions::make('Enable All')->route('users','enable')->icon('CheckIcon'),
            Actions::make('Delete All')->route('users','deleteAll'),
        ];
    }

    public function columns(){

        $roles = Role::query()->pluck('name','id');

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
            Column::make("Roles")->multiple_checkbox($roles),
            Column::make('Permissions')
                ->icon('LockIcon')
                ->headings(['Module', 'Read', 'Edit', 'Create', 'Delete'])->checkbox_group([
                'users'=>   $this->permissions('users'),
                'roles'=>   $this->permissions('roles'),
                'permissions'=>   $this->permissions('permissions'),
            ]),
            Column::make('Status')->status(),
            Column::make('Actions')->actions('users'),
        ];
    }

    protected function permissions($module){

        $permission = [];

        foreach ($this->groups as  $value){

            $permission[$value] = auth()->user()->can(sprintf("admin.%s.%s", $module, $value));
        }

        return $permission;

    }
}
