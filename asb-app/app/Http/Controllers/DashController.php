<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;

class DashController extends Controller
{
    public function index()
    {
        return view('/dashboard');
    }

    //CREATE & LOAD DB
    public function showUDB(){
        
    }

    //INVOLVES DB ENTRIES
    public function createClient(Request $request){
        $client = new Client();
        $client->name = $request->name;
        $client->email = $request->email;
        $client->gender = $request->gender;

        $client->save();
    }

    //TAKES EMAIL TO FIND TABLE ENTRY
    public function deleteClient(){
     
    }

    //TAKES EMAIL TO FIND TABLE ENTRY
    public function updateClient(){
     
    }

    //TAKES EMAIL TO FIND TABLE ENTRY
    public function assignUser(){
    
   }
}
