<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App;

use App\Scopes\UuidGenerate;
use App\Suports\Sluggable\HasSlug;

class Tenant extends AbstractModel
{

 use HasSlug, UuidGenerate;

    protected $keyType = "string";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','status'
    ];


}
