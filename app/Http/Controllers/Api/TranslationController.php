<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Controllers\Api;

use App\Http\Requests\TranslationRequest;
use App\Translation;

class TranslationController extends AbstractController
{
    protected $model = Translation::class;

    /**
     * Store a newly created resource in storage.
     *
     * @param  TranslationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TranslationRequest $request)
    {
        return parent::save($request);
    }

    /**
     * @param TranslationRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response|void
     */
    public function update(TranslationRequest $request, $id)
    {
        parent::save($request, $id);
    }
}
