<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AdminAccountController extends Controller
{
    public function getAll(): View
    {
        $activeMenu = "account";
        $accounts = DB::table("users")
            ->paginate(10);

        return view("admin.account-list",[
            "activeMenu" => $activeMenu,
            "accounts" => $accounts,
        ]);
    }
}
