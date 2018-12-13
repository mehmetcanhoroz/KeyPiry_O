<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Requests\Backend\ProductCreate;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

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
                $file = Storage::disk("product")->putFileAs("", $request->file("image"), $request->file("image")->getClientOriginalName());
                $obj->image = $request->file("image")->getClientOriginalName();
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
}
