<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Spatie\Menu;


use App\Http\Spatie\AbstractMenus;

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
