<?php

namespace App\Http\Controllers;

use App\Models\phone;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;

class OneToOneController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User :: get();
        $phones = UserRole:: get();
        // $users = User :: with('phones')->get();
        // echo "</pre>";
        // print_r($users);
        // return view('relationship/oneToOne')->with('phones', $phones);
        return view('relationship/oneToOne')->with('users', $users)->with('phones', $phones);
    }
}
