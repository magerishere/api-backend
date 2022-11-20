<?php

namespace App\Http\Controllers\Api\V1;

use App\Enums\MenuEnums;
use App\Enums\TestEnums;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MenuController extends PhantomController
{
    protected $model = Menu::class;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $header_menus = $this->phantom__query()->with('children')->ofType(MenuEnums::BACK_HEADER)->whereNull('parent_id')->get();
        $footer_menus = $this->phantom__query()->with('children')->ofType(MenuEnums::BACK_FOOTER)->get();
        return $this->phantom__setResponse([
            'header_menus' => $header_menus,
            'footer_menus' => $footer_menus,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $menu = $this->phantom__create($request->all());
        return $this->phantom__setResponse([
            'menu' => $menu
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getTypes()
    {
        return $this->phantom__setResponse([
            'types' => MenuEnums::asSelectArray(),
        ]);
    }
}
