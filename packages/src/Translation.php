<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call;

use Call\Components\TranslationComponent;
use Call\Scopes\UuidGenerate;
use Call\Support\Sluggable\HasSlug;
use Call\Support\Tenant\BelongsToTenants;

class Translation extends AbstractModel
{

    use UuidGenerate, BelongsToTenants, HasSlug;

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [ 'tenant_id','user_id','name','slug','language','description','ordering','status'];


    protected function getComponent(){

        return TranslationComponent::class;
    }
}
