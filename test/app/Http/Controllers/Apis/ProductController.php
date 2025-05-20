<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
     public function index(){
        $products=Product::all();
        return response()->json(compact("products"));
    }
    public function create(){
        $brands=Brand::all();
        $subcategories=Subcategory::select("id","name_en")->get();
        return response()->json(compact("brands","subcategories"));
    }
    public function edit($id){
       // $products=Product::where("id",$id)->first();
        $brands=Brand::all();
        $subcategories=Subcategory::select("id","name_en")->get();
        $products=Product::find($id);
        return response()->json(compact("products","brands","subcategories"));
       

    }
    //
}
