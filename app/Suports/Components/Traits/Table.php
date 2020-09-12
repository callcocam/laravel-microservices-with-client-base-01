<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Suports\Components\Traits;

trait Table
{

protected $stripe       = true;     //	Boolean		Add a stripes effect.	false
protected $hoverFlat    = true;     //	Boolean		Change effect hover and flat.	false
protected $maxHeight    = false;     //	px		Change the high maximum of the table, generating the scroll.	false
protected $multiple     = true;    //	Boolean		Determines if multiple items can be selected.	false
protected $notSpacer    = true;     //	Boolean		Eliminates the space between each tr.	false
protected $search       = true;     //	Boolean		Determine if the filtering functionality through an input is active.	false
protected $pagination   = false;     //	Boolean		Determine if the page is active so that only a certain number of items can be displayed.	false
protected $maxItems     = 12;      //	Number		Change the maximum number of items that can be displayed when the page is active.	5
protected $state        = true;     // (vs-tr)	Boolean		Determine the state of the element with a color.
protected $sortKey      = "name";   // (vs-th)	String		Determine the value to be raffled and if this activates that functionality.
protected $noDataText   ='Empty table';        //	String		Change the text of the notification when there is no data in the table.
protected $sst          = true;     // (server-site table)	Boolean		It does not execute the functions of the client side like search, pagination change or sort, now the methods are executed (search, change-page and sort) to be used when making the call to the api of the server.	fals
}
