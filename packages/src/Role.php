<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call;

use Call\Components\RoleComponent;
use Call\Support\Acl\Models\AbstractRole;
use Call\Scopes\UuidGenerate;
use Call\Support\Sluggable\HasSlug;
use Call\Support\Tenant\BelongsToTenants;

class Role extends AbstractRole
{
    use UuidGenerate, HasSlug, BelongsToTenants;

    protected $keyType = "string";
    /**
    * Indicates if the IDs are auto-incrementing.
    *
    * @var bool
    */
    public $incrementing = false;


    protected function getComponent(){

        return RoleComponent::class;
    }
}
