<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function logon (){
        return view("admin.logon");
    }

    public function postLogon (Request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 1])) {
            return redirect("/admin");
        }
        else {
            return redirect()->back()->with('error', 'Email or password is incorrect !');
        }
    }

    public function signOut(){
        Auth::logout();
        Session::forget("cart");
        Session::flush();
        Session::save();
        return redirect("/logon");
    }
}
