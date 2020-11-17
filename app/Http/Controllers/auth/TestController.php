<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Menu;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\UserRole;
// use DB;

class TestController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        $permissions = Permission::all();
        $user = Auth::user()->id;
        $users = DB::table('users')
            ->select('users.id', 'users.email', 'user_roles.user_id', 'roles.display_name', 'menus.name', 'menus.url', 'menus.parent_id')
            ->join('user_roles', 'users.id', '=', 'user_roles.user_id')
            ->join('roles', 'roles.id', '=', 'user_roles.role_id')
            ->join('menu_permissions', 'menu_permissions.role_id', '=', 'roles.id')
            ->join('menus', 'menus.id', '=', 'menu_permissions.menu_id')
            ->where('users.id', '=', $user)
            ->get();
        return view('auth.users.create')->with('permissions', $permissions)->with('menus', $menus)->with('users', $users);
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    public function submenu(Request $request)
    {

        dd($request->name);
    }
    public function users_menu()
    {
        $roles = Role::All();
        $users = User::all();
        return view('test')->with('users', $users)->with('roles', $roles);
    }
    public function dashboard()
    {
        $user = Auth::user()->id;
        $menus = Menu::All();
        $users = DB::table('users')
            ->select('users.id', 'users.email', 'user_roles.user_id', 'roles.display_name', 'menus.name', 'menus.url', 'menus.parent_id')
            ->join('user_roles', 'users.id', '=', 'user_roles.user_id')
            ->join('roles', 'roles.id', '=', 'user_roles.role_id')
            ->join('menu_permissions', 'menu_permissions.role_id', '=', 'roles.id')
            ->join('menus', 'menus.id', '=', 'menu_permissions.menu_id')
            ->where('users.id', '=', $user)
            ->get();
        return view('dashboard')->with('menus', $menus)->with('users', $users);
    }
    public function settings()
    {
        $user = Auth::user()->id;
        $users = DB::table('users')
            ->select('users.id', 'users.email', 'user_roles.user_id', 'roles.display_name', 'menus.name', 'menus.url', 'menus.parent_id')
            ->join('user_roles', 'users.id', '=', 'user_roles.user_id')
            ->join('roles', 'roles.id', '=', 'user_roles.role_id')
            ->join('menu_permissions', 'menu_permissions.role_id', '=', 'roles.id')
            ->join('menus', 'menus.id', '=', 'menu_permissions.menu_id')
            ->where('users.id', '=', $user)
            ->get();
        return view('settings.settings')->with('users', $users);
    }
    public function CreateNewUser(Request $request)
    {
        $create_user = new User();
        $create_user->name = $request->name;
        $create_user->email = $request->email;
        $create_user->password = Hash::make($request->password);
        $create_user->save();
        if ($request->user_assign_role) {
        $role_id = $request->user_assign_role;
        $create_user->user_roles()->attach($role_id);
        }
        return response()->json($create_user);
    }
    public function products()
    {
        $user = Auth::user()->id;
        $users = DB::table('users')
        ->select('users.id', 'users.email', 'user_roles.user_id', 'roles.display_name', 'menus.name', 'menus.url', 'menus.parent_id')
        ->join('user_roles', 'users.id', '=', 'user_roles.user_id')
        ->join('roles', 'roles.id', '=', 'user_roles.role_id')
        ->join('menu_permissions', 'menu_permissions.role_id', '=', 'roles.id')
        ->join('menus', 'menus.id', '=', 'menu_permissions.menu_id')
        ->where('users.id', '=', $user)
        ->get();
       return view('products.products.create')->with('users', $users);
    }
}
