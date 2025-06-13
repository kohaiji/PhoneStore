<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AdminOrderController extends Controller
{
    public function getAll(Request $request): View
    {
        $activeMenu = "order";
        $data = "";

        $query = DB::table("orders")
            ->orderBy("order_date", "DESC");

        //lọc theo status
        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        $orders = $query->paginate(10);


        return view("admin.order-List", [
            "orders" => $orders,
            "activeMenu" => $activeMenu,
            "currentFilter" => $request->input('status', 'all'),
            "data" => $data,
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        $order = DB::table("orders")->where("id", $id)->first();

        // Logic kiem soat chuyen status
        $allowedTransitions = [
            'Pending' => ['Confirmed', 'Cancelled'],
            'Confirmed' => ['Shipping', 'Cancelled'],
            'Shipping' => ['Completed'],
            'Completed' => [],
            'Cancelled' => []
        ];

        if (!in_array($request->status, $allowedTransitions[$order->status])) {
            return redirect()->back()->with('error', 'Unable to change order status');
        }

        DB::table("orders")
            ->where("id", $id)
            ->update(["status" => $request->status]);

        return redirect()->back()->with('success', 'Order status update successful');
    }

    public function orderDetails($id)
    {
        $activeMenu = "order";
        $order = DB::table("orders")->find($id);
        if (!$order) {
            abort(404);
        }

        $orderDetails = DB::table("order_details")
            ->select(
                'order_details.id',
                'order_details.price',
                'order_details.quantity',
                'products.product_name',
                'product_variants.color',
                'product_variants.storage',
                'product_variants.price_adjustment',
                'product_images.image_url'
            )
            ->join('product_variants', 'order_details.product_variants_id', '=', 'product_variants.id')
            ->join('products', 'product_variants.product_id', '=', 'products.id')
            ->leftJoin(DB::raw('(
        SELECT product_id, MIN(id) as min_id
        FROM product_images
        GROUP BY product_id
    ) as first_image'), 'products.id', '=', 'first_image.product_id')
            ->leftJoin('product_images', 'first_image.min_id', '=', 'product_images.id')
            ->where('order_details.order_id', $id)
            ->get();

        return view("admin.order-details", [
            "order" => $order,
            "orderDetails" => $orderDetails,
            "activeMenu" => $activeMenu,
        ]);
    }

    public function orderSearch(Request $request): View
    {
        $activeMenu = "order";
        $data = trim($request->data);
        $status = $request->input('status', 'all');

        $query = DB::table("orders")->orderBy("order_date", "DESC");

        if ($status !== 'all') {
            $query->where('status', $status);
        }

        if (!empty($data)) {
            $keywords = explode(' ', $data);
            foreach ($keywords as $word) {
                $query->where('full_name', 'LIKE', "%$word%");
            }
        }

        $orders = $query->paginate(10)->appends([
            'data' => $data,
            'status' => $status,
        ]);

        return view("admin.order-List", [
            "orders" => $orders,
            "activeMenu" => $activeMenu,
            "currentFilter" => $status,
            "data" => $data,
        ]);
    }


}
