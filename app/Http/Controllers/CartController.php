<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart($id, $quantity) {
        $product = DB::table("products")
            ->where("id", $id)
            ->first();

        if (!$product) {
            return redirect("ClientIndex")->with('error', 'Product not found');
        }

        $cart = Session::get('cart', []);

        $found = false;

        foreach ($cart as $item) {
            if ($item->id == $id) {
                $item->quantity += $quantity;
                $found = true;

                // Check if the updated quantity exceeds the product stock
                if ($item->quantity > $product->stock) {
                    return redirect("ClientIndex")->with('error', 'Not enough stock');
                }
                break;
            }
        }

        if (!$found) {
            if ($product->stock >= $quantity && $quantity > 0) {
                $product->quantity = $quantity;
                $cart[] = $product;
            } else {
                return redirect("ClientIndex")->with('error', 'Not enough stock or invalid quantity');
            }
        }

        Session::put('cart', $cart);

        return redirect("ClientIndex")->with('success', 'Product added to cart');
    }

    public function cart(Request $request) {
        $product = DB::table("products")
            ->join("category", "product.category_id", "=", "category.id")
            ->join("publisher", "product.publisher_id", "=", "publisher.id")
            ->join("author", "product.author_id", "=", "author.id")
            ->select("product.*", "category.category_name", "publisher.publisher_name", "author.author_name")
            ->get();

        $cart = Session::get("cart");

        if($cart ==null) {
            $cart = [];
        }
//        dd($product);
        foreach ($cart as $obj) {
            foreach ($product as $obj2) {
                if($obj->category_id == $obj2->category_id)
                {
                    $obj->category_name = $obj2->category_name;
                }

                if($obj->publisher_id == $obj2->publisher_id)
                {
                    $obj->publisher_name = $obj2->publisher_name;
                }

                if($obj->author_id == $obj2->author_id)
                {
                    $obj->author_name = $obj2->author_name;
                }
            }
        }

        $total =0;
        foreach ($cart as $index => $obj) {
            if($obj->quantity > $obj->stock){
                $obj -> quantity = $obj->stock;
            }
            $total += $obj->price * $obj->quantity;
        }

        return view("client/showcart",[
            "cart" => $cart,
            "total" => $total,
            "product" => $product
        ]);

    }

        public function cartRemoveAll()
        {
            Session::forget("cart");
            return redirect('/cart');
        }
        public function cartRemove(Request $request) {
            $productIdToRemove = $request->id;

            $cart = Session::get("cart");

            foreach ($cart as $key => $product) {
                // Kiểm tra nếu id, quantity của sản phẩm trong mảng trùng với id, quantity sản phẩm cần xoá
                if ($product->id == $productIdToRemove) {
                    unset($cart[$key]);
                    break;
                }
            }

            session(['cart' => $cart]);
        return redirect("cart");
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

        foreach ($cart as $index => $obj) {
            $total += $obj->price * $obj->quantity;
        }

        return view("client/checkout",[
            "cart" => $cart,
            "total" => $total,
        ]);
    }

    public function cartCheckout(Request $request) {
        $total = $request->total;
        $status = "PENDING";

        $id = $request->id;
        $fullName = $request->fullName;
        $address = $request->address;
        $phone = $request->phone;

        DB::table("users")
            ->where("id", $id)
            ->update([
               "address" => $address,
            ]);

        $id = DB::table("orders")
            // insertGetId: insert de lay Id
            ->insertGetId([
                "full_name" => $fullName,
                "address" => $address,
                "phone" => $phone,
                "total" => $total,
                "status" => "PENDING",
                "created_at" => date("Y-m-d H:i:s"),
            ]);

        // them san pham, quantity, price vao order_detail
            $cart = Session::get('cart');
            foreach ($cart as $obj){
                DB::table("order_details")
                    ->insert([
                        'order_id' => $id,
                        'product_id' => $obj->id,
                        'price' => $obj->price,
                        'quantity' => $obj->quantity,
                        "created_at" => date("Y-m-d H:i:s"),
                    ]);
            }

            // cap nhat so luong san pham trong kho
            foreach ($cart as $obj){
                DB::table("product")
                    ->where("id", $obj->id)
                    ->update([
                        "stock" => $obj->stock - $obj->quantity,
                    ]);
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
