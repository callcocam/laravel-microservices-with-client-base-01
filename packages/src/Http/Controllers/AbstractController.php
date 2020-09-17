<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

abstract class AbstractController extends Controller
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
    public function create(Request $request)
    {

        $model = app($this->model)->newRecord($request);

        return response()->json($model);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save($request, $id = null)
    {
        if (!$this->model) {
            return $this->errorResponse("Nenhuma model foi passada:(");;
        }
        try {
            if ($request->has("id") && $request->get("id") == true) {
                $model = app($this->model)->find($request->get("id"));
                $model->update($request->input());
                $data = $model->toArray();
                $data['text'] = "Registro atualizado com sucesso :)";
                return $this->successResponse($data);
            } else {
                $model = app($this->model)->create($request->input());
                $data = $model->toArray();
                $data['text'] = "Registro cadastrado com sucesso :)";
                return $this->successResponse($data);
            }
        }catch (\PDOException $exception){
            return $this->errorResponse([
                'title'=> 'Rotina de Exclusão de Registro(s)',
                'text'=>$exception->getMessage()
            ], $exception->getCode());
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $model = app($this->model)->editRecord($request,$id);
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
        $model = app($this->model)->editRecord($request,$id);
        return response()->json($model);
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
            if(request()->has('force') && request()->get('force') == true){
                $model->forceDelete();
            }
            else{
                $model->delete();
            }
            return $this->successResponse([
                'title'=> 'Rotina de Exclusão de Registro(s)',
                'text'=>" Foi realizada com sucesso :)"
            ]);
        }catch (\PDOException $exception){
            return $this->errorResponse([
                'title'=> 'Rotina de Exclusão de Registro(s)',
                'text'=>$exception->getMessage()
            ], $exception->getCode());
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function disable(Request $request)
    {
       $data = Arr::pluck($request->input(), 'status.value', 'id.value');
        foreach ($data as $key => $value) {
            $model = app($this->model)->find($key);
            $model->update(['status'=>'draft']);
        }
        return $this->successResponse([
            'title'=> 'Rotina de desabilitar',
            'text'=>"registro(s) com sucesso :)"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function enable(Request $request)
    {
        $data = Arr::pluck($request->input(), 'status.value', 'id.value');
        foreach ($data as $key => $value) {
            $model = app($this->model)->find($key);
            $model->update(['status'=>'published']);
        }

        return $this->successResponse([
            'title'=> 'Rotina de habilitar',
            'text'=>"registro(s) executada com sucesso :)"
        ]);
    }

 /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function deleteAll(Request $request)
    {
        $data = Arr::pluck($request->input(), 'id.value');
        foreach ($data as  $value) {
            $model = app($this->model)->find($value);
            $model->delete();
        }
        return $this->successResponse([
            'text'=>"Registro(s) excluido com sucesso :)"
        ]);
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
                        $request->input('name') => sprintf("/storage/%s", $path)
                    ]);
                }
            }
            return response()->json([
                'path' => sprintf("/storage/%s", $path),
                'url' => url(sprintf("/storage/%s", $path))
            ]);
    }

    public function downloadFile(){
        return response()->json(['download']);
    }

    /**
     * Build success response
     * @param $message
     * @param string|array $data
     * @return JsonResponse
     */
    protected function successResponse($data=[])
    {
        return response()->json(array_merge([
            'position'=>'top-center',
            'time'=>'8000',
            'color'=> 'success',
            'title'=> 'Rotina do sistema',
            'text'=>"Operação realizada com sucesso"
        ],$data));
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

    /**
     * Build valid response
     * @param  string|array $data
     * @param  int $code
     * @return JsonResponse
     */
    protected function validResponse($data, $code = Response::HTTP_OK)
    {
        return response()->json(['data' => $data], $code);
    }

    /**
     * Build error responses
     * @param  string|array $message
     * @param  int $code
     * @return JsonResponse
     */
    protected function errorResponse($message, $code)
    {
        return response()->json(['error' => array_merge([
            'position'=>'top-center',
            'time'=>'8000',
            'color'=> 'danger',
            'title'=> 'Oppss!!',
            'text'=>"Erro do sistema"
        ],$message), 'code' => $code]);
    }

    /**
     * Build error responses
     * @param  string|array $message
     * @param  int $code
     * @return JsonResponse
     */
    protected function errorMessage($message, $code)
    {
        return response($message, $code)->header('Content-Type', 'application/json');
    }
}
