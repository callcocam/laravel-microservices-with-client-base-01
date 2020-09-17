<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\Http\Menu\Menus;

use Call\Http\Menu\AbstractMenus;

class Support extends AbstractMenus
{

    public function icon()
    {
        return 'SmileIcon';
    }

    public function isChildren()
    {
        return false;
    }
}
