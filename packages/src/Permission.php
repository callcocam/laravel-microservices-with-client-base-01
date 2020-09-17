<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call;

use Call\Components\PermissionComponent;
use Call\Scopes\UuidGenerate;
use Call\Support\Acl\Models\AbstractPermission;
use Call\Support\Sluggable\HasSlug;
use Call\Support\Tenant\BelongsToTenants;

class Permission extends AbstractPermission
{

    use UuidGenerate, HasSlug, BelongsToTenants;

    protected $keyType = 'string';

    public $incrementing = false;


    protected function getComponent(){

        return PermissionComponent::class;
    }
}
