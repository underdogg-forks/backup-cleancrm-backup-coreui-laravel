<?php

namespace Modules\Settings\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Settings\Entities\Menu;
use Modules\Settings\Http\Requests\MenuRequest;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $menus = Menu::has('parent', 0)
            ->with([
                'childs' => function ($q) {
                    $q->orderBy('order');
                }
            ])->orderBy('order')->get();


        return view('settings::menu.index', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     * @param MenuRequest $request
     * @return Response
     */
    public function store(MenuRequest $request)
    {
        $menu = new Menu($request->only('name', 'url', 'icon', 'url', 'active', 'order'));

        $menu->parent()->associate($request->input('parent.id'));

        $menu->save();

        $menu->syncPermissions($request->input('permissions.*.name'));

        flash('Menu successfuly created.')->success();

        return response(['path' => $this->path()]);
    }

    /**
     * @return string
     */
    protected function path()
    {
        return route('settings.menus.index');
    }

    /**
     * Update the specified resource in storage.
     * @param MenuRequest $request
     * @param Menu $menu
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function update(MenuRequest $request, Menu $menu)
    {
        $menu->fill($request->only('name', 'url', 'icon', 'url', 'active', 'order'));
        $menu->parent()->associate($request->input('parent.id'));
        $menu->save();

        flash('Menu successfuly updated.')->info();

        $menu->syncPermissions($request->input('permissions.*.name'));

        return response(['path' => $this->path()]);
    }

    /**
     * Remove the specified resource from storage.
     * @param Menu $menu
     * @return Response
     * @throws \Exception
     */
    public function destroy(Menu $menu)
    {

        $menu->permissions()->detach();

        $menu->delete();

        flash('Menu successfuly deleted.')->info();

        return response(['path' => $this->path()]);
    }
}
