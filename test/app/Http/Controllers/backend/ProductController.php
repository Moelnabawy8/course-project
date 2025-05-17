<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\traits\media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    use media;

    public function index()
    {
        // جلب المنتجات من قاعدة البيانات
        $products = DB::table('products')
            ->select("id", "name_en", "name_ar", "price", "quantity", "code", "status", "created_at", "image")
            ->get();

        // إرسال البيانات إلى الـ View
        return view('backend.products.index', compact('products'));
    }


    public function create()
    {
        // جلب البراندات والتصنيفات الفرعية من قاعدة البيانات
        $brands = DB::table('brands')->get();
        $subcategories = DB::table('subcategories')
            ->select("id", "name_en")
            ->where("status", 1)
            ->get();

        // إرسال البيانات إلى الـ View
        return view('backend.products.create', compact('brands', "subcategories"));
    }


    public function edit($id)
    {
        $product = DB::table("products")->where("id", $id)->first();
        $brands = DB::table('brands')->get();
        $subcategories = DB::table('subcategories')
            ->select("id", "name_en")
            ->where("status", 1)
            ->get();

        return view('backend.products.edit', compact("product", "brands", "subcategories"));
    }


    public function destroy($id)
    {
        // نحاول نلاقي المنتج
        $product = DB::table('products')->where('id', $id)->first();
        // نحذف الصورة من السيرفر (لو موجودة)
        $imagePath = public_path("dist/img/products/{$product->image}");
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        // نحذف المنتج من قاعدة البيانات
        DB::table('products')->where('id', $id)->delete();
        return redirect()->route('products.index')->with("success", "تم حذف المنتج بنجاح");
    }



    public function store(StoreProductRequest $request)
    {


        
        $photo_name =$this->uploadPhoto($request->image ,"products");


        // تجهيز بيانات الإدخال بعد حذف الـ token واسم الصورة
        $data = $request->except("page", "_token", "image");
        $data["image"] = $photo_name;

        // إدخال البيانات في جدول المنتجات
        DB::table('products')->insert($data);

        // التوجيه حسب الزر اللي ضغط عليه المستخدم
        if ($request->page == "back") {
            return redirect()->back(); // ارجع لنفس الصفحة
        } else {
            return redirect()->route("products.index")->with("success", "successfully stored"); // روح لصفحة عرض المنتجات
        }
    }



    public function update(UpdateProductRequest $request, $id)
    {
        $data = $request->except(
            "_token",
            "method",
            "page",
            "image"
        );
        if ($request->has("image")) {
            # code...
            $old_photo_name = DB::table("products")->where("id", $id)->first()->image;
            $path = public_path("/dist/img/products/" . $old_photo_name);
            if (file_exists($path . $old_photo_name)) {
                # code...
                unlink($path . $old_photo_name);
            }

            // upload image
            // تجهيز اسم مميز للصورة
            $photo_name =$this->uploadPhoto($request->image ,"products");
            
            $data["image"] = $photo_name;
        }
        DB::table("products")->where("id", $id)->update($data);
        if ($request->page == "back") {
            return redirect()->back(); // ارجع لنفس الصفحة
        } else {
            return redirect()->route("products.index")->with("success", "تم تعديل المنتج بنجاح"); // روح لصفحة عرض المنتجات
        }
    }
}
