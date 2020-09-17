<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\Http\Menu\Menus;

use Call\Http\Menu\AbstractMenus;

class Profile extends AbstractMenus
{

    /**
     * @return string
     */
    public function index_component()
    {
        return "Profile";
    }

    /**
     * @return string
     */
    public function url()
    {
        return 'profile';
    }

    /**
     * @param bool $pluralize
     * @return string
     */
    public function slug($pluralize = false)
    {
        return 'profile';
    }

    /**
     * @return string
     */
    public function icon()
    {
        return 'UserIcon';
    }

    /**
     * @return bool
     */
    public function isChildren()
    {
        return false;
    }
}
