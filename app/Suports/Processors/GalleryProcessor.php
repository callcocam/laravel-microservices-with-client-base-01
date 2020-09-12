<?php

/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Processors;

use Str;

class GalleryProcessor
{
    public static function get($model)
    {
        $galleries = $model->gallery()->orderBy('created_at')->get();
        $data = [];
        if ($galleries) {
            $i = 1;
            foreach ($galleries as $file) {
                $file_name = null;
                if (Str::contains($file->name, "storage")) {
                    if (!Str::contains($file->name, ".mp4")) {
                        $file_name = $file->name;
                    }
                } else {
                    if (!Str::contains($file->name, ".mp4")) {
                        $file_name = asset(sprintf("storage/%s", $file->name));
                    }
                }
                $data[] = [
                    'file_id' => $file->id, //usado para deletar o registro do banco de dados
                    'file' => $file_name, //usado para deletar a imagem
                    'cover' => $file_name, //usado para visualizar a imagem
                    'src' => $file_name, //usado para mostra a imagem na listagem
                    'name' =>  $model->name, // usado com descrição
                    'id' =>  $model->id, //usado para pega o model pai
                ];
            }
        }

        return  $data;
    }
}
