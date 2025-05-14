<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
  public function index()
  {
    // get products from db
    $products = DB::table('products')
      ->select("id", "name_en", "name_ar", "price", "quantity", "code","status", "created_at")
      ->get();

    // pass the data to products view
    return view('backend.products.index', compact('products'));
  }
  public function create()
  {
    $brands=DB::table('brands')->get();
    $subcategories=DB::table('subcategories')->select("id","name_en")->where("status",1)->get();

    return view('backend.products.create',compact('brands',"subcategories"));
  }
  public function edit()
  {
    return view('backend.products.edit');
  }
  public function destroy() {}
  public function store(Request $request) {
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

    $request->validate($rules);




  }
}
