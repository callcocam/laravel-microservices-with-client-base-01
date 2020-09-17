<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\Observers;

use Call\Http\Requests\RoleRequest;
use Call\Role;

class RoleObserver
{
    /**
     * @var RoleRequest
     */
    private $request;

    /**
     * RoleObserver constructor.
     * @param RoleRequest $request
     */
    public function __construct(RoleRequest $request)
    {
        $this->request = $request;
    }

    /**
     * Handle the role "created" event.
     *
     * @param  \Call\Role  $role
     * @return void
     */
    public function created(Role $role)
    {
        if ($this->request->has('permissions')){

            $role->permissions()->sync($this->request->get('permissions'));

        }
    }

    /**
     * Handle the role "updated" event.
     *
     * @param  \Call\Role  $role
     * @return void
     */
    public function updated(Role $role)
    {
        if ($this->request->has('permissions')){

            $role->permissions()->sync($this->request->get('permissions'));

        }
    }

    /**
     * Handle the role "deleted" event.
     *
     * @param  \Call\Role  $role
     * @return void
     */
    public function deleted(Role $role)
    {
        //
    }

    /**
     * Handle the role "restored" event.
     *
     * @param  \Call\Role  $role
     * @return void
     */
    public function restored(Role $role)
    {
        //
    }

    /**
     * Handle the role "force deleted" event.
     *
     * @param  \Call\Role  $role
     * @return void
     */
    public function forceDeleted(Role $role)
    {
        //
    }
}
