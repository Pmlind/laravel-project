<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;
use Illuminate\Support\Facades\DB;


class DashController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('/dashboard',['users' => $data]);
    }

    //CREATE & LOAD DB
    public function showUDB(){
        
    }

    //INVOLVES DB ENTRIES
    public function createClient(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();
        return back()->with('success', 'Successfully Registered');
    }

    //TAKES EMAIL TO FIND TABLE ENTRY
    public function deleteClient(Request $request){
        $email = $request->email;
        $user = DB::table('users')->where('email', $email);
        $user->delete();
        return back();
    }
}
