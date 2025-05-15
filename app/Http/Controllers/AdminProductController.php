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
        // ON product.category_id = category.id
        $products = DB::table("product")
            ->join("category", "product.category_id", "=", "category.id")
            ->join("publisher", "product.publisher_id", "=", "publisher.id")
            ->join("author", "product.author_id", "=", "author.id")
            ->select("product.*", "category.category_name", "publisher.publisher_name", "author.author_name")
            ->orderBy("id")
            ->paginate(10);


        return view("admin/product-list",
            [
                "products" => $products,
                "data" => $data,
                "activeMenu" => $activeMenu,
            ]);
    }

    public function delete($id){
        DB::table("product")
            ->where("id", $id)
            ->delete();

        return redirect("/admin/product-list");

    }

    public function add(){

        $activeMenu = "product";
        // lay list category tu DB roi truyen ra view
        $categories = DB::table("category")
            ->get();
        $publisher = DB::table("publisher")
            ->get();
        $author = DB::table("author")
            ->get();

        return view("admin/product-add",
            [
                "categories" => $categories,
                "activeMenu" => $activeMenu,
                "publisher" => $publisher,
                "author" => $author,
            ]);
    }

    public function save(Request $request){
        $productName = $request->productName;
        $price = $request->price;
        $description = $request->description;
        $stock = $request->stock;
        $isbn = $request->isbn;
        $categoryId = $request->categoryId;
        $publisherId = $request->publisherId;
        $authorId = $request->authorId;

        $imageName = "";
        if($request->image != null){
            $imageName = $request->image->getClientOriginalName();

            // upload image to image_product
            $request->image->move(public_path("image_product"), $imageName);
        }

        if($productName == "" || $price == "" || $categoryId == 0 || $publisherId == 0 || $authorId == 0){
            return redirect("/admin/product-add");
        }
        else {
            DB::table("product")
                ->insert([
                    "product_name" => $productName,
                    "price" => $price,
                    "description" => $description,
                    "image" => $imageName,
                    "stock" => $stock,
                    "isbn_code" => $isbn,
                    "category_id" => $categoryId,
                    "publisher_id" => $publisherId,
                    "author_id" => $authorId
                ]);

            return redirect("/admin/product-list");
        }
    }

    public function edit($id){
        $activeMenu = "product";
        $category = DB::table("category")
            ->get();
        $publisher = DB::table("publisher")
            ->get();
        $author = DB::table("author")
            ->get();

        $product = DB::table("product")
            ->where("id", "=", $id)
            ->first();


        return view("admin/product-edit", [
            "product" => $product,
            "category" => $category,
            "activeMenu" => $activeMenu,
            "publisher" => $publisher,
            "author" => $author,
        ]);
    }

    public function update($id, Request $request){
        $productName = $request->productName;
        $price = $request->price;
        $description = $request->description;
        $stock = $request->stock;
        $isbn = $request->isbn;
        $categoryId = $request->categoryId;
        $publisherId = $request->publisherId;
        $authorId = $request->authorId;

        $imageName = "";
        if($request->image != null){
            $imageName = $request->image->getClientOriginalName();

            // upload image to image_product
            $request->image->move(public_path("image_product"), $imageName);
        }

        if($productName == "" || $price == "" || $categoryId == 0 || $publisherId == 0 || $authorId == 0) {
            return redirect("/admin/product-edit/$id");
        }
        else{
            DB::table("product")

                ->where("id", "=", $id)
                ->update([
                    "product_name" => $productName,
                    "price" => $price,
                    "description" => $description,
                    "image" => $imageName,
                    "stock" => $stock,
                    "isbn_code" => $isbn,
                    "category_id" => $categoryId,
                    "publisher_id" => $publisherId,
                    "author_id" => $authorId
                ]);
            return redirect("/admin/product-list");
        }

    }

    public function details($id){
        $activeMenu = "product";
//        $category = DB::table("category")
//            ->get();
//        $publisher = DB::table("publisher")
//            ->get();
//        $author = DB::table("author")
//            ->get();

        $product = DB::table("product")
            ->where("product.id", "=", $id)
            ->join("category", "product.category_id", "=", "category.id")
            ->join("publisher", "product.publisher_id", "=", "publisher.id")
            ->join("author", "product.author_id", "=", "author.id")
            ->select("product.*", "category.category_name", "publisher.publisher_name", "author.author_name")
            ->first();


        return view("admin/product-details", [
            "activeMenu" => $activeMenu,
            "product" => $product,
//            "category" => $category,
//            "publisher" => $publisher,
//            "author" => $author,
        ]);
    }

    public function productSearch(Request $request): View
    {
        $activeMenu = "product";
        $data = $request->data;

        $products = DB::table("product")
            ->where("product_name", "LIKE", "%$data%")
            ->join("category", "product.category_id", "=", "category.id")
            ->join("publisher", "product.publisher_id", "=", "publisher.id")
            ->join("author", "product.author_id", "=", "author.id")
            ->select("product.*", "category.category_name", "publisher.publisher_name", "author.author_name")
            ->orderBy("id")
            ->paginate(10);


//        dd($products);

        return view("admin/product-list", [
            "products" => $products,
            "data" => $data,
            "activeMenu" => $activeMenu,
        ]);
    }
}
