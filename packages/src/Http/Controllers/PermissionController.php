<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\Http\Controllers;

use Call\Http\Requests\PermissionRequest;
use Call\Permission;

class PermissionController extends AbstractController
{
   protected $model = Permission::class;

    /**
     * Store a newly created resource in storage.
     *
     * @param  PermissionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionRequest $request)
    {
        return parent::save($request);
    }

    /**
     * @param PermissionRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response|void
     */
    public function update(PermissionRequest $request, $id)
    {
        parent::save($request, $id);
    }
}
