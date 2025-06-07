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

        // Cập nhật lại session
        Session::put('cart', $cart);

        // Tính toán lại tổng tiền
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


    public function cartUpdate($type,$id, $quantity ) {
        $cart = Session::get("cart");
        $product = DB::table("product")
            ->where('id', $id)
            ->first();

        foreach ($cart as $index => $obj) {

            if ($obj->id == $id && $type == "plus" && $obj -> quantity < $product->stock) {
                $obj->quantity = $quantity +1;

            }

            if ($obj->id == $id && $type == "sub") {
                if ($quantity > 1){
                    $obj->quantity = $quantity -1;
                } elseif ($quantity == 1 && $obj -> quantity == 1){
                    unset($cart[$index]);
                    break;
                }

            }


        }
        Session::put("cart",$cart);

        return redirect("cart");
    }

    public function checkout() {

        $cart = Session::get("cart");

        if($cart ==null) {
            $cart = [];
        }

        $total =0;
        if(empty($cart)) {
            return redirect("/cart");
        }


        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view("client/checkout",[
            "cart" => $cart,
            "total" => $total,
        ]);
    }

    public function cartCheckout(Request $request) {
        $total = $request->total;
        $status = "Pending";

        $userId = $request->userId;
        $receiverName = $request->receiverName;
        $address = $request->address;
        $phone = $request->phone;
        $paymentMethod = $request->paymentMethod;

        DB::table("users")
            ->where("id", $userId)
            ->update([
               "address" => $address,
            ]);

        $id = DB::table("orders")
            // insertGetId: insert de lay Id
            ->insertGetId([
                "user_id" => $userId,
                "full_name" => $receiverName,
                "address" => $address,
                "phone" => $phone,
                "total" => $total,
                "status" => $status,
                "payment_method" => $paymentMethod,
                "order_date" => date("Y-m-d H:i:s"),
            ]);

        // them san pham, quantity, price vao order_detail
        $cart = Session::get('cart');
        foreach ($cart as $obj){
            DB::table("order_details")
                ->insert([
                    'order_id' => $id,
                    'product_variants_id' => $obj['variant_id'],
                    'price' => $obj['price'],
                    'quantity' => $obj['quantity'],
                    "order_date" => date("Y-m-d H:i:s"),
                ]);
        }

        // cap nhat so luong san pham trong kho
        foreach ($cart as $obj) {
            $variant = DB::table("product_variants")
                ->where("id", $obj['variant_id'])
                ->first();

            if ($variant && $variant->stock >= $obj['quantity']) {
                DB::table("product_variants")
                    ->where("id", $obj['variant_id'])
                    ->update([
                        "stock" => $variant->stock - $obj['quantity'],
                    ]);
            }
        }

        //Xóa giỏ hàng
        {
            Session::forget("cart");
        }

        return view("client/CartCheckoutSuccess",[

        ]);
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
