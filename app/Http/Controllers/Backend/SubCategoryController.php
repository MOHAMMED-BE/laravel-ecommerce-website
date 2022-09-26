<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;


class SubCategoryController extends Controller
{
    public function SubCategoryView()
    {
        $category = category::orderBy('category_name_en','asc')->get();
        $subcategory = SubCategory::latest()->get();
        return view('backend.category.subcategory-view', compact('subcategory','category'));
    } // end CategoryView

    function SubCategoryStore(Request $request)
    {
        $request->validate(
            [
                'category_id' => 'required',
                'subcategory_name_en' => 'required',
                'subcategory_name_ar' => 'required',
            ],
            [
                'category_id.required' => 'Please Select Any Category',
                'subcategory_name_en.required' => 'Input SubCategory Name English',
                'subcategory_name_ar.required' => 'Input SubCategory Name Arabic',
            ]
        );

        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_ar' => $request->subcategory_name_ar,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subcategory_name_en)),
            'subcategory_slug_ar' => str_replace(' ', '-', $request->subcategory_name_ar),
        ]);

        $notification = array(
            'message' => 'SubCategory Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end SubCategoryStore

    public function SubCategoryEdit($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $category = category::orderBy('category_name_en','asc')->get();

        return view('backend.category.subcategory-edit', compact('subcategory','category'));
    } // end SubcategoryEdite

    function SubCategoryUpdate(Request $request)
    {
        $category_id = $request->id;

        Subcategory::findOrFail($category_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_ar' => $request->subcategory_name_ar,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subcategory_name_en)),
            'subcategory_slug_ar' => str_replace(' ', '-', $request->subcategory_name_ar),
        ]);

        $notification = array(
            'message' => 'SubCategory Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.subcategory')->with($notification);
    } // end SubCategoryUpdate

    public function SubCategoryDelete($id)
    {
        Subcategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'SubCategory Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    } // end SubCategoryDelete

}
