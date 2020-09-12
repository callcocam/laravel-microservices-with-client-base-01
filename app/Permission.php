<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App;

use App\Components\PermissionComponent;
use App\Scopes\UuidGenerate;
use App\Suports\Acl\Models\AbstractPermission;
use App\Suports\Sluggable\HasSlug;
use App\Suports\Tenant\BelongsToTenants;

class Permission extends AbstractPermission
{

    use UuidGenerate, HasSlug, BelongsToTenants;

    protected $keyType = "string";


    protected function getComponent(){

        return PermissionComponent::class;
    }
}
