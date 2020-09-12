<?php


namespace App\Suports\Components\Fields\Field\Traits;


trait AgGrid
{
    protected $headerName = 'ID';

    protected $field = 'id';

    protected $width = null;

    protected $filter = false;

    protected $resizable = true;

    protected $checkboxSelection = false;

    protected $headerCheckboxSelectionFilteredOnly = false;

    protected $headerCheckboxSelection = false;
}
