<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Auth;

class UserController extends Controller
{
    function getUsers(){
        //Get user using eloquent orm
        $users = User::all();

        //Get user using query
        //$users = DB::table('users')->get();

        return view('admin.index');
    }

    // Logout functionality
    public function Logout(){
        Auth::logout();

        return redirect()->route('login')->with('success','Logout successful');
    }
}
