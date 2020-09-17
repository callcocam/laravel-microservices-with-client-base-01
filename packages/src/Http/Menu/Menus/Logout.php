<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\Http\Menu\Menus;

use Call\Http\Menu\AbstractMenus;

class Logout extends AbstractMenus
{

    /**
     * @return string
     */
    public function index_component()
    {
        return "Logout";
    }

    /**
     * @return string
     */
    public function url()
    {
        return 'logout';
    }

    /**
     * @param bool $pluralize
     * @return string
     */
    public function slug($pluralize = false)
    {
        return 'logout';
    }

    /**
     * @return string
     */
    public function icon()
    {
        return 'LogOutIcon';
    }

    /**
     * @return bool
     */
    public function isChildren()
    {
        return false;
    }

    public function sorting()
    {
        return 201;
    }
}
