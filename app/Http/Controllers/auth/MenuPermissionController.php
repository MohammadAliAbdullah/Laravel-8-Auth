<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $user = Auth:: user()->id;
        $users = DB::table('users')
        ->select('users.id', 'users.email', 'user_roles.user_id', 'roles.display_name', 'menus.name','menus.url', 'menus.parent_id')
        ->join('user_roles', 'users.id', '=', 'user_roles.user_id')
        ->join('roles', 'roles.id', '=', 'user_roles.role_id')
        ->join('menu_permissions', 'menu_permissions.role_id','=','roles.id')
        ->join('menus', 'menus.id', '=', 'menu_permissions.menu_id')
        ->where('users.id', '=',$user)
        ->get();
        return view('settings.menu.showPermission')->with('menus', $menus)->with('roles', $roles)->with('users',$users);
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

        // not get data brother .. 
        // dd ($request->menu);

        $count = $request->menu;
        for ($i = 0; $i < count($count); $i++) {
            $menu_permission = new MenuPermission();
            $menu_permission->role_id = $request->role;
            $menu_permission->menu_id = $request->menu[$i];
            $menu_permission->created_by = $request->created_by;
            $menu_permission->updated_by = $request->updated_by;
            $menu_permission->created_at = $request->created_at;
            $menu_permission->updated_at = $request->updated_at;
            $menu_permission->branch_id = $request->branch_id;
            $menu_permission->organization_id = $request->organization_id;
            $menu_permission->save();
        }

        return response()->json($menu_permission);
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
