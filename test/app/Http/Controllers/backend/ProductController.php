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
        $products = DB::table('products')
            ->select("id", "name_en", "name_ar", "price", "quantity", "code", "status", "created_at", "image")
            ->get();

        return view('backend.products.index', compact('products'));
    }

    public function create()
    {
        $brands = DB::table('brands')->get();
        $subcategories = DB::table('subcategories')
            ->select("id", "name_en")
            ->where("status", 1)
            ->get();

        return view('backend.products.create', compact('brands', "subcategories"));
    }

    public function store(StoreProductRequest $request)
    {
        $photo_name = $this->uploadPhoto($request->image, "products");

        $data = $request->except("page", "_token", "image");
        $data["image"] = $photo_name;

        DB::table('products')->insert($data);

        if ($request->page == "back") {
            return redirect()->back()->with('success', 'تم حفظ المنتج بنجاح');
        } else {
            return redirect()->route("products.index")->with("success", "تم حفظ المنتج بنجاح");
        }
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

    public function update(UpdateProductRequest $request, $id)
    {
        $data = $request->except("_token", "_method", "page", "image");

        if ($request->has('image')) {
            $oldName = DB::table('products')->where('id', $id)->value('image');
            $this->deletePhoto(public_path("dist/img/products/{$oldName}"));

            $data["image"] = $this->uploadPhoto($request->image, "products");
        }

        DB::table("products")->where("id", $id)->update($data);

        if ($request->page == "back") {
            return redirect()->back()->with("success", "تم تعديل المنتج بنجاح");
        } else {
            return redirect()->route("products.index")->with("success", "تم تعديل المنتج بنجاح");
        }
    }

    public function destroy($id)
    {
        $product = DB::table('products')->where('id', $id)->first();

        if (!$product) {
            return redirect()->back()->with('error', 'المنتج غير موجود');
        }

        $imagePath = public_path("dist/img/products/{$product->image}");
        $this->deletePhoto($imagePath);

        DB::table('products')->where('id', $id)->delete();

        return redirect()->route('products.index')->with("success", "تم حذف المنتج بنجاح");
    }
}
