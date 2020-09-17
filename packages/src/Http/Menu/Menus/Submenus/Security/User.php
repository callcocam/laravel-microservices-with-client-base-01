<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\Http\Menu\Menus\Submenus\Security;

use Call\Http\Menu\AbstractMenus;

class User extends AbstractMenus
{

    public function routes()
    {
        return [
            $this->route('disable','disable'),
            $this->route('enable','enable'),
            $this->route('delete-all','deleteAll')
        ];
    }

}
