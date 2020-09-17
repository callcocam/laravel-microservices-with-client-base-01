<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MeController extends AbstractController
{
    public function me(Request $request)
    {

        $data = $request->user();
        $data['api'] = route('admin.profile.edit', $request->user()->id);
        $data['update'] = route('admin.profile.update', $request->user()->id);
        $data['store'] = route('admin.profile.store');
        $data->append('cover');
        $data->append('roles');
        return response()->json($data);
    }
}
