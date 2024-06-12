<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
   //Moves to register page
   public function registerUser(){
        return view('register');
   }

   //Backend of register page AKA creating user
   public function registerUserPost(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();
        return back()->with('success', 'Successfully Registered');
   }

   //Moves to login page
   public function loginUser(){
        return view('login');
   }

   public function loginUserPost(Request $request){
        //Given login info
        $credetials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($credetials)){
            return redirect('dashboard')->with('success', 'Successful Login');
        }
        return back()->with('error', 'Invalid Email or Password');
   }

   public function logoutUser() {
        Auth::logout();
        return redirect()->route('login');
   }
}
