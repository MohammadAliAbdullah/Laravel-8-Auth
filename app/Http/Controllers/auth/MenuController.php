<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::All();
        $user = Auth:: user()->id;
        $users = DB::table('users')
        ->select('users.id', 'users.email', 'user_roles.user_id', 'roles.display_name', 'menus.name','menus.url', 'menus.parent_id')
        ->join('user_roles', 'users.id', '=', 'user_roles.user_id')
        ->join('roles', 'roles.id', '=', 'user_roles.role_id')
        ->join('menu_permissions', 'menu_permissions.role_id','=','roles.id')
        ->join('menus', 'menus.id', '=', 'menu_permissions.menu_id')
        ->where('users.id', '=',$user)
        ->get();
        return view('settings.menu.show')->with('menus', $menus)->with('users',$users);
        // return view('settings.menu.show');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::All();
        return view('partials.master.sideBar')->with('menus', $menus);
        // echo "<h1>Create Menu</h1>";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $menu = new Menu();
        $menu->name = $request->name;
        $menu->url = $request->url;
        $menu->font_awsome = $request->font_awsome;
        $menu->parent_id = $request->parent_id;
        $menu->level_no = $request->level_no;
        $menu->status = $request->status;
        $menu->created_by = $request->created_by;
        $menu->updated_by = $request->updated_by;
        $menu->created_at = $request->created_at;
        $menu->updated_at = $request->updated_at;
        $menu->branch_id = $request->branch_id;
        $menu->organization_id = $request->organization_id;
        $menu->save();
        // return response()->json($menu);
        if ($menu->id) {
            return response()->json(['success' => true, 'message' => 'Create New Menu !!'], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Create Fails !!'], 200);
        }
        // echo json_encode($menu);
        // return response()->json($menu);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
    }
   
}
