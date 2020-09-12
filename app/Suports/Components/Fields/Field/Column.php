<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Suports\Components\Fields\Field;


use App\Suports\Components\Fields\AbstractField;
use Illuminate\Support\Str;

class Column extends AbstractField {

    /**
     * Column constructor.
     *
     * @param $text
     * @param $name
     */
    public function __construct($text, $name)
    {
        $this->text = $text;
        $this->name = $name ?? Str::snake(Str::lower($text));
    }

    /**
     * @param  null  $text
     * @param  null  $attribute
     *
     * @return static
     */
    public static function make($text = null, $attribute = null)
    {
        return new static($text, $attribute);
    }

}
