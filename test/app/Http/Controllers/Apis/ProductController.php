<?php

namespace App\Http\Controllers\Apis;

use App\Models\Brand;
use App\Models\Product;
use App\Http\traits\Media;          // Trait لرفع / حذف الصور
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    use Media;                      // دمج الدوال uploadPhoto / deletePhoto

    /*--------------------------------------------------
    | GET /api/products        –  إرجاع كل المنتجات
    --------------------------------------------------*/
    public function index()
    {
        $products = Product::all();                 // جلب كل المنتجات
        return response()->json(compact('products'));// تحويلها إلى JSON
    }

    /*--------------------------------------------------
    | GET /api/products/create –  بيانات فورم الإضافة
    --------------------------------------------------*/
    public function create()
    {
        // نجلب الماركات والتصنيفات الفرعية لإرسالها للـ Frontend
        $brands        = Brand::all();
        $subcategories = Subcategory::select('id', 'name_en')->get();

        return response()->json(compact('brands', 'subcategories'));
    }

    /*--------------------------------------------------
    | GET /api/products/{id}/edit – بيانات منتج للتعديل
    --------------------------------------------------*/
    public function edit($id)
    {
        $brands        = Brand::all();
        $subcategories = Subcategory::select('id', 'name_en')->get();
        $product       = Product::find($id); // المنتج المطلوب

        return response()->json(compact('product', 'brands', 'subcategories'));
    }

    /*--------------------------------------------------
    | POST /api/products       –  تخزين منتج جديد
    --------------------------------------------------*/
    public function store(StoreProductRequest $request)
    {
        // 1) رفع الصورة إلى مجلد /uploads/products
        $photoName = $this->uploadPhoto($request->file('image'), 'products');

        // 2) تجهيز الـ data بعد استبعاد الصورة
        $data            = $request->except('image');
        $data['image']   = $photoName;             // إضافة اسم الصورة

        // 3) إنشاء المنتج
        Product::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Product created successfully'
        ], 201);
    }

    /*--------------------------------------------------
    | PUT /api/products/{id}   –  تحديث منتج
    --------------------------------------------------*/
    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::find($id);             // جلب المنتج

        if (!$product)                             // لو مش موجود
            return response()->json([
                'success' => false,
                'message' => 'Product not found'
            ], 404);

        $data = $request->except('image');         // كل الحقول عدا الصورة

        // لو المستخدم أرسل صورة جديدة
        if ($request->hasFile('image')) {
            // حذف القديمة من الـ disk
            $this->deletePhoto(public_path("dist/img/products/{$product->image}"));

            // رفع الصورة الجديدة وتخزين اسمها
            $data['image'] = $this->uploadPhoto($request->file('image'), 'products');
        }

        $product->update($data);                   // تحديث القيم في DB

        return response()->json([
            'success' => true,
            'message' => 'Product updated successfully'
        ]);
    }

    /*--------------------------------------------------
    | DELETE /api/products/{id} – حذف منتج
    --------------------------------------------------*/
    public function destroy($id)
    {
        $product = Product::find($id);             // المنتج
        if (!$product)
            return response()->json(['message'=>'Not found'],404);

        // حذف صورة المنتج من الـ disk
        $this->deletePhoto(public_path("dist/img/products/{$product->image}"));

        // حذف السجل من قاعدة البيانات
        $product->delete();

        return response()->json([
            'success' => true,
            'message' => 'Product deleted successfully'
        ], 204);
    }
}
