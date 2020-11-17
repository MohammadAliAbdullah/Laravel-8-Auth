<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Menu;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;

use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */

    public function index()
    {
        $roles = Role::All();
        $users = User::all();
        return view('auth.users.showCreateUserRole')->with('roles', $roles)->with('users', $users);
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
    public function usen()
    {
        return 13;
    }
}
