<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\Components;
use Call\Permission;
use Call\Support\Components\AbstractComponent;
use Call\Support\Components\Actions;
use Call\Support\Components\Fields\Field\Column;
use Illuminate\Database\Eloquent\Builder;

class RoleComponent extends AbstractComponent {


    public function actions()
    {
        return [
            Actions::make('Disable All')->route('roles','disable')->icon('ArchiveIcon'),
            Actions::make('Enable All')->route('roles','enable')->icon('CheckIcon')
        ];
    }

    public function columns(){

        $permissions = Permission::query()->orderByDesc('name')->pluck('name', 'id');

        $defaults = [];
        if($this->model)
          $defaults = $this->model->permissions()->pluck('id');

        return [
            Column::make('id')->hidden(),
            Column::make('updated_at')->value(date('Y-m-d H:i:s'))->hidden(),
            Column::make('Name')->searchable()->input(),
            Column::make("Permissions")->multiple_checkbox($permissions, $defaults),
            Column::make('Status')->status(),
            Column::make('Actions')->actions('roles'),
        ];
    }

}
