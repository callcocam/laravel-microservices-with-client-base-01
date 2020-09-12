<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App;

use App\Components\RoleComponent;
use App\Suports\Acl\Models\AbstractRole;
use App\Scopes\UuidGenerate;
use App\Suports\Sluggable\HasSlug;
use App\Suports\Tenant\BelongsToTenants;

class Role extends AbstractRole
{
    use UuidGenerate, HasSlug, BelongsToTenants;

    protected $keyType = "string";


    protected function getComponent(){

        return RoleComponent::class;
    }
}
