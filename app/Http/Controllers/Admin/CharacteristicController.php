<?php

namespace App\Http\Controllers\Admin;

use App\Characteristic;
use App\Http\Requests\CharacteristicFormRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CharacteristicController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param CharacteristicFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CharacteristicFormRequest $request)
    {
        Characteristic::create($request->all());

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Characteristic::findOrFail($id)->delete();

        return back();
    }
}
