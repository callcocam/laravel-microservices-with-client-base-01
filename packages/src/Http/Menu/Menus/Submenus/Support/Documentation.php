<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\Http\Menu\Menus\Submenus\Support;


use Call\Http\Menu\AbstractMenus;

class Documentation extends AbstractMenus
{

    public function url()
    {
        return 'https://pixinvent.com/demo/vuexy-vuejs-admin-dashboard-template/documentation/';
    }

    public function target()
    {
        return '_blank';
    }
    public function isNav()
    {
        return false;
    }

    public function isRoute()
    {
        return false;
    }
}
