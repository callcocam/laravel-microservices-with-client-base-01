<?php

/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Suports\Processors;

use Str;

class CoverProcessor
{
    public static function get($model)
    {
        if(is_string($model)){
            return asset($model);
        }
        return 'https://avatars.dicebear.com/v2/initials/' .Str::slug($model->name) . '.svg';
    }
}
