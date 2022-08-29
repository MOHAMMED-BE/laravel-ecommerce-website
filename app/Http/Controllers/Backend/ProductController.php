<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Product;

class ProductController extends Controller
{
    public function GetSubSubCategory($subcategory_id)
    {
        $subsubcategory = SubSubCategory::where('subcategory_id', $subcategory_id)->orderBy('subsubcategory_name_en', 'asc')->get();

        return json_encode($subsubcategory);
    } // end GetSubSubCategory

    public function AddProduct()
    {
        $brand  = Brand::latest()->get();
        $category = Category::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $subsubcategory = SubSubCategory::latest()->get();

        return view('backend.product.product-add',compact('brand', 'category','subcategory','subsubcategory'));
    }
}
