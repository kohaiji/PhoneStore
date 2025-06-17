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
            'phone'    => 'required|string|max:10|min:10|unique:users,phone',
            'password' => 'required|string|min:3|confirmed',
            'gender'   => 'required|in:Male,Female,Other'
        ], [
            'fullName.required'   => 'Full name is required.',
            'email.required'      => 'Email is required.',
            'email.email'         => 'Invalid email format.',
            'email.unique'        => 'This email is already registered.',
            'phone.required'      => 'Phone number is required.',
            'phone.max'           => 'Phone number cannot be longer than 10 digits.',
            'phone.min'           => 'Phone number cannot be shorter than 10 digits.',
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
            if(Auth::user()->status == 'inactive'){
                Auth::logout();
                Session::flush();
                return redirect()->back()
                    ->with('error', 'Your account has been locked!');
            }
            return redirect('/ClientIndex');
        }
        else {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Email or password is incorrect!');
        }

    }

    public function changePassword() {
        return view("client.change-password");
    }

    public function postChangePassword(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:3|confirmed',
        ], [
            'name.required' => 'Name is required.',
            'email.required' => 'Email is required.',
            'email.exists' => 'Email not found.',
            'password.required' => 'Password is required.',
            'password.confirmed' => 'Password confirmation does not match.',
        ]);

        try {
            $user = User::where('email', $request->email)
                ->where('name', $request->name)
                ->first();

            if (!$user) {
                return back()->withInput()->with('error', 'User not found with the provided name and email.');
            }

            $newPassword = Hash::make($request->password);
            DB::table('users')
                ->where('email', $request->email)
                ->update([
                    "password" => $newPassword,
                ]);

            return redirect('/login')->with('success', 'Password has been reset successfully.');
        } catch (\Throwable $e) {
            return back()->withInput()->with('error', 'System error: ' . $e->getMessage());
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

