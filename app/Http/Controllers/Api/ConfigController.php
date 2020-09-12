<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Spatie\AutoGenerate;
use App\Suports\Sidebar\Load;
use App\Suports\Sidebar\LoadMenus;
use App\Suports\Sidebar\LoadNav;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function load(Request $request)
    {
        $data = AutoGenerate::make()->menus()->navigations()->toArray();
        return response()->json($data);
    }
}
