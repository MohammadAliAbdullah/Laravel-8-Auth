<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;

use App\Models\MenuPermission;
use App\Models\Menu;
use App\Models\Role;
use Illuminate\Http\Request;

class MenuPermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::All();
        $roles = Role::All();
        return view('settings.menu.showPermission')->with('menus', $menus)->with('roles', $roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ------------------------------------------------
        // $input = $request->all();
        // // $input['menu_id'] = $request->input('menu_id');
        // MenuPermission::create($input);
        // ------------------------------------------------
        // -----------------------ajax---------------------
        // $menu_permission = new MenuPermission();
        // $menu_permission->role_id = $request->role;
        // $menu_permission->menu_id = $request->menu;
        // $menu_permission->save();
        // return response()->json($menu_permission);
        //
        // $menu_permission->created_by = $request->created_by;
        // $menu_permission->updated_by = $request->updated_by;
        // $menu_permission->created_at = $request->created_at;
        // $menu_permission->updated_at = $request->updated_at;
        // $menu_permission->branch_id = $request->branch_id;
        // $menu_permission->organization_id = $request->organization_id;
      

        //  
        // if ($menu_permission->id) {
        //     return response()->json(['success' => true, 'message' => 'Create Menu Permission !!'], 200);
        // } else {
        //     return response()->json(['success' => false, 'message' => 'Create Fails !!'], 200);
        // }
        // ------------------------------------------------
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MenuPermission  $menuPermission
     * @return \Illuminate\Http\Response
     */
    public function show(MenuPermission $menuPermission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MenuPermission  $menuPermission
     * @return \Illuminate\Http\Response
     */
    public function edit(MenuPermission $menuPermission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MenuPermission  $menuPermission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MenuPermission $menuPermission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MenuPermission  $menuPermission
     * @return \Illuminate\Http\Response
     */
    public function destroy(MenuPermission $menuPermission)
    {
        //
    }
}
