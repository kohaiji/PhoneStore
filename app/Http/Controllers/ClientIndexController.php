<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class ClientIndexController extends Controller
{
    public function clientIndex()
    {
        $cart = Session::get("cart");

        $products = DB::table('products')
            ->leftJoin(DB::raw('
            (
                SELECT product_id, image_url
                FROM product_images
                WHERE id IN (
                    SELECT MIN(id)
                    FROM product_images
                    GROUP BY product_id
                )
            ) AS pi
        '), 'products.id', '=', 'pi.product_id')
            ->select('products.*', 'pi.image_url')
            ->limit(12)
            ->get();

        return view("client/ClientIndex",[
            "products" => $products,
            "cart" => $cart
        ]);

    }
    public function contact() {
        $cart = Session::get("cart");

        return view("client/contact",[
            "cart" => $cart
        ]);
    }

    public function aboutUs() {
        $cart = Session::get("cart");

        return view("client/about-us",[
            "cart" => $cart
        ]);
    }

    public function feedBack() {
        $cart = Session::get("cart");

        return view("client/feedback",[
            "cart" => $cart
        ]);
    }

    public function search(Request $request) {
        $data = "";
        $data = $request->data;
        $cart = Session::get("cart");

        $products = DB::table("products")
            ->where("product_name", "LIKE", "%$data%")
            ->join("category", "product.category_id", "=", "category.id")
            ->join("publisher", "product.publisher_id", "=", "publisher.id")
            ->join("author", "product.author_id", "=", "author.id")
            ->select("product.*", "category.category_name", "publisher.publisher_name", "author.author_name")
            ->orderBy("id")
            ->get();

        return view("client/search",[
            "cart" => $cart,
            "products" => $products,
            "data" => $data,
        ]);
    }

    public function productDetails($id) {
        $cart = Session::get("cart");

        $products = DB::table('products')
            ->leftJoin('product_variants', 'products.id', '=', 'product_variants.product_id')
            ->leftJoin('brands', 'products.brand_id', '=', 'brands.id')
            ->select(
                'products.*',
                'brands.brand_name',
                'product_variants.id as variant_id',
                'product_variants.color',
                'product_variants.storage',
                'product_variants.price_adjustment',
                'product_variants.stock'
            )
            ->where('products.id', $id)
            ->get();

        if ($products->isEmpty()) {
            abort(404, 'Product not found');
        }

        // Tách thông tin sản phẩm và biến thể
        $product = null;
        $variants = [];

        foreach ($products as $row) {
            if (!$product) {
                $product = (object)[
                    'id' => $row->id,
                    'product_name' => $row->product_name,
                    'description' => $row->description,
                    'price' => $row->price,
                    'screen_size' => $row->screen_size,
                    'resolution' => $row->resolution,
                    'ram' => $row->ram,
                    'battery_cap' => $row->battery_cap,
                    'os' => $row->os,
                    'chipset' => $row->chipset,
                    'sim' => $row->sim,
                    'camera' => $row->camera,
                    'refresh_rate' => $row->refresh_rate,
                    'release_date' => $row->release_date,
                    'brand_name' => $row->brand_name
                ];
            }

            if ($row->variant_id) {
                $variants[] = (object)[
                    'id' => $row->variant_id,
                    'color' => $row->color,
                    'storage' => $row->storage,
                    'price_adjustment' => $row->price_adjustment,
                    'stock' => $row->stock
                ];
            }
        }

        // Lấy tất cả ảnh của sản phẩm
        $images = DB::table('product_images')
            ->where('product_id', $id)
            ->select('image_url')
            ->get();

//        $products->quantity = $quantity;


        $productRelated = DB::table('products')
            ->leftJoin(DB::raw('
        (
            SELECT product_id, image_url
            FROM product_images
            WHERE id IN (
                SELECT MIN(id)
                FROM product_images
                GROUP BY product_id
            )
        ) AS pi
    '), 'products.id', '=', 'pi.product_id')
            ->select('products.*', 'pi.image_url')
            ->where('products.id', '!=', $id) // loại trừ sản phẩm hiện tại
            ->inRandomOrder()
            ->limit(4)
            ->get();

        return view("client/product-details",[
            "products" => $products,
            "images" => $images,
            'product' => $product,
            "productRelated" =>$productRelated,
            "cart" => $cart,
            'variants' => $variants
//            "quantity"=>$quantity
        ]);
    }

    public function cart( Request $request) {
        $cart = Session::get("cart");
        dd($cart);
    }

    public function shop():View {
        $cart = Session::get("cart");


        $products = DB::table("products")
            ->select("products.*")
            ->get();


        return view("client/shop", [
            "products" => $products,
            "cart" => $cart,
        ]);
    }

    public function order():View
    {
        $cart = Session::get("cart");

        $orders = DB::table("orders")
            ->where("orders.phone", "=", Auth::user()->phone)
            ->paginate(8);


        return view("client/order", [
            "orders" => $orders,
            "cart" => $cart
        ]);
    }

    public function orderDetails($id, $id2)
    {
        $cart = Session::get("cart");

        $idcus = $id2;

        $ordersTotal = DB::table("orders")
            ->where("orders.id", "=", $id)
            ->get();

        $orderDetails = DB::table("order_details")
            ->where("orders.id", "=", $id)
            ->join("orders", "order_details.order_id", "=", "orders.id")
            ->join("product", "order_details.product_id", "=", "product.id")
            ->select("product.product_name", "product.description", "product.image", "orders.id", "order_details.price", "order_details.quantity")
            ->get();


        return view("client/order-details", [
            "orderDetails" => $orderDetails,
            "ordersTotal" => $ordersTotal,
            "idcus" => $idcus,
            "cart" => $cart,
        ]);
    }

    public function ordersUpdateStatus($id, $status) {
        $cart = Session::get("cart");
        $order = DB::table("orders")
            ->get();

        foreach ($order as $obj){
            if ($obj->id == $id && $obj->status != "RECEIVED")
            {
                if($status == "CANCELED" && ($obj->status == "PENDING" || $obj->status == "CONFIRMED") && $obj->status != "SHIPPING"){
                    DB::table("orders")
                        ->where("id", $id)
                        ->update([
                            "status" => $status
                        ]);
                }
                else
                {
                    DB::table("orders")
                        ->where("id", $id)
                        ->update([
                            "status" => $status
                        ]);
                }
            }
        }


        return redirect ('/order');
    }

    public function filter($status)
    {
        $cart = Session::get("cart");
        $category = DB::table("category")
            ->get();
        $publisher = DB::table("publisher")
            ->get();
        $author = DB::table("author")
            ->get();

        switch($status){
            case "priceAsc":
                $products = DB::table("products")
                    ->join("category", "product.category_id", "=", "category.id")
                    ->join("publisher", "product.publisher_id", "=", "publisher.id")
                    ->join("author", "product.author_id", "=", "author.id")
                    ->select("product.*", "category.category_name", "publisher.publisher_name", "author.author_name")
                    ->orderBy("price", "asc")
                    ->paginate(8);
                break;
            case "priceDesc":
                $products = DB::table("products")
                    ->join("category", "product.category_id", "=", "category.id")
                    ->join("publisher", "product.publisher_id", "=", "publisher.id")
                    ->join("author", "product.author_id", "=", "author.id")
                    ->select("product.*", "category.category_name", "publisher.publisher_name", "author.author_name")
                    ->orderBy("price", "desc")
                    ->paginate(8);
                break;
            case "az":
                $products = DB::table("products")
                    ->join("category", "product.category_id", "=", "category.id")
                    ->join("publisher", "product.publisher_id", "=", "publisher.id")
                    ->join("author", "product.author_id", "=", "author.id")
                    ->select("product.*", "category.category_name", "publisher.publisher_name", "author.author_name")
                    ->orderBy("product_name", "asc")
                    ->paginate(8);
                break;
            case "za":
                $products = DB::table("products")
                    ->join("category", "product.category_id", "=", "category.id")
                    ->join("publisher", "product.publisher_id", "=", "publisher.id")
                    ->join("author", "product.author_id", "=", "author.id")
                    ->select("product.*", "category.category_name", "publisher.publisher_name", "author.author_name")
                    ->orderBy("product_name", "desc")
                    ->paginate(8);
                break;
            case $status;
                $products =  DB::table("products")
                    ->where("category.category_name", "=", $status)
                    ->orWhere("publisher.publisher_name", "=", $status)
                    ->orWhere("author.author_name", "=", $status)
                    ->join("category", "product.category_id", "=", "category.id")
                    ->join("publisher", "product.publisher_id", "=", "publisher.id")
                    ->join("author", "product.author_id", "=", "author.id")
                    ->select("product.*", "category.category_name", "publisher.publisher_name", "author.author_name")
                    ->paginate(8);

        }


        return view("client.shop", [
            "products" => $products,
            "cart" => $cart,
            "category" => $category,
            "publisher" => $publisher,
            "author" => $author
        ]);
    }

}

