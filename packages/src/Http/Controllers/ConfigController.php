<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\Http\Controllers;

use Call\Http\Menu\AutoGenerate;
use Illuminate\Http\Request;

class ConfigController extends AbstractController
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
