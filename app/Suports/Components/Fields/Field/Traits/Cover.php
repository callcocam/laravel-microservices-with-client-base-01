<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Suports\Components\Fields\Field\Traits;


trait Cover
{

    protected $options = [];

    /**
     * @param array $options
     * @return $this
     */
    public function cover($options=[]){

        $this->options = $options;

        $this->type = "cover";

        $this->cellRenderFramework = "CellRendererCover";

        $this->help('Allowed JPG, GIF or PNG. Max size of 800kB');
        $this->confirm_delete_record();
        $this->mime_types('image/*');

        return $this;
    }

    /**
     * @param $accept
     * @return $this
     */
    public function mime_types($accept):self
    {
      return  $this->setAttribute('mime_types', $accept);

    }

    /**
     * @param $accept
     * @return $this
     */
    public function route($route):self
    {
       return $this->setAttribute('route', [
            'upload'=>route(sprintf("upload.%s.up", $route)),
            'download'=>route(sprintf("upload.%s.down", $route)),
            'remove'=>route(sprintf("upload.%s.del", $route)),
        ]);
    }

    /**
     * @param $accept
     * @return $this
     */
    public function accept($route):self
    {
        return $this->setAttribute('accept', 'remove_file');
    }
    /**
     * @param $accept
     * @return $this
     */
    public function confirm_delete_record($confirm_delete_record=[]):self
    {
        return $this->setAttribute('confirm_delete_record', array_merge([
            'type'=> "confirm",
            'color'=> "danger",
            'title'=> 'Por favor confirme',
            'text'=> 'Deseja realmente excluir a imagem?',
            'acceptText'=> "Excluir"
        ], $confirm_delete_record));
    }
}
