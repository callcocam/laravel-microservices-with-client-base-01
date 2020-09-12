<?php

/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Processors;

use Str;

class UploadProcessor
{
    public static function get($value)
    {

        if (is_null($value)) {
            return config('siga.image.no_image');
        }
        if (Str::contains($value, "storage"))
            return $value;

        return asset(sprintf("storage%s", $value));
    }
}
