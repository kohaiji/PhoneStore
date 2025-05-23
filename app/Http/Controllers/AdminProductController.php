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
}
