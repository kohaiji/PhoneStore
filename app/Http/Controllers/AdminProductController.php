<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AdminProductController extends Controller
{
    public function getAll(): View
    {
        $data = "";
        $activeMenu = "product";

        // SELECT * FROM product
        $products = DB::table("products")
            ->join("brands", "products.brand_id", "=", "brands.id")
            ->select("products.*", "brands.brand_name")
            ->orderBy("products.id")
            ->paginate(10);


        return view("admin/product-list",
            [
                "products" => $products,
                "data" => $data,
                "activeMenu" => $activeMenu,
            ]);
    }

    public function delete($id){
        DB::table("products")
            ->where("id", $id)
            ->delete();

        return redirect("/admin/product-list");

    }

    public function add(){

        $activeMenu = "product";
        // lay list brand tu DB roi truyen ra view
        $brands = DB::table("brands")
            ->get();

        return view("admin/product-add",
            [
                "brands" => $brands,
                "activeMenu" => $activeMenu
            ]);
    }

    public function save(Request $request){
        $productName = $request->productName;
        $description = $request->description;
        $price = $request->price;
        $screenSize = $request->screenSize;
        $resolution = $request->resolution;
        $ram = $request->ram;
        $batteryCap = $request->batteryCap;
        $os = $request->os;
        $chipset = $request->chipset;
        $sim = $request->sim;
        $camera = $request->camera;
        $refreshRate = $request->refreshRate;
        $releaseDate = $request->releaseDate;
        $brandId = $request->brandId;


        $imageName = "";
        if($request->image != null){
            $imageName = $request->image->getClientOriginalName();

            // upload image to image_product
            $request->image->move(public_path("image_product"), $imageName);
        }

        if($productName == "" || $price == "" || $brandId == 0){
            return redirect("/admin/product-add");
        }
        else {
            DB::table("products")
                ->insert([
                    "brand_id" => $brandId,
                    "product_name" => $productName,
                    "description" => $description,
                    "price" => $price,
                    "screen_size" => $screenSize,
                    "resolution" => $resolution,
                    "ram" => $ram,
                    "battery_cap" => $batteryCap,
                    "os" => $os,
                    "chipset" => $chipset,
                    "sim" => $sim,
                    "camera" => $camera,
                    "refresh_rate" => $refreshRate,
                    "release_date" => $releaseDate
                ]);

            return redirect("/admin/product-list");
        }
    }

    public function edit($id){
        $activeMenu = "product";
        $brands = DB::table("brands")
            ->get();

        $products = DB::table("products")
            ->where("id", "=", $id)
            ->first();


        return view("admin/product-edit", [
            "products" => $products,
            "brands" => $brands,
            "activeMenu" => $activeMenu,
        ]);
    }

    public function update($id, Request $request){
        $productName = $request->productName;
        $description = $request->description;
        $price = $request->price;
        $screenSize = $request->screenSize;
        $resolution = $request->resolution;
        $ram = $request->ram;
        $batteryCap = $request->batteryCap;
        $os = $request->os;
        $chipset = $request->chipset;
        $sim = $request->sim;
        $camera = $request->camera;
        $refreshRate = $request->refreshRate;
        $releaseDate = $request->releaseDate;
        $brandId = $request->brandId;

        $imageName = "";
        if($request->image != null){
            $imageName = $request->image->getClientOriginalName();

            // upload image to image_product
            $request->image->move(public_path("image_product"), $imageName);
        }

        if($productName == "" || $price == "" || $brandId == 0) {
            return redirect("/admin/product-edit/$id");
        }
        else{
            DB::table("products")

                ->where("id", "=", $id)
                ->update([
                    "brand_id" => $brandId,
                    "product_name" => $productName,
                    "description" => $description,
                    "price" => $price,
                    "screen_size" => $screenSize,
                    "resolution" => $resolution,
                    "ram" => $ram,
                    "battery_cap" => $batteryCap,
                    "os" => $os,
                    "chipset" => $chipset,
                    "sim" => $sim,
                    "camera" => $camera,
                    "refresh_rate" => $refreshRate,
                    "release_date" => $releaseDate
                ]);
            return redirect("/admin/product-list");
        }

    }

    public function details($id){
        $activeMenu = "product";

        $products = DB::table("products")
            ->where("products.id", "=", $id)
            ->join("brands", "products.brand_id", "=", "brands.id")
            ->select("products.*", "brands.brand_name")
            ->first();


        return view("admin/product-details", [
            "activeMenu" => $activeMenu,
            "products" => $products,
        ]);
    }

    public function productSearch(Request $request): View
    {
        $activeMenu = "product";
        $data = $request->data;

        $products = DB::table("products")
            ->where("product_name", "LIKE", "%$data%")
            ->join("brands", "products.brand_id", "=", "brands.id")
            ->select("products.*", "brands.brand_name")
            ->orderBy("products.id")
            ->paginate(10)
            ->appends(['data' => $data]);

//        dd($products);

        return view("admin/product-list", [
            "products" => $products,
            "data" => $data,
            "activeMenu" => $activeMenu,
        ]);
    }

    public function variants($id){
        $activeMenu = "product";

        $productId = DB::table("products")
            ->where("products.id", "=", $id)
            ->join("product_variants as pv", "products.id", "=", "pv.product_id")
            ->select("products.product_name", "pv.*")
            ->first();

        $products = DB::table("products")
            ->where("products.id", "=", $id)
            ->join("product_variants as pv", "products.id", "=", "pv.product_id")
            ->select("products.product_name", "pv.*")
            ->paginate(10);

        if (!$productId || $products->isEmpty()) {
            return redirect("/admin/product-list")
                ->with("no_variant", true)
                ->with("product_id", $id);
        }

        return view("admin/product-variant", [
            "activeMenu" => $activeMenu,
            "products" => $products,
            "productId" => $productId
        ]);
    }

    public function variantDelete($id){
        DB::table("product_variants")
            ->where("id", $id)
            ->delete();

        return back();
    }

    public function variantEdit($id){
        $activeMenu = "product";

        $product_variants = DB::table("product_variants as pv")
            ->where("pv.id", "=", $id)
            ->join("products", "pv.product_id", "=", "products.id")
            ->select("products.product_name", "pv.*")
            ->first();


        return view("admin/product-variant-edit", [
            "product_variants" => $product_variants,
            "activeMenu" => $activeMenu,
        ]);
    }

    public function variantUpdate($id, Request $request){
        $color = $request->color;
        $storage = $request->storage;
        $priceAdjustment = $request->priceAdjustment;
        $stock = $request->stock;

        $oldId = DB::table("product_variants as pv")
            ->where("pv.id", "=", $id)
            ->join("products", "pv.product_id", "=", "products.id")
            ->select("products.id")
            ->first();

        if($color == "" || $storage == "" || $priceAdjustment == 0) {
            return redirect("/admin/product-variant-edit/$id");
        }
        else{
            DB::table("product_variants")
                ->where("id", "=", $id)
                ->update([
                    "color" => $color,
                    "storage" => $storage,
                    "price_adjustment" => $priceAdjustment,
                    "stock" => $stock,
                ]);

            return redirect("/admin/product-variant/$oldId->id");
        }
    }

    public function variantAdd($id){
        $activeMenu = "product";

        $products = DB::table("products")
            ->where("id", "=", $id)
            ->select("id", "product_name")
            ->first();

        return view("admin/product-variant-add",
            [
                "products" => $products,
                "activeMenu" => $activeMenu
            ]);
    }

    public function variantSave($id, Request $request){
        $color = $request->color;
        $storage = $request->storage;
        $price = $request->priceAdjustment;
        $stock = $request->stock;

        if($color == "" || $storage == "" || $price == 0){
            return redirect("/admin/product-add/{$id}");
        }
        else {
            DB::table("product_variants")
                ->insert([
                    "product_id" => $id,
                    "color" => $color,
                    "storage" => $storage,
                    "price_adjustment" => $price,
                    "stock" => $stock,
                ]);

            return redirect("/admin/product-variant/{$id}");
        }
    }

    public function images($id)
    {
        $activeMenu = "product";

        $productId = DB::table("products")
            ->where("products.id", "=", $id)
            ->join("product_images as pi", "products.id", "=", "pi.product_id")
            ->select("products.product_name", "pi.*")
            ->first();

        $products = DB::table("products")
            ->where("products.id", "=", $id)
            ->join("product_images as pi", "products.id", "=", "pi.product_id")
            ->select("products.product_name", "pi.*")
            ->paginate(10);

        if (!$productId || $products->isEmpty()) {
            return redirect(request()->input('return_url'))->with('no_image', true)->with('product_id', $id);
        }

        return view("admin/product-images", [
            "activeMenu" => $activeMenu,
            "products" => $products,
            "productId" => $productId
        ]);
    }

    public function imageDelete($id){
        DB::table("product_images")
            ->where("id", $id)
            ->delete();

        return back();
    }

    public function imageAdd($id){
        $activeMenu = "product";

        $products = DB::table("products")
            ->where("id", "=", $id)
            ->select("id", "product_name")
            ->first();

        return view("admin/product-image-add",
            [
                "products" => $products,
                "activeMenu" => $activeMenu
            ]);
    }

    public function imageSave($id, Request $request){
        if($request->imageUrl != null){
            $image = $request->imageUrl->getClientOriginalName();

            // upload image to image_product
            $request->imageUrl->move(public_path("image_product"), $image);

            DB::table("product_images")
                ->insert([
                    "product_id" => $id,
                    "image_url" => $image
                ]);
            return redirect("/admin/product-images/{$id}");
        }

        return redirect("/admin/product-images/{$id}");

    }
}
