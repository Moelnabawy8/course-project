<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    // عرض المنتجات
    public function index()
    {
        // جلب المنتجات من قاعدة البيانات
        $products = DB::table('products')
            ->select("id", "name_en", "name_ar", "price", "quantity", "code", "status", "created_at")
            ->get();

        // إرسال البيانات إلى الـ View
        return view('backend.products.index', compact('products'));
    }

    // عرض صفحة إنشاء منتج جديد
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

    // صفحة تعديل المنتج (مش معمولة لسه)
    public function edit($id)
    {
        $product=DB::table("products")->where("id",$id)->first();
         $brands = DB::table('brands')->get();
        $subcategories = DB::table('subcategories')
            ->select("id", "name_en")
            ->where("status", 1)
            ->get();

        return view('backend.products.edit',compact("product","brands","subcategories"));
    }

    public function destroy($id)
{
    // نحاول نلاقي المنتج
    $product = DB::table('products')->where('id', $id)->first();

    // لو المنتج مش موجود، رجّع خطأ
    if (!$product) {
        return redirect()->back()->with('error', 'المنتج غير موجود');
    }

    // نحذف الصورة من السيرفر (لو موجودة)
    $imagePath = public_path("dist/img/products/{$product->image}");
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }

    // نحذف المنتج من قاعدة البيانات
    DB::table('products')->where('id', $id)->delete();

    return redirect()->route('products.index')->with('success', 'تم حذف المنتج بنجاح');
}

    // تخزين بيانات المنتج الجديد
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
    public function update(Request $request , $id){
        dd($request->all());
    }
}
