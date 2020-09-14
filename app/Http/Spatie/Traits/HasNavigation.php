<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Spatie\Traits;
use App\Http\Spatie\AbstractMenus;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

trait HasNavigation
{

    protected $navigations = [];
    protected function index_component(){ return 'AbstractList';}
    protected function list_component(){ return 'AbstractList';}
    protected function destroy_component(){ return 'AbstractDestroy';}
    protected function create_component(){ return 'AbstractCreate';}
    protected function edit_component(){ return 'AbstractEdit';}
    protected function show_component(){ return 'AbstractShow';}

    /**
     * Monta a navegação para o front-end
     * @param AbstractMenus $result
     * @return $this
     */
    public function navigation(AbstractMenus $result)
    {
        $name = $result->name();
        $slug = $result->slug(true);
        $isNav= $result->isNav();
        $is_children = $result->isChildren();

        if($isNav):
            if(Route::has(sprintf("admin.%s.index",$slug))) {
                if (!Gate::denies(sprintf("admin.%s.index", $slug))) {
                    $navigations = [];
                    $navigations['name']        = sprintf("admin.%s.index", $slug);
                    $navigations['path']        = $slug;
                    $navigations['component']   = $result->index_component();
                    $navigations['redirect']    = $this->namedRoute($slug, "list");
                    if($is_children):
                     $navigations['children']   = $this->children($name, $slug,$result);
                    endif;
                    $navigations['meta']        = $this->meta($name, $slug);
                    $this->navigations[]        = $navigations;
                }
            }
        endif;
        return  $this;
    }

    protected function children($name, $slug,$result){
        return [
            "list"      => $this->lists($name, $slug,$result),
            "create"    => $this->create($name, $slug,$result),
            "edit"      => $this->edit($name, $slug,$result),
            "destroy"   => $this->destroy($name, $slug,$result),
            "show"      => $this->show($name, $slug,$result)
        ];
    }

    protected function meta($name, $slug){
        return [
            "auth" => true,
            "api" => $this->hasRoute(sprintf('admin.%s.index', $slug)),
            "create" => $this->hasRoute(sprintf("admin.%s.create", $slug)),
            "title" => "Dashboard",
            "breadcrumb" => [
                ["title" => "Dashboard", "url" => ['name' => 'admin']],
                ["title" => Str::title($name), "active" => true]
            ],
        ];
    }
    protected function create($name, $slug,$result)
    {
        if(Route::has(sprintf("admin.%s.create",$slug))) {
            if (!Gate::denies(sprintf("admin.%s.create", $slug))) {
                return [
                    'name' =>sprintf("admin.%s.create", $slug),
                    'path' => sprintf('%s/create', $slug),
                    'component' => $result->create_component(),
                    "meta" => [
                        "auth" => true,
                        "parent" => $this->namedRoute($slug, "list"),
                        "edit" => $this->namedRoute($slug, "edit"),
                        "api" => $this->hasRoute(sprintf("admin.%s.create", $slug)),
                        "store" => $this->hasRoute(sprintf("admin.%s.store", $slug)),
                        "title" => "Dashboard",
                        "breadcrumb" => [
                            ["title" => "Dashboard", "url" => ['name' => 'admin']],
                            ["title" => Str::title($name), "url" => $this->namedRoute($slug, "list")],
                            ["title" => "Create", "active" => true]
                        ]
                    ]
                ];
            }
        }
        return null;
    }

    protected function edit($name, $slug,$result)
    {
        if(Route::has(sprintf("admin.%s.edit",$slug))) {
            if (!Gate::denies(sprintf("admin.%s.edit", $slug))) {
                return [
                    'name' => sprintf('admin.%s.edit', $slug),
                    'path' => sprintf('%s/:id/edit', $slug),
                    'component' => $result->edit_component(),
                    "meta" => [
                        "auth" => true,
                        "parent" => $this->namedRoute($slug, "list"),
                        "api" => $this->hasRoute(sprintf("admin.%s.edit", $slug), '_id_'),
                        "update" => $this->hasRoute(sprintf("admin.%s.update", $slug), '_id_'),
                        "store" => $this->hasRoute(sprintf("admin.%s.store", $slug)),
                        "title" => "Dashboard",
                        "breadcrumb" => [
                            ["title" => "Dashboard", "url" => ['name' => 'admin']],
                            ["title" => Str::title($name), "url" => $this->namedRoute($slug, "list")],
                            ["title" => "Edit", "active" => true]
                        ]
                    ]
                ];
            }
        }
        return null;
    }


    protected function show($name, $slug,$result)
    {
        if(Route::has(sprintf("admin.%s.show",$slug))) {
            if (!Gate::denies(sprintf("admin.%s.show", $slug))) {
                return [
                    'name' => sprintf('admin.%s.show', $slug),
                    'path' => sprintf('%s/:id/show', $slug),
                    'component' => $result->show_component(),
                    "meta" => [
                        "auth" => true,
                        "parent" => $this->namedRoute($slug, "list"),
                        "create" => $this->namedRoute($slug, "create"),
                        "edit" => $this->namedRoute($slug, "edit"),
                        "api" => $this->hasRoute(sprintf("admin.%s.show", $slug), '_id_'),
                        "title" => "Dashboard",
                        "breadcrumb" => [
                            ["title" => "Dashboard", "url" => ['name' => 'admin']],
                            ["title" => Str::title($name), "url" => $this->namedRoute($slug, "list")],
                            ["title" => "Show", "active" => true]
                        ],
                    ]
                ];
            }
        }
        return null;
    }



    protected function destroy($name,$slug,$result)
    {
        if(Route::has(sprintf("admin.%s.destroy",$slug))) {
            if (!Gate::denies(sprintf("admin.%s.destroy", $slug))) {
                return [
                    'name' => sprintf('admin.%s.destroy', $slug),
                    'path' => sprintf('%s/:id/destroy', $slug),
                    'component' => $result->destroy_component(),
                    "meta" => [
                        "auth" => true,
                        "parent" => $this->namedRoute($slug, "index"),
                        "api" => $this->hasRoute(sprintf("admin.%s.destroy", $slug), '_id_'),
                        "title" => "Dashboard",
                        "question" => [
                            "color" => 'success',
                            "title" => __("Confirm"),
                            "text" => sprintf(__("Destroy Of")." %s" , Str::title($name)),
                        ],
                        "breadcrumb" => [
                            ["title" => "Dashboard", "url" => ['name' => 'admin']],
                            ["title" => Str::title($name), "url" => $this->namedRoute($slug, "list")],
                            ["title" => "Destroy", "active" => true]
                        ],
                    ]
                ];
            }
        }
        return null;
    }

    protected function lists($name, $slug,$result)
    {
        if(Route::has(sprintf("admin.%s.index",$slug))) {
            if (!Gate::denies(sprintf("admin.%s.index", $slug))) {
                return [
                    'name' => sprintf('admin.%s.list', $slug),
                    'path' => $slug,
                    'component' => $result->list_component(),
                    "meta" => [
                        "auth" => true,
                        "api" => $this->hasRoute(sprintf('admin.%s.index', $slug)),
                        "parent" => $this->namedRoute($slug, "list"),
                        "create" => $this->namedRoute($slug, "create"),
                        "title" => "Dashboard",
                        "breadcrumb" => [
                            ["title" => "Dashboard", "url" => ['name' => 'admin']],
                            ["title" => Str::title($name), "url" => $this->namedRoute($slug, "list")],
                            ["title" => "List", "active" => true]
                        ],

                    ]
                ];
            }
        }
        return null;
    }

    private function hasRoute($route, $params = null){

        if(Route::has($route)){
            return route($route,$params);
        }

        return "";
    }

    protected function namedRoute($slug,$action){
        $route['name'] = sprintf('admin.%s.%s', $slug, $action);
        return $route;
    }
}
