<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AdminBrandController extends Controller
{
    public function getAll(): View
    {
        $activeMenu = "category";
        $data = "";
        $brands = DB::table("brands")
            ->orderBy("id")
            ->paginate(10);


        return view("admin/brand-list",
            [
                "brands" => $brands,
                "data" => $data,
                "activeMenu" => $activeMenu,
            ]);
    }

    public function delete($id){
        DB::table("brands")
            ->where("id", $id)
            ->delete();

        return redirect("/admin/brand-list");

    }

    public function add(){
        $activeMenu = "category";
        return view("admin/brand-add",
            [
                "activeMenu" => $activeMenu,
            ]);
    }

    public function save(Request $request){
//        $categories = DB::table("category")
//            ->first();
        $brandName = $request->brandName;
//        $this->validate($request, [
//            'categoryName'=>'unique:category,categoryName',
//        ]);
        $logo = null;
        if($request->logo != null){
            $logo = $request->logo->getClientOriginalName();

            // upload image to image_product
            $request->logo->move(public_path("brand_logo"), $logo);
        }


        DB::table("brands")
            ->insert([
                "brand_name" => $brandName,
                "logo_url" => $logo
            ]);

        return redirect("/admin/brand-list");

    }

    public function edit($id){
        $activeMenu = "category";
        $brands = DB::table("brands")
            ->where("id", "=", $id)
            ->first();

        return view("admin/brand-edit", [
            "brands" => $brands,
            "activeMenu" => $activeMenu
        ]);
    }

    public function update($id, Request $request){
        $brandName= $request->brandName;
        $logo = $request->oldLogo;
        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $logo = $file->getClientOriginalName();
            $file->move(public_path("brand_logo"), $logo);
        }
        if ($brandName == ""){
            return redirect("/admin/brand-edit/$id");
        }
        else{
            DB::table("brands")
                ->where("id", "=", $id)
                ->update([
                    "brand_name" => $brandName,
                    "logo_url" => $logo
                ]);
            return redirect("/admin/brand-list");
        }
    }

    public function brandSearch(Request $request): View
    {
        $activeMenu = "category";
        $data = trim($request->data);

        $query = DB::table("brands");

        if (!empty($data)) {
            $keywords = explode(' ', $data);
            foreach ($keywords as $word) {
                $query->where("brand_name", "LIKE", "%$word%");
            }
        }

        $brands = $query
            ->orderBy("id")
            ->paginate(10)
            ->appends(['data' => $data]);

        return view("admin/brand-list", [
            "brands" => $brands,
            "data" => $data,
            "activeMenu" => $activeMenu,
        ]);
    }
}
