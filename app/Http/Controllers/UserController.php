<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function login() {
        return view("client.auth-login");
    }

    public function register() {
        return view("client.register");
    }

    public function postRegister(Request $request) {
        // validate du lieu truoc khi vao try catch
        $validatedData = $request->validate([
            'fullName' => 'required|string|',
            'email'    => 'required|string|email|unique:users,email',
            'phone'    => 'required|string|max:10|unique:users,phone',
            'password' => 'required|string|min:3|confirmed',
        ]);

        try {
            $fullName = $request->fullName;
            $email = $request->email;
            $phone = $request->phone;
            $password = Hash::make($request->password);

            DB::table("users")
                ->insert([
                    "name" => $fullName,
                    "email" => $email,
                    "phone" => $phone,
                    "password" => $password
                ]);

        } catch (\Throwable $e) {
            dd($e);
        }
        return redirect('/login');
    }

    public function postLogin(Request $request) {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/ClientIndex');
        }
        else {
            return redirect()->back()->with('error', 'Email or password is incorrect !');
        }

    }

    public function logout() {
        Auth::logout();
        Session::forget("cart");
        Session::flush();
        Session::save();
        return redirect('/login');
    }
}

