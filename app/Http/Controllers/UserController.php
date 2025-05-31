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

    public function postRegister(Request $request)
    {
        $validatedData = $request->validate([
            'fullName' => 'required|string',
            'email'    => 'required|string|email|unique:users,email',
            'phone'    => 'required|string|max:10|unique:users,phone',
            'password' => 'required|string|min:3|confirmed',
            'gender'   => 'required|in:Male,Female,Other'
        ], [
            'fullName.required'   => 'Full name is required.',
            'email.required'      => 'Email is required.',
            'email.email'         => 'Invalid email format.',
            'email.unique'        => 'This email is already registered.',
            'phone.required'      => 'Phone number is required.',
            'phone.max'           => 'Phone number cannot be longer than 10 digits.',
            'phone.unique'        => 'This phone number is already registered.',
            'password.required'   => 'Password is required.',
            'password.min'        => 'Password must be at least 3 characters.',
            'password.confirmed'  => 'Password confirmation does not match.',
            'gender.required'     => 'Gender selection is required.',
            'gender.in'           => 'Invalid gender value.'
        ]);

        try {
            $fullName = $request->fullName;
            $email    = $request->email;
            $phone    = $request->phone;
            $gender   = $request->gender;
            $password = Hash::make($request->password);

            DB::table("users")->insert([
                "name"     => $fullName,
                "email"    => $email,
                "phone"    => $phone,
                "password" => $password,
                "gender"   => $gender
            ]);

        } catch (\Throwable $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'System error: ' . $e->getMessage());
        }

        return redirect('/register')->with('success', 'Registration successful! Please login.');
    }


    public function postLogin(Request $request) {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/ClientIndex');
        }
        else {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Email or password is incorrect!');
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

