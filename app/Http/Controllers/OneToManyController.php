<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\phone;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;

class OneToManyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::get();
        $user_roles = UserRole::get();
        // $users = User :: with('phones')->get();
        // echo "</pre>";
        // print_r($users);
        // return view('relationship/oneToOne')->with('phones', $phones);
        return view('relationship/oneToMany')->with('users', $users)->with('user_roles', $user_roles);
        // --------------------------------------------------------
        //     $user = Auth::user();      // logged in user
        //     $user_roles = [];         // coworkers array
        //     $roles = [];             // projects array

        //     foreach ($user->roles as $role) {
        //         foreach($role->users as $user_roles) {
        //             $user_roles[] = $user_roles;
        //             $roles[] = $roles;
        //         }
        //     }

        // $user = Auth::user();    // logged in user
        // $coworkers = [];         // coworkers array
        // $projects = [];          // projects array

        // foreach ($user->projects as $project) {
        //     foreach($project->users as $coworker) {
        //         $coworkers[] = $coworker;
        //         $projects[] = $project;
        //     }
        // }
        // return view ('teams.index', ['coworkers' => $coworkers, 'projects' => $projects]);

    }
}
