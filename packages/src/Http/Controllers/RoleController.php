<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\Http\Controllers;

use Call\Http\Requests\RoleRequest;
use Call\Role;

class RoleController extends AbstractController
{
   protected $model = Role::class;


    /**
     * Store a newly created resource in storage.
     *
     * @param  RoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        return parent::save($request);
    }

    /**
     * @param RoleRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response|void
     */
    public function update(RoleRequest $request, $id)
    {
        parent::save($request, $id);
    }
}
