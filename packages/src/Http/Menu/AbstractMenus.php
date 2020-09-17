<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\Http\Menu;


use Illuminate\Support\Str;

class AbstractMenus
{

    protected $submenus;

    /**
     * Start da class
     * @return static
     */
    public static function make(){

        return new static();

    }

    public function routes(){}

    /**
     * @param $path
     * @param $controller
     * @param $action
     * @param $name
     * @param string $method
     * @return array
     */
    public function route($path,$action, $method='post'){
        $path = sprintf("/%s/%s", $this->slug(true), $path);
        $controller = sprintf("%sController", $this->name());
        $name = sprintf("admin.%s.actions.%s", $this->slug(true),$action);
        return [$path,$controller,$action,$name,$method];
    }
    /**
     * Usado para gerar os nomes dos menus e i18n para o front-end  e para apontar o nome do arquivo na pasta Menu e Submenu
     * @return string
     */
    public function name(){

        return class_basename($this);
    }

    /**
     * Usado para gerar as rotas da api (name, path)
     * @param bool $pluralize
     * @return string
     */
    public function slug($pluralize=false){

        if($pluralize)
            return  Str::plural(Str::slug($this->name()));

        return Str::slug($this->name());
    }

    /**
     * Icone dos menus para o front-end
     * @return string
     */
    public function icon(){

        return 'chevrons-right';
    }

    /**
     * Texto base para a tradução no front-end
     * @return string
     */
    public function i18n(){

        return $this->name();
    }

    /**
     * Informa se a pagina sera aberta em uma nova aba
     * @return 0
     */
    public function sorting(){

        return 1;
    }

    /**
     * Informa se a pagina sera aberta em uma nova aba
     * @return null
     */
    public function target(){

        return null;
    }

    /**
     * Path de acesso passado na url ex:admin/users
     * @return string
     */
    public function url(){

        return  Str::plural(Str::slug($this->name()));
    }

    /**
     * Verifica se e pra gerar navegação no front-end
     * @return bool
     */
    public function isNav(){

        return  true;
    }

    /**
     * Verifica se se e pra gerar rotas
     * @return bool
     */
    public function isRoute(){

        return  true;
    }

    /**
     * Verifica se tem rotas filhas, create, edit, destroy etc...
     * @return bool
     */
    public function isChildren(){

        return  true;
    }

    /**
     * Monta os submenus, dos menus que estão dentro da pasta Sbmenus
     * @param $path
     * @param $namespace
     * @return AutoGenerate
     */
    public function submenus($path, $namespace){

        return AutoGenerate::make($path, $namespace);
    }

    public function index_component(){ return 'AbstractList';}
    public function list_component(){ return 'AbstractList';}
    public function destroy_component(){ return 'AbstractDestroy';}
    public function create_component(){ return 'AbstractCreate';}
    public function edit_component(){ return 'AbstractEdit';}
    public function show_component(){ return 'AbstractShow';}

}
