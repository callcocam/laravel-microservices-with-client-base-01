<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\Http\Menu\Menus;


use Call\Http\Menu\AbstractMenus;

class Security extends AbstractMenus
{

    public function icon()
    {
        return 'LockIcon';
    }

    public function isChildren()
    {
        return false;
    }

}
