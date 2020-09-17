<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\Http\Menu\Traits;
use Call\Http\Menu\AbstractMenus;

trait HasMenu
{


    public function menu(AbstractMenus $result, $submenu=[])
    {

        return array_filter([
            'name'=>$result->name(),
            'slug'=>$result->slug(),
            'icon'=>$result->icon(),
            'url'=>sprintf('/admin/%s', $result->url()),
            'i18n'=>$result->i18n(),
            'target'=>$result->target(),
            'submenu'=>$submenu
        ]);

    }
}
