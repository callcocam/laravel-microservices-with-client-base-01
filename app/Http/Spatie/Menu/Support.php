<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Spatie\Menu;

use App\Http\Spatie\AbstractMenus;

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
