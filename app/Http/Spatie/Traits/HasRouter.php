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

trait HasRouter
{

    protected function method(){ return"crud";}
    protected function action() { return "index";}

    protected function tableDontExist($table)
    {
        return \Illuminate\Support\Facades\Schema::hasTable(strtolower($table));
    }

    /**
     * Monta as rotas da api
     * @param AbstractMenus $result
     */
    public function route(AbstractMenus $result)
    {
        $name = $result->name();
        $slug = $result->slug(true);
        $isRoute= $result->isRoute();

        if($isRoute):
            switch ($this->method()):
                case 'crud':
                    AutoRoute::resources($slug, sprintf('%sController', $name), $slug);
                    AutoRoute::post(sprintf("%s/upload/file",$slug), sprintf('%sController', $name),'uploadFile', sprintf("upload.%s.up",$slug));
                    AutoRoute::post(sprintf("%s/remove/file",$slug), sprintf('%sController', $name),'removeFile', sprintf("upload.%s.del",$slug));
                    AutoRoute::get(sprintf("%s/download/file",$slug), sprintf('%sController', $name), 'downloadFile', sprintf("upload.%s.down",$slug));
                    break;
                case 'post':
                    AutoRoute::post($slug, sprintf('%sController', $name),$this->action(), sprintf("admin.%s.%s",$slug,$this->action()));
                    break;
                case 'put':
                    AutoRoute::put($slug, sprintf('%sController', $name), $this->action(), sprintf("admin.%s.%s",$slug,$this->action()));
                    break;
                case 'delete':
                    AutoRoute::delete($slug, sprintf('%sController', $name),$this->action(), sprintf("admin.%s.%s",$slug,$this->action()));
                    break;
                default:
                    AutoRoute::get($slug, sprintf('%sController', $name), $this->action(), sprintf("admin.%s.index",$slug));
                    break;
            endswitch;
        endif;
    }
}
