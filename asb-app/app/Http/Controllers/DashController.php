<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class DashController extends Controller
{
    public function index()
    {
        $data = Client::where('user_id', Auth::user()->id)->get();
        return view('/dashboard',['user' => $data]);
    }

    //CREATE & LOAD DB
    public function showClients(Request $request){
        //IN ORDER TO SHOW WE MUST
        //$clients = User::find(1)->clients
        //DO FOR EACH 

       $user = $request->user();
       //CREATE CLIENT
       $newClient = new Client();
       $newClient->first_name = $request->first_name;
       $newClient->last_name = $request->last_name;
       $newClient->email = $request->email;
       $newClient->gender = $request->gender;
       $newClient->user_id = $request->user()->id;

       $user->clients()->save($newClient);
       return redirect()->back();
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
        $data = $request->email;
        $client = DB::table('clients')->where('email', $data);
        $client->delete();
        return back();
    }

    public function upgradeClient(Request $request){
        $data = $request->email;
        $client = DB::table('clients')->where('email', $data);
        $user = new User();
        $user->name = $client->first_name;
        $user->email = $client->email;
        $user->password = '1234';
        $user.save();
        return back();
    }
}
