<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
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

    public function cartCheckout(Request $request) {
        $cart = Session::get('cart');

        foreach ($cart as $item) {
            $variant = DB::table("product_variants")
                ->where("id", $item['variant_id'])
                ->lockForUpdate()
                ->first();

            if (!$variant || $variant->stock < $item['quantity']) {
                return redirect()->back()->with("error", "Product {$item['product_name']} {$item['color']} {$item['storage']} is not enough stock!");
            }
        }

        DB::beginTransaction();
        try {
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

                DB::table("product_variants")
                    ->where("id", $item['variant_id'])
                    ->decrement("stock", $item['quantity']);
            }

            Session::forget("cart");
            DB::commit();
            return view("client/CartCheckoutSuccess");

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with("error", "An error occurred during payment: " . $e->getMessage());
        }
    }



    public function test () {
        $product = DB::table('products')
            ->get();
        $data = Session::get('cart');
//        Session::forget("cart");
        dd($data);
        return redirect("/");
    }

}
