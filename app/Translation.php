<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App;

use App\Components\TranslationComponent;
use App\Scopes\UuidGenerate;
use App\Suports\Sluggable\HasSlug;
use App\Suports\Tenant\BelongsToTenants;

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
