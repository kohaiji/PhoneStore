<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class AdminStatsController extends Controller
{
    public function statistics(Request $request)
    {
        $startDate = $request->input('start_date', Carbon::now()->subDays(7)->format('Y-m-d'));
        $endDate = $request->input('end_date', Carbon::now()->format('Y-m-d'));

        // 1. Doanh thu theo ngày (7 ngày gần nhất)
        $dailyRevenue = DB::table('orders')
            ->where('status', 'completed')
            ->whereBetween('order_date', [$startDate, $endDate])
            ->select(DB::raw('DATE(order_date) as date'), DB::raw('SUM(total) as revenue'))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // 2. Doanh thu theo tháng (6 tháng gần nhất)
        $monthlyRevenue = DB::table('orders')
            ->where('status', 'completed')
            ->where('order_date', '>=', Carbon::now()->subMonths(5)->startOfMonth())
            ->select(DB::raw("DATE_FORMAT(order_date, '%Y-%m') as month"), DB::raw('SUM(total) as revenue'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // 3. Doanh thu theo năm
        $yearlyRevenue = DB::table('orders')
            ->where('status', 'completed')
            ->select(DB::raw('YEAR(order_date) as year'), DB::raw('SUM(total) as revenue'))
            ->groupBy('year')
            ->orderBy('year', 'desc')
            ->get();

        // 4. Thống kê tháng hiện tại
        $currentMonthStart = Carbon::now()->startOfMonth()->format('Y-m-d');
        $currentMonthEnd = Carbon::now()->endOfMonth()->format('Y-m-d');

        $currentMonthStats = [
            'orders' => DB::table('orders')
                ->where('status', 'completed')
                ->whereBetween('order_date', [$currentMonthStart, $currentMonthEnd])
                ->count(),

            'products' => DB::table('order_details')
                ->join('orders', 'order_details.order_id', '=', 'orders.id')
                ->where('orders.status', 'completed')
                ->whereBetween('orders.order_date', [$currentMonthStart, $currentMonthEnd])
                ->sum('order_details.quantity'),

            'revenue' => DB::table('orders')
                ->where('status', 'completed')
                ->whereBetween('order_date', [$currentMonthStart, $currentMonthEnd])
                ->sum('total')
        ];

        // 5. Top 10 sản phẩm bán chạy
        $bestSellers = DB::table('order_details')
            ->select(
                'products.id',
                'products.product_name',
                DB::raw('SUM(order_details.quantity) as total_sold')
            )
            ->join('product_variants', 'order_details.product_variants_id', '=', 'product_variants.id')
            ->join('products', 'product_variants.product_id', '=', 'products.id')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->where('orders.status', 'Completed')
            ->groupBy('products.id', 'products.product_name')
            ->orderByDesc('total_sold')
            ->take(10)
            ->get();

        // 6. Tăng trưởng so với tháng trước
        $currentMonthRevenue = DB::table('orders')
            ->where('status', 'completed')
            ->whereBetween('order_date', [
                Carbon::now()->startOfMonth()->format('Y-m-d'),
                Carbon::now()->format('Y-m-d')
            ])
            ->sum('total');

        $lastMonthRevenue = DB::table('orders')
            ->where('status', 'completed')
            ->whereBetween('order_date', [
                Carbon::now()->subMonth()->startOfMonth()->format('Y-m-d'),
                Carbon::now()->subMonth()->endOfMonth()->format('Y-m-d')
            ])
            ->sum('total');

        $growthRate = $lastMonthRevenue
            ? round(($currentMonthRevenue - $lastMonthRevenue) / $lastMonthRevenue * 100, 2)
            : 100;

        // 7. Top brand
        $topBrands = DB::table('order_details')
            ->select(
                'brands.id',
                'brands.brand_name',
                DB::raw('SUM(order_details.quantity) as total_sold')
            )
            ->join('product_variants', 'order_details.product_variants_id', '=', 'product_variants.id')
            ->join('products', 'product_variants.product_id', '=', 'products.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->where('orders.status', 'Completed')
            ->groupBy('brands.id', 'brands.brand_name')
            ->orderByDesc('total_sold')
            ->get();

        return view('admin.stats', compact(
            'dailyRevenue',
            'monthlyRevenue',
            'yearlyRevenue',
            'currentMonthStats',
            'bestSellers',
            'growthRate',
            'startDate',
            'endDate',
            'topBrands'
        ));
    }
}
