<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\Http\Menu;

use Call\Http\Menu\Traits\HasMenu;
use Call\Http\Menu\Traits\HasNavigation;
use Call\Http\Menu\Traits\HasRouter;
use Illuminate\Support\Facades\File;

class AutoGenerate
{
    use HasNavigation, HasRouter, HasMenu;

    protected $results=[];
    protected $menus=[];
    protected $navigations=[];

    /**
     * Start a class
     * @param string $path
     * @param string $namespace
     * @return static
     */
    public static function make($path='Menus', $namespace="App\\Http\\Menu\\Menus"){
         $make = new static();
         $make->load($path, $namespace);
        return $make;

    }

    /**
     * Start das rotas
     * @return $this
     */
    public function routes(){
        if($this->results){
            foreach ($this->results  as $result){
                $this->route($result);
                $this->add($result->routes());
                $submenus = $this->submenus($result);
                if($submenus){
                    foreach ($submenus as $submenu){
                        foreach ($submenu as $item){
                            $this->route($item);
                            $this->add($item->routes());
                        }
                    }
                }
            }
        }
        return $this;
    }

    /**
     * Start do menus de navegação para o front-end
     * @return $this
     */
    public function menus(){

        if($this->results){

            foreach ($this->results  as $result){
                $submenus = $this->submenus($result);
                $data=[];
                if($submenus){
                    foreach ($submenus as $submenu){
                        foreach ($submenu as $item){
                            $data[] =  $this->menu($item);
                        }
                    }
                }
                $this->menus[] = $this->menu($result, $data);

            }

        }

        return $this;
    }


    /**
     * Start a nevegação para as rotas do front-end
     * @return $this
     */
    public function navigations()
    {

       if($this->results){
           foreach ($this->results  as $result){
              $this->navigation($result);
              $submenus = $this->submenus($result);
               if($submenus){
                   foreach ($submenus as $submenu){
                       foreach ($submenu as $item){
                           $this->navigation($item);
                       }
                   }
               }
           }
       }
        return $this;
    }

    /**
     * Lê os arquivos na pasta Menu e Submenus
     * @param string $path
     * @param string $namespace
     * @return $this
     */

    public function load($path='Menus', $namespace="App\\Http\\Menu\\Menus")
    {

        collect(glob(app_path(sprintf('Http/Menu/%s/*.php', $path))))
            ->each(function($file) use ($namespace,$path) {
                $fileName = File::name($file);
                $menu = app(sprintf("%s\\%s",$namespace, $fileName));
                $this->results[] = $menu;
            });

        $this->results=  collect($this->results)->sortBy(function ($menu){
            return $menu->sorting();
        });
        return $this;
    }

    /**
     * Lista de menus e navegações para o front-end
     * @return array
     */
    public function toArray(){

        return [
            'menus'=>$this->menus,
            'navigations'=>$this->navigations,
        ];
    }

    /**
     * Lê os sub menus que estão na pasta Submenus
     * @param AbstractMenus $result
     * @return AutoGenerate|array
     */
    protected function submenus(AbstractMenus $result){

        $submenus = [];
        if(File::isDirectory(app_path(sprintf('Http/Menu/Menus/Submenus/%s', $result->name())))){
            $submenus = $result->submenus(
                sprintf('Menus/Submenus/%s', $result->name()),
                sprintf('App\\Http\\Menu\\Menus\\Submenus\\%s', $result->name())
            );
        }
        return $submenus;
    }

}
