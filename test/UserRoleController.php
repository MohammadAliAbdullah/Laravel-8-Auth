<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;

use App\Models\Menu;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::All();
        $roles = Role::All();
  
        // SELECT users.id, users.name, menus.name as menuname,menus.parent_id, roles.name AS rolename, menu_permissions.role_id, menu_permissions.menu_id, user_roles.user_id, user_roles.role_id FROM users, menu_permissions, roles, menus, user_roles WHERE roles.id=menu_permissions.role_id AND menus.id=menu_permissions.menu_id AND user_roles.user_id=users.id AND user_roles.role_id=roles.id AND users.id=2
        // ---------
        // SELECT users.id, menus.name, menus.parent_id, roles.name AS role, menu_permissions.menu_id FROM users, menu_permissions, roles, menus, user_roles WHERE roles.id=menu_permissions.role_id AND menus.id=menu_permissions.menu_id AND user_roles.user_id=users.id AND user_roles.role_id=roles.id AND users.id=2
        // ---------
        // $where = [
        //     'roles.id' => 'menu_permissions.role_id',
        //     'menus.id' => 'menu_permissions.menu_id',
        //     'user_roles.user_id' => 'users.id',
        //     'users.id' => 1,
        // ];

        // $menus = Menu::select('users.id', 'menus.name', 'menus.parent_id', 'menu_permissions.menu_id')->with('users', 'menu_permissions', 'roles', 'menus', 'user_roles')->where($where)->get();
        // dd($menus);

        // select `users`.`id`, `users`.`name`, `users`.`email`, `user_roles`.`user_id` from `users`, `user_roles` where `users`.`id` = user_roles.user_id;

        $users = User:: with('user_roles')->where('users.id','=','user_roles.user_id')->get();
        // return view('auth.roles.showUserRole')
        return view('partials.master.sideBar')->with('users', $users);
            // ->with('users', $users)
            // ->with('roles', $roles);
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
        $users = UserRole::where('user_id', '=', $request->user_id)->get();
        if (count($users) == 0) {
            $assign_role = new UserRole();
            $assign_role->user_id = $request->user_id;
            $assign_role->role_id = $request->role_id;
            $assign_role->save();
            // return response()->json(count($users));
        } else {
            $assignRoleUpdate = UserRole::where('user_id', '=', $request->user_id)->get()->frist();
            // $assignRoleUpdate = new UserRole();
            $assignRoleUpdate->role_id = $request->role_id;
            $assignRoleUpdate->save();
            // return response()->json($assignRoleUpdate);
            return response()->json(count($users));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserRole  $userRole
     * @return \Illuminate\Http\Response
     */
    public function show(UserRole $userRole)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserRole  $userRole
     * @return \Illuminate\Http\Response
     */
    public function edit(UserRole $userRole)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserRole  $userRole
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserRole $userRole)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserRole  $userRole
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserRole $userRole)
    {
        //
    }
}
