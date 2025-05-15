<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AdminPublisherController extends Controller
{
    public function getAll(): View
    {
        $activeMenu = "publisher";
        $data = "";
        $publisher = DB::table("publisher")
            ->orderBy("id")
            ->paginate(10);


        return view("admin/publisher-list",
            [
                "publisher" => $publisher,
                "data" => $data,
                "activeMenu" => $activeMenu,
            ]);
    }

    public function delete($id){
        DB::table("publisher")
            ->where("id", $id)
            ->delete();

        return redirect("/admin/publisher-list");

    }

    public function add(){
        $activeMenu = "publisher";
        return view("admin/publisher-add",
            [
                "activeMenu" => $activeMenu,
            ]);
    }

    public function save(Request $request){
        $publisher = DB::table("publisher")
            ->first();
        $publisherName = $request->publisherName;
//        $this->validate($request, [
//            'categoryName'=>'unique:category,categoryName',
//        ]);


        DB::table("publisher")
            ->insert([
                "publisher_name" => $publisherName
            ]);

        return redirect("/admin/publisher-list");

    }

    public function edit($id){
        $activeMenu = "publisher";
        $publisher = DB::table("publisher")
            ->where("id", "=", $id)
            ->first();

        return view("admin/publisher-edit", [
            "publisher" => $publisher,
            "activeMenu" => $activeMenu
        ]);
    }

    public function update($id, Request $request){
        $publisherName = $request->publisherName;
        if ($publisherName == ""){
            return redirect("/admin/publisher-edit/$id");
        }
        else{
            DB::table("publisher")
                ->where("id", "=", $id)
                ->update([
                    "publisher_name" => $publisherName,
                ]);
            return redirect("/admin/publisher-list");
        }
    }

    public function publisherSearch(Request $request): View
    {
        $activeMenu = "publisher";
        $data = $request->data;

        $publisher = DB::table("publisher")
            ->where("publisher_name", "LIKE", "%$data%")
            ->orderBy("id")
            ->paginate(10);

//        dd($products);

        return view("admin/publisher-list", [
            "publisher" => $publisher,
            "data" => $data,
            "activeMenu" => $activeMenu,
        ]);
    }
}
