<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\Http\Menu\Traits;
use Call\Http\Menu\AbstractMenus;
use Call\Support\Facades\AutoRoute;

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
                    AutoRoute::uploads($slug, $name, $slug);
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

    public function add($array){
        if($array){

            foreach ($array as $value) {
                if($value){
                    list($path, $controller, $action, $name, $method ) = $value;
                    switch ($method):
                        case 'crud':
                            AutoRoute::resources($path, $controller, $action, $name);
                            break;
                        case 'post':
                            AutoRoute::actions($path, $controller,$action, $name);
                            break;
                        case 'put':
                            AutoRoute::put($path, $controller, $action, $name);
                            break;
                        case 'delete':
                            AutoRoute::delete($path, $controller,$action, $name);
                            break;
                        default:
                            AutoRoute::get($path, $controller, $action, $name);
                            break;
                    endswitch;
                }

           }
        }

    }
}
