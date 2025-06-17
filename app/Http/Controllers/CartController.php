<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use PayOS\PayOS;

class CartController extends Controller
{
//    public function handlePayOSCheckout(Request $request, $orderId)
//    {
//        $payOS = new PayOS(
//            env('PAYOS_CLIENT_ID'),
//            env('PAYOS_API_KEY'),
//            env('PAYOS_CHECKSUM_KEY')
//        );
//
//        $order = DB::table('orders')->find($orderId);
//        $orderDetails = DB::table('order_details')->where('order_id', $orderId)->get();
//
//        $items = [];
//        foreach ($orderDetails as $detail) {
//            $variant = DB::table('product_variants')->find($detail->product_variants_id);
//            $product = DB::table('products')->find($variant->product_id);
//
//            $items[] = [
//                'name' => $product->product_name,
//                'quantity' => (int) $detail->quantity,
//                'price' => (int) $detail->price
//            ];
//        }
//
//        $returnUrl = route('checkout.success');
//        $cancelUrl = route('checkout.cancel');
//
//        $paymentData = [
//            'orderCode' => intval($orderId),
//            'amount' => (int) $order->total,
//            'description' => 'Payment for Order #' . $orderId,
//            'items' => $items,
//            'returnUrl' => $returnUrl,
//            'cancelUrl' => $cancelUrl,
//            'expiredAt' => time() + 600
//        ];
////        dd($paymentData);
//        try {
//            $response = $payOS->createPaymentLink($paymentData);
//            return redirect($response['checkoutUrl']);
//        } catch (\Exception $e) {
//            return redirect()->back()->with('error', 'Payment initialization failed: ' . $e->getMessage());
//        }
//    }

    public function addToCart(Request $request) {
        if (!auth()->check()) {
            return response()->json(['success' => false, 'message' => 'You need to log in first.'], 401);
        }

        $request->validate([
            'variant_id' => 'required|integer',
            'quantity' => 'required|integer|min:1',
        ]);

        $variantId = $request->input('variant_id');
        $quantity = $request->input('quantity');

        $variant = DB::table("product_variants")
            ->where("id", $variantId)
            ->first();

        if (!$variant) {
            return response()->json(['success' => false, 'message' => 'Variant not found.']);
        }

        if ($variant->stock < $quantity) {
            return response()->json(['success' => false, 'message' => 'Quantity exceeds stock.']);
        }

        $product = DB::table('products')->where('id', $variant->product_id)->first();
        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Product not found.']);
        }

        // Lấy ảnh sản phẩm
        $image = DB::table('product_images')
            ->where('product_id', $product->id)
            ->orderBy('id')
            ->first();

        $imageUrl = $image ? $image->image_url : 'https://storage.googleapis.com/a1aa/image/6ab9284f-51a6-4771-eb33-47fa955ac262.jpg';

        $cart = Session::get('cart', []);
        $foundIndex = null;

        foreach ($cart as $index => $item) {
            if ($item['variant_id'] == $variantId) {
                $foundIndex = $index;
                break;
            }
        }

        if ($foundIndex !== null) {
            $newQuantity = $cart[$foundIndex]['quantity'] + $quantity;
            if ($newQuantity > $variant->stock) {
                return response()->json(['success' => false, 'message' => 'Total quantity in cart exceeds stock.']);
            }
            $cart[$foundIndex]['quantity'] = $newQuantity;
        } else {
            $cart[] = [
                'variant_id' => $variant->id,
                'product_id' => $variant->product_id,
                'color' => $variant->color,
                'storage' => $variant->storage,
                'price' => $product->price + $variant->price_adjustment,
                'quantity' => $quantity,
                'product_name' => $product->product_name,
                'description' => $product->description,
                'image_url' => $imageUrl,
                'stock' => $variant->stock,
            ];
        }

        Session::put('cart', $cart);

        return response()->json([
            'success' => true,
            'message' => 'Added to cart successfully!',
            'count' => count($cart),
        ]);

    }

    public function cart(Request $request) {
        $cart = Session::get("cart");

        if ($cart == null || empty($cart)) {
            return redirect("/shop")->with('cart_empty', 'You have no products in your cart, go shopping!');
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view("client/showcart", [
            'cart' => $cart,
            'total' => $total
        ]);
    }

    public function cartRemoveAll()
    {
        Session::forget("cart");
        return redirect('/cart');
    }

    public function cartRemove(Request $request) {
        $variantId = $request->input('variant_id');
        $cart = Session::get('cart', []);

        // Tìm và xóa item có variant_id tương ứng
        $cart = array_filter($cart, function($item) use ($variantId) {
            return $item['variant_id'] != $variantId;
        });

        Session::put('cart', $cart);

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return response()->json([
            'success' => true,
            'total' => number_format($total, 0, ',', ',') . 'đ',
            'count' => count($cart),
        ]);
    }


    public function updateQuantity(Request $request)
    {
        $variantId = $request->input('variant_id');
        $quantity = (int)$request->input('quantity');
        $cart = Session::get('cart', []);

        $found = false;
        $itemTotal = 0;
        $cartTotal = 0;

        // update quantity
        foreach ($cart as &$item) {
            if ($item['variant_id'] == $variantId) {
                $item['quantity'] = $quantity;
                $itemTotal = $item['price'] * $quantity;
                $found = true;
            }
            $cartTotal += $item['price'] * $item['quantity'];
        }

        if (!$found) {
            return response()->json([
                'success' => false,
                'message' => 'Product does not exist in cart!'
            ]);
        }

        Session::put('cart', $cart);

        return response()->json([
            'success' => true,
            'item_total' => number_format($itemTotal, 0, ',', ','),
            'cart_total' => number_format($cartTotal, 0, ',', ',')
        ]);
    }

    public function checkout() {
        $cart = Session::get("cart");

        if ($cart == null) {
            $cart = [];
        }

        if (empty($cart)) {
            return redirect("/cart");
        }

        $total = 0;
        $outOfStockItems = [];

        foreach ($cart as $item) {
            $variant = DB::table("product_variants")
                ->where("id", $item['variant_id'])
                ->first();

            if (!$variant || $variant->stock < $item['quantity']) {
                $outOfStockItems[] = $item['variant_id']; // hoặc $item['product_name'] nếu có
            }

            $total += $item['price'] * $item['quantity'];
        }

        if (!empty($outOfStockItems)) {
            return redirect("/cart")->with("error", "Some products in your cart are out of stock. Please check your shopping cart!");
        }

        return view("client/checkout", [
            "cart" => $cart,
            "total" => $total,
        ]);
    }

    private function getCartItems($cart)
    {
        $items = [];
        foreach ($cart as $item) {
            $items[] = [
                'name' => $item['product_name'] . ' ' . $item['color'] . ' - ' . $item['storage'],
                'quantity' => intval($item['quantity']),
                'price' => intval($item['price'])
            ];
        }
        return $items;
    }

    public function cartCheckout(Request $request) {
        $cart = Session::get('cart');
        DB::beginTransaction();
        try {
            foreach ($cart as $item) {
                $variant = DB::table("product_variants")
                    ->where("id", $item['variant_id'])
                    ->lockForUpdate()
                    ->first();

                if (!$variant || $variant->stock < $item['quantity']) {
                    throw new \Exception("Product {$item['product_name']} {$item['color']} {$item['storage']} is not enough stock!");
                }
            }


            DB::table("users")
                ->where("id", $request->userId)
                ->update(["address" => $request->address]);

            $orderId = DB::table("orders")
                ->insertGetId([
                    "user_id" => $request->userId,
                    "full_name" => $request->receiverName,
                    "address" => $request->address,
                    "phone" => $request->phone,
                    "total" => $request->total,
                    "status" => "Pending",
                    "payment_method" => $request->paymentMethod,
                    "order_date" => now(),
                ]);


            foreach ($cart as $item) {
                DB::table("order_details")->insert([
                    'order_id' => $orderId,
                    'product_variants_id' => $item['variant_id'],
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                    "order_date" => now(),
                ]);
            }

            if ($request->paymentMethod === 'cod') {
                foreach ($cart as $item) {
                    DB::table("product_variants")
                        ->where("id", $item['variant_id'])
                        ->decrement("stock", $item['quantity']);
                }
                DB::commit();
                Session::forget("cart");
                return view("client/CartCheckoutSuccess");
            }
            elseif ($request->paymentMethod === 'payos') {
                foreach ($cart as $item) {
                    DB::table("product_variants")
                        ->where("id", $item['variant_id'])
                        ->decrement("stock", $item['quantity']);
                }
                $payOS = new PayOS(
                    env('PAYOS_CLIENT_ID'),
                    env('PAYOS_API_KEY'),
                    env('PAYOS_CHECKSUM_KEY')
                );
                $returnUrl = route('checkout.success');
                $cancelUrl = route('checkout.cancel');

                $paymentData = [
                    'orderCode' => intval($orderId),
                    'amount' => intval($request->total),
                    'description' => 'Payment for Order #' . $orderId,
                    'items' => $this->getCartItems($cart),
                    'returnUrl' => $returnUrl,
                    'cancelUrl' => $cancelUrl,
                    'expiredAt' => time() + 600
                ];
//                dd($paymentData);

                $response = $payOS->createPaymentLink($paymentData);

                if (!isset($response['checkoutUrl'])) {
                    throw new \Exception("Payment gateway error: missing checkout URL.");
                }
                DB::commit();
                return redirect($response['checkoutUrl']);
            }

            }
        catch (\Exception $e)
        {
            DB::rollBack();
            Log::error('Checkout error: ' . $e->getMessage());
            return redirect()->back()->with("error", "An error occurred: " . $e->getMessage());
        }
    }

    public function checkoutSuccess(Request $request)
    {
        $orderId = $request->input('orderCode');

//        dd($request->all());
        $order = DB::table('orders')
            ->where('id', $orderId)
            ->where('user_id', Auth::user()->id)
            ->first();

        if (!$order || $order->status !== 'Pending') {
            abort(404);
        }

        $orderDetails = DB::table('order_details')
            ->where('order_id', $orderId)
            ->get();

//        foreach ($orderDetails as $detail) {
//            DB::table('product_variants')
//                ->where('id', $detail->product_variants_id)
//                ->decrement('stock', $detail->quantity);
//        }

        Session::forget("cart");
        return view("client/CartCheckoutSuccess");
    }

    public function checkoutCancel(Request $request)
    {
        $orderId = $request->input('orderCode');
        $order = DB::table('orders')->where('id', $orderId)->first();
        if (!$order) {
            abort(404);
        }
//        dd($request->all());
        $orderDetails = DB::table('order_details')
            ->where('order_id', $orderId)
            ->get();

        foreach ($orderDetails as $detail) {
            DB::table('product_variants')
                ->where('id', $detail->product_variants_id)
                ->increment('stock', $detail->quantity);
        }
        // Xóa đơn hàng đã tạo
        DB::table('order_details')->where('order_id', $orderId)->delete();
        DB::table('orders')->where('id', $orderId)->delete();

        return redirect('/cart')->with('error', 'Payment was cancelled');
    }

//    public function handlePayOSWebhook(Request $request)
//    {
//        $webhookData = $request->all();
//        $payOS = new PayOS(
//            env('PAYOS_CLIENT_ID'),
//            env('PAYOS_API_KEY'),
//            env('PAYOS_CHECKSUM_KEY')
//        );
//
//        try {
//            // Xác minh chữ ký webhook
//            $payOS->verifyPaymentWebhookData($webhookData);
//
//            $orderId = $webhookData['data']['orderCode'];
//            $status = $webhookData['data']['status'];
//
//            if ($status === 'PAID') {
//                DB::table('orders')
//                    ->where('id', $orderId)
//                    ->update(['status' => 'Paid']);
//
//                // Trừ tồn kho
//                $orderDetails = DB::table('order_details')
//                    ->where('order_id', $orderId)
//                    ->get();
//
//                foreach ($orderDetails as $detail) {
//                    DB::table('product_variants')
//                        ->where('id', $detail->product_variants_id)
//                        ->decrement('stock', $detail->quantity);
//                }
//            }
//
//            return response()->json(['message' => 'Webhook processed']);
//
//        } catch (\Exception $e) {
//            Log::error('Webhook error: ' . $e->getMessage());
//            return response()->json(['error' => $e->getMessage()], 400);
//        }
//    }


    public function test () {
        if(Auth::check() && Auth::user()->role !== 1){
            abort(404);
        }
        $product = DB::table('products')
            ->get();
        $data = Session::get('cart');
//        Session::forget("cart");
        dd($data);
        return redirect("/");
    }

}
