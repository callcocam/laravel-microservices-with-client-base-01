<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Spatie\Traits;
use App\Http\Spatie\AbstractMenus;
use App\Suports\Facades\AutoRoute;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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
