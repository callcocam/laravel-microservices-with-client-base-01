<?php

namespace App;

use App\Scopes\UuidGenerate;
use App\Suports\Sluggable\HasSlug;
use App\Suports\Tenant\BelongsToTenants;

class Make extends AbstractModel
{
    use UuidGenerate, BelongsToTenants, HasSlug;

    protected $keyType = 'string';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'name','slug','route','model','url','icon', 'method', 'action', 'cover','status', 'description'
    ];
}
