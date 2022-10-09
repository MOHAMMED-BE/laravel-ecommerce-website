<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function ShopPage()
    {
        $categories = Category::orderBy('category_name_en','asc')->get();
        $products = Product::query();

        if(!empty($_GET['category'])){
            $slugs = explode(',',$_GET['category']);
            $category_id = Category::select('id')->whereIn('category_slug_en',$slugs)->pluck('id')->toArray();
            $products  = $products->whereIn('category_id',$category_id)->paginate(6);
        }

        elseif(!empty($_GET['brand'])){
            $slugs = explode(',',$_GET['brand']);
            $brand_id = Brand::select('id')->whereIn('brand_slug_en',$slugs)->pluck('id')->toArray();
            $products  = $products->whereIn('brand_id',$brand_id)->paginate(6);
        }

        else{
            $products  = Product::where('status',1)->orderBy('id','desc')->paginate(6);
        }
        
        return view('frontend.shop.shop-page',compact('categories','products'));
        
        
    } // end ShopPage

    public function ShopFilter(Request $request)
    {
        
        $data = $request->all();

        $category_url = "" ;

        if(!empty($data['category'])){
            foreach($data['category'] as $category){
                if(empty($category_url)){
                    $category_url .= '&category=' . $category;
                }
                else{
                    $category_url .= ',' .$category;
                }
            } 
        }

        $brand_url = "" ;

        if(!empty($data['brand'])){
            foreach($data['brand'] as $brand){
                if(empty($brand_url)){
                    $brand_url .= '&brand=' . $brand;
                }
                else{
                    $brand_url .= ',' .$brand;
                }
            } 
        }

        return redirect()->route('shop.page',$category_url.$brand_url);
        
        
    } // end ShopFilter
}
