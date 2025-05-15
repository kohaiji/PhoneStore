<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AdminCategoryController extends Controller
{
    public function getAll(): View
    {
        $activeMenu = "category";
        $data = "";
        $categories = DB::table("category")
            ->orderBy("id")
            ->paginate(10);


        return view("admin/category-list",
            [
                "categories" => $categories,
                "data" => $data,
                "activeMenu" => $activeMenu,
            ]);
    }

    public function delete($id){
        DB::table("category")
            ->where("id", $id)
            ->delete();

        return redirect("/admin/category-list");

    }

    public function add(){
        $activeMenu = "category";
        return view("admin/category-add",
            [
                "activeMenu" => $activeMenu,
            ]);
    }

    public function save(Request $request){
        $categories = DB::table("category")
            ->first();
        $categoryName = $request->categoryName;
//        $this->validate($request, [
//            'categoryName'=>'unique:category,categoryName',
//        ]);


        DB::table("category")
            ->insert([
                "category_name" => $categoryName
            ]);

        return redirect("/admin/category-list");

    }

    public function edit($id){
        $activeMenu = "category";
        $category = DB::table("category")
            ->where("id", "=", $id)
            ->first();

        return view("admin/category-edit", [
            "category" => $category,
            "activeMenu" => $activeMenu
        ]);
    }

    public function update($id, Request $request){
        $categoryName = $request->categoryName;
        if ($categoryName == ""){
            return redirect("/admin/category-edit/$id");
        }
        else{
            DB::table("category")
                ->where("id", "=", $id)
                ->update([
                    "category_name" => $categoryName,
                ]);
            return redirect("/admin/category-list");
        }
    }

    public function categorySearch(Request $request): View
    {
        $activeMenu = "category";
        $data = $request->data;

        $categories = DB::table("category")
            ->where("category_name", "LIKE", "%$data%")
            ->orderBy("id")
            ->paginate(10);

//        dd($products);

        return view("admin/category-list", [
            "categories" => $categories,
            "data" => $data,
            "activeMenu" => $activeMenu,
        ]);
    }
}
