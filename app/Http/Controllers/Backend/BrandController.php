<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Image;


class BrandController extends Controller
{
    public function BrandView()
    {
        $brands = Brand::latest()->get();
        return view('backend.brand.brand-view', compact('brands'));
    } // end BrandView

    function BrandStore(Request $request)
    {
        $request->validate(
            [
                'brand_name_en' => 'required',
                'brand_name_ar' => 'required',
                'brand_image' => 'required',
            ],
            [
                'brand_name_en.required' => 'Input Brand Name English',
                'brand_name_ar.required' => 'Input Brand Name Arabic',
                'brand_image.required' => 'Add Brand Image',
            ]
        );

        $image = $request->file('brand_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('upload/brand-images/' . $name_gen);
        $save_url = 'upload/brand-images/' . $name_gen;

        Brand::insert([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_ar' => $request->brand_name_ar,
            'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
            'brand_slug_ar' => str_replace(' ', '-', $request->brand_name_ar),
            'brand_image' => $save_url,
        ]);

        $notification = array(
            'message' => 'Brand Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end BrandStore

    public function BrandEdit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('backend.brand.brand-edit', compact('brand'));
    } // end BrandEdite

    function BrandUpdate(Request $request)
    {
        $brand_id = $request->id;
        $brand_old_image = $request->old_image;

        if ($request->file('brand_image')) {
            unlink($brand_old_image);
            $image = $request->file('brand_image');
            $name_gen = hexdec(uniqid() . '.' . $image->getClientOriginalExtension());
            Image::make($image)->resize(300, 300)->save('upload/brand-images/' . $name_gen);
            $save_url = 'upload/brand-images/' . $name_gen;

            Brand::findOrFail($brand_id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_ar' => $request->brand_name_ar,
                'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
                'brand_slug_ar' => str_replace(' ', '-', $request->brand_name_ar),
                'brand_image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Brand Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.brand')->with($notification);
        } // edn if
        else {
            Brand::findOrFail($brand_id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_ar' => $request->brand_name_ar,
                'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
                'brand_slug_ar' => str_replace(' ', '-', $request->brand_name_ar),
            ]);

            $notification = array(
                'message' => 'Brand Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.brand')->with($notification);
        } // end else
    } // end BrandUpdate

    public function BrandDelete($id){
        $brand = Brand::findOrFail($id);
        $brand_image = $brand->brand_image;
        unlink($brand_image);

        Brand::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Brand Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }
}
