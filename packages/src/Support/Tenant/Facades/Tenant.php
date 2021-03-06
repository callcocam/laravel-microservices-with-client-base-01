<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\Support\Tenant\Facades;

use Call\Support\Tenant\TenantManager;
use Illuminate\Support\Facades\Facade;

class Tenant extends Facade
{
    /**
     * Get the registered name of the components.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return TenantManager::class;
    }
}
