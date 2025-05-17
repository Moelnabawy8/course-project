<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    
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
        return redirect()->route('products.index');
    }
    


    public function store(Request $request)
    {
        // قواعد التحقق من البيانات
        $rules = [
            "name_en" => ["required", "string", "max:255", "min:15"],
            "name_ar" => ["required", "string", "max:255", "min:15"],
            "price" => ["required", "numeric", "max:99999.99", "min:1"],
            "desc_en" => ["required", "string"],
            "desc_ar" => ["required", "string"],
            "code" => ["required", "integer", "unique:products"],
            "image" => ["required", "max:1000", "mimes:png,jpg,jpeg"],
            "subcategory_id" => ["required", "exists:subcategories,id", "integer"],
            "brand_id" => ["required", "integer", "exists:brands,id"],
            "status" => ["required", "integer", "between:0,1"],
            "quantity" => ["nullable", "integer", "max:999", "min:1"],
        ];
        // تنفيذ التحقق
        $request->validate($rules);
        // تجهيز اسم مميز للصورة
        $photo_name = uniqid() . "." . $request->image->extension();
        // رفع الصورة في مجلد public/dist/products
        $request->image->move(public_path("/dist/img/products"), $photo_name);
        // تجهيز بيانات الإدخال بعد حذف الـ token واسم الصورة
        $data = $request->except("page", "_token", "image");
        $data["image"] = $photo_name;

        // إدخال البيانات في جدول المنتجات
        DB::table('products')->insert($data);

        // التوجيه حسب الزر اللي ضغط عليه المستخدم
        if ($request->page == "back") {
            return redirect()->back(); // ارجع لنفس الصفحة
        } else {
            return redirect()->route("products.index"); // روح لصفحة عرض المنتجات
        }
    }



    public function update(Request $request, $id)
    {
        $rules = [
            "name_en" => ["required", "string", "max:255", "min:15"],
            "name_ar" => ["required", "string", "max:255", "min:15"],
            "price" => ["required", "numeric", "max:99999.99", "min:1"],
            "desc_en" => ["required", "string"],
            "desc_ar" => ["required", "string"],
            "code" => ["required", "integer"],
            "image" => ["nullable", "max:1000", "mimes:png,jpg,jpeg"],
            "subcategory_id" => ["required", "exists:subcategories,id", "integer"],
            "brand_id" => ["required", "integer", "exists:brands,id"],
            "status" => ["required", "integer", "between:0,1"],
            "quantity" => ["nullable", "integer", "max:999", "min:1"],
        ];

        $request->validate($rules);
        $data = $request->except(
            "_token",
            "method",
            "page",
            "image"
        );
        if ($request->has("image")) {
            # code...
            // تجهيز اسم مميز للصورة
            $photo_name = uniqid() . "." . $request->image->extension();

            // رفع الصورة في مجلد public/dist/products
            $request->image->move(public_path("/dist/img/products"), $photo_name);
            $data["image"] = $photo_name;
        }
        DB::table("products")->where("id", $id)->update($data);
        if ($request->page == "back") {
            return redirect()->back(); // ارجع لنفس الصفحة
        } else {
            return redirect()->route("products.index"); // روح لصفحة عرض المنتجات
        }
    }


}
