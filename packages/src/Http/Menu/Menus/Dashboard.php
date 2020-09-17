<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\Http\Menu\Menus;

use Call\Http\Menu\AbstractMenus;

class Dashboard extends AbstractMenus
{

    /**
     * @return string
     */
    public function index_component()
    {
        return "Dashboard";
    }

    /**
     * @return string
     */
    public function url()
    {
        return 'dashboard';
    }

    /**
     * @param bool $pluralize
     * @return string
     */
    public function slug($pluralize = false)
    {
        return 'dashboard';
    }

    /**
     * @return string
     */
    public function icon()
    {
        return 'HomeIcon';
    }

    /**
     * @return bool
     */
    public function isChildren()
    {
        return false;
    }
}
