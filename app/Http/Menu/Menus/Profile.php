<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Menu\Menus;

use Call\Http\Menu\Menus\Profile as ProfileAlias;

class Profile extends ProfileAlias
{

    public function sorting()
    {
        return 100;
    }
}
