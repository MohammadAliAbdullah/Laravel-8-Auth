<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\Menu;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $data['roles'] = Role::orderBy('id', 'asc')->paginate(5);
        // return view('dashboard', $data);
        // ----
        // $users = DB::table('users')->paginate(15);
        // $users = DB::table('users')->simplePaginate(15);
        // return view('user.index', ['users' => $users]);
        //-----
        $menus = Menu::all();
        $roles = Role::paginate(8);
        // $rolesAll = Role::paginate(15);
        // $rolesSome = Role::where('roles', '>', 100)->paginate(15);
        // $roles = Role::where('id', '<', 6)->paginate(5);
        // $roles = Role::limit(6)->paginate(5);
        // $roles = Role::latest()->paginate(8);
        // $permission = $this->permission;
        $user = Auth:: user()->id;
        $menus = Menu::All();
        $roles = Role::All();
        $users = DB::table('users')
        ->select('users.id', 'users.email', 'user_roles.user_id', 'roles.display_name', 'menus.name','menus.url', 'menus.parent_id')
        ->join('user_roles', 'users.id', '=', 'user_roles.user_id')
        ->join('roles', 'roles.id', '=', 'user_roles.role_id')
        ->join('menu_permissions', 'menu_permissions.role_id','=','roles.id')
        ->join('menus', 'menus.id', '=', 'menu_permissions.menu_id')
        ->where('users.id', '=',$user)
        ->get();
        return view('auth.roles.show')->with('roles', $roles)->with('menus', $menus)->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::all();
        return view('auth.roles.create')->with('menus', $menus);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'display_name' => 'required',
        ]); 

        $role = new Role();
        $role->name = $request->name;
        $role->display_name  = $request->display_name;
        $role->created_at = $request->created_at;
        $role->updated_at = $request->updated_at;
        $role->created_by = $request->created_by;
        $role->updated_by = $request->updated_by;
        $role->branch_id = $request->branch_id;
        $role->organization_id = $request->organization_id;
        $role->save();
        // return response()->json($role);

        if ($role->id) {
            return response()->json(['success' => true, 'message' => 'Create New Role !!'], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Create Fails !!'], 200);
        }

        // echo json_encode($role);

        // $request->validate([
        //     'name' => 'required',
        //     'display_name' => 'required',
        // ]);
        // Role::create($request->all());
        // return json_encode(array(
        //     "statusCode"=>200
        // ));



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }
}
