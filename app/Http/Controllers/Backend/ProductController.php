<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Product;
use App\Models\MultiImg;
use Carbon\Carbon;
use Image;

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

        return view('backend.product.product-add', compact('brand', 'category', 'subcategory', 'subsubcategory'));
    }

    public function ProductStore(Request $request)
    {

        $request->validate([
            'file' => 'mimes:jpeg,png,jpg,zip,pdf,xlsx,doc,csv|max:2048',
        ]);

        $digitalitem = "";

        if($files = $request->file('file')){
            $filePath = 'upload/files';
            $digitalitem = date('YmdHis') . '.' . $files->getClientOriginalExtension();
            $files->move($filePath,$digitalitem);

            $digitalitem = $digitalitem;
        }
        else{
            $digitalitem = NULL;
        }


        $image = $request->file('product_thumbnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->save('upload/products/thumbnail/'.$name_gen);
        $save_url = 'upload/products/thumbnail/'.$name_gen;

        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,

            'product_name_en' => $request->product_name_en,
            'product_name_ar' => $request->product_name_ar,
            'product_slug_en' => strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_ar' => str_replace(' ', '-', $request->product_name_ar),
            'product_code' => $request->product_code,
            'product_quantity' => $request->product_quantity,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_ar' => $request->product_tags_ar,
            'product_size_en' => $request->product_size_en,
            'product_size_ar' => $request->product_size_ar,
            'product_color_en' => $request->product_color_en,
            'product_color_ar' => $request->product_color_ar,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_desc_en' => $request->short_desc_en,
            'short_desc_ar' => $request->short_desc_ar,
            'long_desc_en' => $request->long_desc_en,
            'long_desc_ar' => $request->long_desc_ar,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,

            'product_thumbnail' => $save_url,
            'status' => 1,
            'digital_file' => $digitalitem,
            'created_at' => Carbon::now(),

        ]);

        // Multiple Image Upload Start

        $images = $request->file('multi_img');

        foreach ($images as $img) {
            $make_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('upload/products/multi-images/'.$make_name);
            $upload_path = 'upload/products/multi-images/'.$make_name;

            MultiImg::insert([
                'product_id' => $product_id,
                'photo_name' => $upload_path,
                'created_at' => Carbon::now(),

            ]);
        }

        // Multiple Image Upload end

        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('menage-product')->with($notification);
    } // end ProductStore

    public function MenageProduct()
    {
        $product = Product::latest()->get();

        return view('backend/product/product-view', compact('product'));
    } // end MenageProduct

    public function ProductEdit($id)
    {
        $multiImgs = MultiImg::where('product_id', $id)->get();
        $product = Product::findOrFail($id);
        $brand  = Brand::latest()->get();
        $category = Category::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $subsubcategory = SubSubCategory::latest()->get();

        return view('backend.product.product-edit', compact('product', 'brand', 'category', 'subcategory', 'subsubcategory', 'multiImgs'));
    } // end ProductEdit

    public function ProductUpdate(Request $request)
    {
        $productId = $request->id;

        Product::findOrFail($productId)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,

            'product_name_en' => $request->product_name_en,
            'product_name_ar' => $request->product_name_ar,
            'product_slug_en' => strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_ar' => str_replace(' ', '-', $request->product_name_ar),
            'product_code' => $request->product_code,
            'product_quantity' => $request->product_quantity,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_ar' => $request->product_tags_ar,
            'product_size_en' => $request->product_size_en,
            'product_size_ar' => $request->product_size_ar,
            'product_color_en' => $request->product_color_en,
            'product_color_ar' => $request->product_color_ar,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_desc_en' => $request->short_desc_en,
            'short_desc_ar' => $request->short_desc_ar,
            'long_desc_en' => $request->long_desc_en,
            'long_desc_ar' => $request->long_desc_ar,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,

            'status' => 1,
            'updated_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Product Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('menage-product')->with($notification);
    } // end ProductUpdate

    public function MultiImagesUpdate(Request $request)
    {
        $images = $request->multi_img;

        foreach ($images as $id => $img) {
            $imgDel = MultiImg::findOrFail($id);
            unlink($imgDel->photo_name);

            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('upload/products/multi-images/'.$make_name);
            $upload_path = 'upload/products/multi-images/'.$make_name;

            MultiImg::where('id', $id)->update([
                'photo_name' => $upload_path,
                'updated_at' => Carbon::now(),

            ]);
        }
        $notification = array(
            'message' => 'Product MultiImages Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end MultiImagesUpdate

    public function ThumbnailUpdate(Request $request)
    {
        $image = $request->product_thumbnail;
        $old_img = $request->old_img;
        unlink($old_img);

        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/products/thumbnail/'.$name_gen);
        $save_url = 'upload/products/thumbnail/'.$name_gen;

        $product_id = $request->id;

        Product::findOrFail($product_id)->update([
            'product_thumbnail' => $save_url,
            'updated_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Product Thumbnail Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end ThumbnailUpdate

    public function MultiImagesDelete($id)
    {
        $old_img = MultiImg::findOrFail($id);
        unlink($old_img->photo_name);
        MultiImg::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Product MultiImg Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    } // end MultiImagesDelete

    public function InactiveProduct($id)
    {
        Product::findOrFail($id)->update([
            'status' => 0,
        ]);

        $notification = array(
            'message' => 'Product Inactivated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // end InactiveProduct

    public function ActiveProduct($id)
    {
        Product::findOrFail($id)->update([
            'status' => 1,
        ]);

        $notification = array(
            'message' => 'Product Activated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // end ActiveProduct

    public function ProductDelete($id)
    {
        $product = Product::findOrFail($id);
        unlink($product->product_thumbnail);
        Product::findOrFail($id)->delete();

        $images = MultiImg::where('product_id',$id)->get();
        foreach($images as $img){
            unlink($img->photo_name);
            MultiImg::where('product_id',$id)->delete();
    }

        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    } // end ProductDelete

    public function ProductDetails($id)
    {
        $multiImgs = MultiImg::where('product_id', $id)->get();
        $product = Product::findOrFail($id);
        $brand  = Brand::latest()->get();
        $category = Category::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $subsubcategory = SubSubCategory::latest()->get();

        return view('backend.product.product-details', compact('product', 'brand', 'category', 'subcategory', 'subsubcategory', 'multiImgs'));
    } // ProductDetails


    public function ProductStock()
    {
        $products = Product::latest()->get();

        return view('backend/product/product-stock', compact('products'));
    } // end ProductStock
}
