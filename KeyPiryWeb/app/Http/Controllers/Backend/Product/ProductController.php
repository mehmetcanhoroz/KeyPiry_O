<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ProductCreate;
use App\Http\Requests\Backend\ProductEdit;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(["category"])->get();
        return view("backend.product.index", compact("products"));
    }

    public function delete(Request $request)
    {
        DB::beginTransaction();
        try {
            $obj = Product::findOrFail($request->id);
            if ($obj->delete()) {
                Storage::disk("product")->delete($obj->image);
                DB::commit();
                return response()->json(["title" => "Başarılı!", "message" => "ürün başarıyla silindi!", "data" => $obj], 200);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(["title" => "Hata Oluştu!", "message" => "Ürün bulunamadı yada silinemez!", 'more' => $e->getMessage()], 500);
        }
    }

    public function create()
    {
        $categories = Category::with(["parent", "subcategories"])->where("parent", null)->get();
        return view("backend.product.create", compact("categories"));
    }

    public function createpost(ProductCreate $request)
    {
        DB::beginTransaction();
        try {
            $obj = new Product();

            $obj->name = $request->name;
            $obj->category_id = $request->category > 0 ? $request->category : null;

            $obj->description = $request->description;
            $obj->developer = $request->developer;
            $obj->publisher = $request->publisher;
            $obj->genre = $request->genre;
            $obj->release_date = $request->release_date;

            $obj->seo_title = $request->seo_title;
            $obj->seo_keywords = $request->seo_keywords;
            $obj->seo_description = $request->seo_description;
            $obj->description = $request->description;
            $obj->status = $request->has('status') ? true : false;

            $file = null;
            if ($request->file("image") != null) {
                $uniq = uniqid() . "_";
                $file_name = $uniq . $request->file("image")->getClientOriginalName();
                $file = Storage::disk("product")->putFileAs("", $request->file("image"), $file_name);
                $obj->image = $file_name;
            }

            if ($obj->save()) {
                DB::commit();
                return response()->json(["title" => "Başarılı!", "message" => "Ürün başarıyla eklendi!", "data" => $obj], 200);
            }
        } catch (\Exception $e) {

            DB::rollBack();
            return response()->json(["title" => "Hata Oluştu!", "message" => "Ürün eklenemedi!", 'more' => $e->getMessage()], 500);
        }
    }

    public function edit(Request $request)
    {
        try {
            $obj = Product::findOrFail($request->id);
            $categories = Category::all();
            return view("backend.product.edit", compact("obj", "categories"));
        } catch (\Exception $e) {
            abort(404);
            return response()->json(["title" => "Hata Oluştu!", "message" => "Ürün bulunamadı!", 'more' => $e->getMessage()], 500);
        }
    }

    public function editpost(ProductEdit $request)
    {
        DB::beginTransaction();
        try {
            $obj = Product::findOrFail($request->id);

            $obj->name = $request->name;
            $obj->category_id = $request->category > 0 ? $request->category : null;

            $obj->description = $request->description;
            $obj->developer = $request->developer;
            $obj->publisher = $request->publisher;
            $obj->genre = $request->genre;
            $obj->release_date = $request->release_date;

            $obj->seo_title = $request->seo_title;
            $obj->seo_keywords = $request->seo_keywords;
            $obj->seo_description = $request->seo_description;
            $obj->description = $request->description;
            $obj->status = $request->has('status') ? true : false;

            $file = null;
            if ($request->file("image") != null) {
                $uniq = uniqid() . "_";
                $file_name = $uniq . $request->file("image")->getClientOriginalName();
                $file = Storage::disk("product")->putFileAs("", $request->file("image"), $file_name);
                $obj->image = $file_name;
            }

            if ($obj->save()) {
                DB::commit();
                return response()->json(["title" => "Başarılı!", "message" => "Ürün başarıyla güncellendi!", "data" => $obj], 200);
            }
        } catch (\Exception $e) {

            DB::rollBack();
            return response()->json(["title" => "Hata Oluştu!", "message" => "Ürün Güncellenemedi!", 'more' => $e->getMessage()], 500);
        }
    }
}
