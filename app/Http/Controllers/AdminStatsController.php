<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminStatsController extends Controller
{
    public function statistics(Request $request) {
        $date = $request->date;

        $activeMenu = "stats";

        $result1 = DB::table("orders")
            ->selectRaw("MONTH(created_at) as month, YEAR(created_at) year, SUM(orders.total) as revenue")
            ->where("status", "=", "RECEIVED")
            ->groupByRaw("MONTH(created_at), YEAR(created_at)")
            ->get();


        // Kiểm tra và gán giá trị mặc định nếu result1 trống
        $obj1 = $result1->isEmpty() ? (object)['month' => null, 'year' => null, 'revenue' => 0] : $result1[0];

        foreach ($result1 as $i => $obj){
            if($obj1->revenue < $obj->revenue){
                $obj1 = $obj;
            }
        }

        $result2 = DB::table("orders")
            ->selectRaw("YEAR(created_at) year, SUM(total) revenue")
            ->where("status", "RECEIVED")
            ->groupByRaw("YEAR(created_at)")
            ->get();

        $obj2 = $result2->isEmpty() ? (object)['year' => null, 'revenue' => 0] : $result2[0];

        foreach ($result2 as $i => $obj){
            if($obj2->revenue < $obj->revenue){
                $obj2 = $obj;
            }
        }

        $obj3 = DB::table("orders")
            ->selectRaw("SUM(total) revenue")
            ->whereDate("created_at", '=', $date) // Lưu ý định dạng ngày là YYYY-MM-DD
            ->where("status", "RECEIVED")
            ->first();

        $obj4 = DB::table("orders")
            ->selectRaw("SUM(total) revenue")
            ->where("status", "RECEIVED")
            ->first();
        $obj4->revenue == null ? $obj4->revenue = 0 : $obj4->revenue;

        return view ("admin.stats",[
            "obj1" => $obj1,
            "obj2" => $obj2,
            "obj3" => $obj3,
            "obj4" => $obj4,
            "activeMenu" => $activeMenu,
            "date" => $date,
        ]);
    }
}
