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
            ->where("role", "=", 0)
            ->paginate(10);

        return view("admin.account-list",[
            "activeMenu" => $activeMenu,
            "accounts" => $accounts,
        ]);
    }

    public function toggleStatus($id)
    {
        $user = DB::table('users')->where('id', $id)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }

        $newStatus = $user->status === 'active' ? 'inactive' : 'active';

        DB::table('users')->where('id', $id)->update([
            'status' => $newStatus,
        ]);

        return redirect()->back()->with('success', 'Account status updated successfully');
    }

    public function search(Request $request): View
    {
        $activeMenu = "account";
        $data = trim($request->data);

        $query = DB::table("users")->where("role", "=", 0);

        if (!empty($data)) {
            $keywords = explode(' ', $data);
            foreach ($keywords as $word) {
                $query->where("name", "LIKE", "%$word%");
            }
        }

        $accounts = $query
            ->orderBy("id")
            ->paginate(10)
            ->appends(['data' => $data]);

        return view("admin.account-list", [
            "accounts" => $accounts,
            "data" => $data,
            "activeMenu" => $activeMenu,
        ]);
    }

}
