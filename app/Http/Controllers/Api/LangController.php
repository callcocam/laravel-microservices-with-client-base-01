<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Translation;
use Illuminate\Http\Request;

class LangController extends AbstractController
{
    protected $model = Translation::class;

    public function lang(Request $request)
    {
        $languages = app($this->model)->where('language',app()->getLocale())->get();
        $data = [];
        if($languages){

            foreach ($languages as $language) {
                $data[$language->name] = $language->description;
            }
        }
        return response()->json($data);
    }
}
