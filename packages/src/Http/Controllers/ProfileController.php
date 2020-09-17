<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\Http\Controllers;

use Call\Http\Requests\UserRequest;
use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProfileController extends AbstractController
{
   protected $model = User::class;


    /**
     * Store a newly created resource in storage.
     *
     * @param  UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        return parent::save($request);
    }

    /**
     * @param UserRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response|void
     */
    public function update(UserRequest $request, $id)
    {
        parent::save($request, $id);
    }
}
