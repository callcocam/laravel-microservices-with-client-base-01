<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class AbstractController extends Controller
{

    protected $model;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $model = app($this->model)->component($request);

        return response()->json($model);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $model = app($this->model)->edit($request,$id);
        return response()->json($model);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $model = app($this->model)->edit($request,$id);
        return response()->json($model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $model = app($this->model)->findOrFail($id);
            $model->delete();
            return response()->json([
                'position'=>'top-center',
                'time'=>'8000',
                'color'=> 'success',
                'title'=> 'Rotina de Exclusão de Registro(s)',
                'text'=>sprintf("[ %s ], foi realizada com sucesso :)", $model->name)
            ]);
        }catch (\PDOException $exception){
            return response()->json([
                'position'=>'top-center',
                'time'=>'8000',
                'color'=> 'danger',
                'title'=> 'Rotina de Exclusão de Registro(s)',
                'text'=>$exception->getMessage()
            ]);
        }
    }

        /**
         * Update the avatar for the user.
         *
         * @param  Request  $request
         * @return Response
         */
        public function uploadFile(Request $request)
        {

            $path = $request->file('file')->store(str_replace(".", '/', Route::currentRouteName()));
            if ($this->model) {
                $model = app($this->model)->find($request->input('id'));
                if ($model) {
                    $model->update([
                        $request->input('name') => $path
                    ]);
                }
            }
            return response()->json([
                'path' => sprintf("/storage/%s", $path),
                'url' => url($path)
            ]);
    }

    public function downloadFile(){
        return response()->json(['download']);
    }

    /**
     * Update the avatar for the user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function removeFile(Request $request)
    {
        if (\Storage::exists(Str::replaceFirst("/storage", "", $request->get('file')))) {
            \Storage::delete($request->get('file'));
        }
        if ($this->model) {
            $model = app($this->model)->find($request->input('id'));
            if ($model) {
                $model->update([
                    $request->input('name') => "/users/no_avatar.jpg"
                ]);
            }
        }
        return response()->json([
            'path' => asset("storage/users/no_avatar.jpg")
        ]);
    }
}
