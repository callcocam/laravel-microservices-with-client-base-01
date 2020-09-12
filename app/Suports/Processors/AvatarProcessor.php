<?php

/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Processors;

use Str;

class AvatarProcessor
{
    public static function get($model)
    {
        $file = $model->file()->first();

        if (is_null($file)) {
            if (isset($model->gender)) {
                //return 'https://avatars.dicebear.com/v2/initials/' .Str::slug($model->id) . '.svg';
                return sprintf(config('siga.image.no_avatar'), $model->gender);
            }
            return config('siga.image.no_image');
        }
        if (Str::contains($file->name, "storage"))
            return $file->name;
        return asset(sprintf("storage%s", $file->name));
    }
}
