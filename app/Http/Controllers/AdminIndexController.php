<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class AdminIndexController extends Controller
{
    public function adminIndex(){
        $activeMenu = "dashboard";
        return view('admin/adminIndex',
            [
                "activeMenu" => $activeMenu
            ]);
    }
}
