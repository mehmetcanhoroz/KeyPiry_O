<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Requests\Backend\CategoryCreate;
use App\Http\Requests\Backend\CategoryEdit;
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
            return response()->json(["title" => "Hata Oluştu!", "message" => "ürün bulunamadı yada silinemez!", 'more' => $e->getMessage()], 500);
        }
    }
}
