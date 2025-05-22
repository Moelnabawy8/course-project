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
use App\Http\traits\ApiTrait;

class ProductController extends Controller
{
    use Media,ApiTrait;                      // دمج الدوال uploadPhoto / deletePhoto

    /*--------------------------------------------------
    | GET /api/products        –  إرجاع كل المنتجات
    --------------------------------------------------*/
    public function index()
    {
        $products = Product::all();                 // جلب كل المنتجات
        return $this->Data(compact("products"),"all products",200);// تحويلها إلى JSON
    }

    /*--------------------------------------------------
    | GET /api/products/create –  بيانات فورم الإضافة
    --------------------------------------------------*/
    public function create()
    {
        // نجلب الماركات والتصنيفات الفرعية لإرسالها للـ Frontend
        $brands        = Brand::all();
        $subcategories = Subcategory::select('id', 'name_en')->get();

        return $this->Data(compact("brands","subcategories"),"create Product",200);
    }

    /*--------------------------------------------------
    | GET /api/products/{id}/edit – بيانات منتج للتعديل
    --------------------------------------------------*/
    public function edit($id)
    {
        $brands        = Brand::all();
        $subcategories = Subcategory::select('id', 'name_en')->get();
        $product       = Product::find($id); // المنتج المطلوب

        return $this->Data(compact("brands","subcategories","product"),"Edit Product",200);
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

        return $this->SuccessMessage("product created successfully",201);
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

        $data = $request->except('image',"_method");         // كل الحقول عدا الصورة

        // لو المستخدم أرسل صورة جديدة
        if ($request->hasFile('image')) {
            // حذف القديمة من الـ disk
            $this->deletePhoto(public_path("dist/img/products/{$product->image}"));

            // رفع الصورة الجديدة وتخزين اسمها
            $data['image'] = $this->uploadPhoto($request->file('image'), 'products');
        }

        $product->update($data);                   // تحديث القيم في DB

        return $this->SuccessMessage("product updated successfully",200);
    }

    /*--------------------------------------------------
    | DELETE /api/products/{id} – حذف منتج
    --------------------------------------------------*/
    public function destroy($id)
    {
        $product = Product::find($id);             // المنتج
        if (!$product)
            return $this->ErrorMessage([],"product not found",422);

        // حذف صورة المنتج من الـ disk
        $this->deletePhoto(public_path("dist/img/products/{$product->image}"));

        // حذف السجل من قاعدة البيانات
        $product->delete();

        return $this->SuccessMessage("Product deleted Successfully",200);
    }
}
