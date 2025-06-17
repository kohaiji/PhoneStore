<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

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

    public function shop(Request $request):View {
        $cart = Session::get("cart", []);

        $query = DB::table('products')
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
            ->select('products.*', 'pi.image_url');

        // tìm kiếm
        if ($request->has('search') && !empty(trim($request->search))) {
            $keywords = explode(' ', trim($request->search));
            foreach ($keywords as $word) {
                $query->where('products.product_name', 'like', '%' . $word . '%');
            }
        }

        // brand
        if ($request->has('brands')) {
            $brands = $request->input('brands');
            $query->whereIn('products.brand_id', $brands);
        }

        // kích thước màn hình
        if ($request->has('screen_size_group')) {
            $groups = (array) $request->input('screen_size_group');
            $query->where(function ($q) use ($groups) {
                if (in_array('under6', $groups)) {
                    $q->orWhere('products.screen_size', '<', 6);
                }
                if (in_array('above6', $groups)) {
                    $q->orWhere('products.screen_size', '>=', 6);
                }
            });
        }

        // refresh rate
        if ($request->has('refresh_rates')) {
            $refreshRates = $request->input('refresh_rates');
            $query->whereIn('products.refresh_rate', $refreshRates);
        }

        // RAM
        if ($request->has('ram_group')) {
            $groups = (array) $request->input('ram_group');
            $query->where(function ($q) use ($groups) {
                foreach ($groups as $group) {
                    if ($group === 'under4') {
                        $q->orWhereRaw("CAST(REPLACE(REPLACE(LOWER(ram), 'gb', ''), ' ', '') AS UNSIGNED) < 4");
                    } elseif ($group === '4to6') {
                        $q->orWhereRaw("CAST(REPLACE(REPLACE(LOWER(ram), 'gb', ''), ' ', '') AS UNSIGNED) BETWEEN 4 AND 6");
                    } elseif ($group === '8to12') {
                        $q->orWhereRaw("CAST(REPLACE(REPLACE(LOWER(ram), 'gb', ''), ' ', '') AS UNSIGNED) BETWEEN 8 AND 12");
                    }
                }
            });
        }

        // Xử lý sắp xếp giá
        if ($request->has('sort_price')) {
            $sortPrice = $request->input('sort_price');
            if ($sortPrice === 'asc') {
                $query->orderBy('products.price', 'asc');
            } elseif ($sortPrice === 'desc') {
                $query->orderBy('products.price', 'desc');
            }
        }

        $brandsList = DB::table('brands')->get();
        $screenSizesList = DB::table('products')->select('screen_size')->distinct()->get();
        $refreshRatesList = DB::table('products')->select('refresh_rate')->distinct()->get();
        $ramsList = DB::table('products')->select('ram')->distinct()->get();

        $allProducts = $query->get();

        $perPage = 12;
        $initialProducts = $allProducts->take($perPage);

        return view("client.shop", [
            "products" => $initialProducts,
            "allProducts" => $allProducts,
            "cart" => $cart,
            "perPage" => $perPage,
            "brands" => $brandsList,
            "screen_sizes" => $screenSizesList,
            "refresh_rates" => $refreshRatesList,
            "rams" => $ramsList,
        ]);
    }

    public function order():View
    {
        $cart = Session::get("cart");

        $orders = DB::table("orders")
            ->where("orders.user_id", "=", Auth::user()->id)
            ->get();


        return view("client/order", [
            "orders" => $orders,
            "cart" => $cart
        ]);
    }

    public function orderDetails($id)
    {
        $cart = Session::get("cart");

        $order = DB::table('orders')->where('id', $id)->first();
        if (!$order) {
            abort(404);
        }

        $orderId = $id;

        // Lấy chi tiết sản phẩm trong đơn hàng
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

        // Tính toán tổng tiền
        $subtotal = 0;
        foreach ($orderDetails as $item) {
            $subtotal += $item->price * $item->quantity;
        }

        return view('client.order-details', [
            'order' => $order,
            'orderDetails' => $orderDetails,
            'subtotal' => $subtotal,
            "cart" => $cart,
            "orderId" => $orderId,
        ]);
    }

    public function updateStatus(Request $request, $id) {
        $cart = Session::get("cart");
        $action = $request->input('action');

        $order = DB::table('orders')
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if (!$order) {
            return back()->with('error', 'Order not found.');
        }

        $newStatus = null;

        if ($action === 'cancel' && in_array($order->status, ['Pending', 'Confirmed'])) {
            $newStatus = 'Cancelled';

            $orderDetails = DB::table('order_details')
                ->where('order_id', $id)
                ->get();

            foreach ($orderDetails as $detail) {
                DB::table('product_variants')
                    ->where('id', $detail->product_variants_id)
                    ->increment('stock', $detail->quantity);
            }
        } elseif ($action === 'complete' && $order->status === 'Shipping') {
            $newStatus = 'Completed';
        }

        if ($newStatus) {
            DB::table('orders')
                ->where('id', $id)
                ->update([
                    'status' => $newStatus,
                ]);
            return back()->with('success', 'Order status update successful.');
        }

        return back()->with('error', 'Unable to update order status.');
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

    public function profileSetting(Request $request){
        if ($request->isMethod('post')) {
            $user = Auth::user();

            $request->validate([
                'fullName' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users,email,' . $user->id,
                'phone' => 'required|string|max:10',
                'address' => 'required|string|max:500',
                'profileImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            $dataUpdate = [
                'name' => $request->fullName,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
            ];

            if ($request->hasFile('profileImage')) {
                if ($user->avatar && file_exists(public_path('avatar_user/' . $user->avatar))) {
                    unlink(public_path('avatar_user/' . $user->avatar));
                }

                $image = $request->file('profileImage');
                $imageName = time() . '_' . $image->getClientOriginalName();

                $image->move(public_path('avatar_user'), $imageName);

                $dataUpdate['avatar'] = $imageName;
            }

            try {
                DB::table('users')
                    ->where('id', $user->id)
                    ->update($dataUpdate);

                return redirect()->route('profile.setting')->with('success', 'Profile updated successfully!');
            } catch (\Exception $e) {
                return redirect()->route('profile.setting')->with('error', 'Update failed: ' . $e->getMessage());
            }
        }

        return view("client.profile-settings", [
            'user' => Auth::user()
        ]);
    }

}

