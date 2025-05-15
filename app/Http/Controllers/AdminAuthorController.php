<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AdminAuthorController extends Controller
{
    public function getAll(): View
    {
        $activeMenu = "author";
        $data = "";
        $author = DB::table("author")
            ->orderBy("id")
            ->paginate(10);


        return view("admin/author-list",
            [
                "author" => $author,
                "data" => $data,
                "activeMenu" => $activeMenu,
            ]);
    }

    public function delete($id){
        DB::table("author")
            ->where("id", $id)
            ->delete();

        return redirect("/admin/author-list");

    }

    public function add(){
        $activeMenu = "author";
        return view("admin/author-add",
            [
                "activeMenu" => $activeMenu,
            ]);
    }

    public function save(Request $request){
        $author = DB::table("author")
            ->first();
        $authorName = $request->authorName;
//        $this->validate($request, [
//            'categoryName'=>'unique:category,categoryName',
//        ]);


        DB::table("author")
            ->insert([
                "author_name" => $authorName
            ]);

        return redirect("/admin/author-list");

    }

    public function edit($id){
        $activeMenu = "author";
        $author = DB::table("author")
            ->where("id", "=", $id)
            ->first();

        return view("admin/author-edit", [
            "author" => $author,
            "activeMenu" => $activeMenu
        ]);
    }

    public function update($id, Request $request){
        $authorName = $request->authorName;
        if ($authorName == ""){
            return redirect("/admin/author-edit/$id");
        }
        else{
            DB::table("author")
                ->where("id", "=", $id)
                ->update([
                    "author_name" => $authorName,
                ]);
            return redirect("/admin/author-list");
        }
    }

    public function authorSearch(Request $request): View
    {
        $activeMenu = "author";
        $data = $request->data;

        $author = DB::table("author")
            ->where("author_name", "LIKE", "%$data%")
            ->orderBy("id")
            ->paginate(10);

//        dd($products);

        return view("admin/author-list", [
            "author" => $author,
            "data" => $data,
            "activeMenu" => $activeMenu,
        ]);
    }
}
