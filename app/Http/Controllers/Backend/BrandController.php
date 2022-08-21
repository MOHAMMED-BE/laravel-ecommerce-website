<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Image;


class BrandController extends Controller
{
    public function BrandView(){
        $brands = Brand::latest()->get();
        return view('backend.brand.brand-view',compact('brands'));
    } // end BrandView

    function BrandStore(Request $request){
        $request->validate([
            'brand_name_en' => 'required',
            'brand_name_ar' => 'required',
            'brand_image' => 'required',
        ],
    [
        'brand_name_en.required' => 'Input Brand Name English',
        'brand_name_ar.required' => 'Input Brand Name Arabic',
        'brand_image.required' => 'Add Brand Image',
    ]);

    $image = $request->file('brand_image');
    $name_gen = hexdec(uniqid().'.'.$image->getClientOriginalExtension());
    Image::make($image)->resize(300,300)->save('upload/brand-images/'.$name_gen);
    $save_url = 'upload/brand-images/'.$name_gen;

    Brand::insert([
        'brand_name_en' => $request->brand_name_en,
        'brand_name_ar' => $request->brand_name_ar,
        'brand_slug_en' => strtolower(str_replace(' ','-',$request->brand_name_en)),
        'brand_slug_ar' => str_replace(' ','-',$request->brand_name_ar),
        'brand_image' => $save_url,
    ]);

    $notification = array(
        'message' => 'Brand Inserted Successfully',
        'alert-type' => 'success'
    );
    
    return redirect()->back()->with($notification);
    } // end BrandStore

    public function BrandEdit($id){
        
    }
}
