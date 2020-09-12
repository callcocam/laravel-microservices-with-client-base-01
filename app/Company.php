<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App;

use App\Scopes\UuidGenerate;
use App\Suports\Sluggable\HasSlug;
use App\Suports\Tenant\BelongsToTenants;

class Company extends  AbstractModel
{

     use UuidGenerate, BelongsToTenants, HasSlug;

     protected $keyType = 'string';
     /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
     protected $fillable = [
         'user_id','name','fantasy','slug','email','document','ie','phone','site','cover','status', 'description'
     ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
      'cover' => 'array'
    ];

    public function address()
    {

        return $this->morphOne(Addres::class, 'addresable')->select(['id', 'name', 'slug', 'zip', 'city', 'state', 'country', 'street', 'district', 'number', 'complement', 'status']);
    }

    public function getAddressAttribute(){
        return $this->address()->first();
    }
}
