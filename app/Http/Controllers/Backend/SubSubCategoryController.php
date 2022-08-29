<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;

class SubSubCategoryController extends Controller
{
    public function SubSubCategoryView()
    {
        $category = Category::orderBy('category_name_en', 'asc')->get();
        $subcategory = SubCategory::latest()->get();
        $subsubcategory = SubSubCategory::latest()->get();

        return view('backend.category.sub-subcategory-view', compact('category', 'subcategory', 'subsubcategory'));
    } // end CategoryView

    public function GetSubCategory($category_id)
    {
        $subcategory = SubCategory::where('category_id', $category_id)->orderBy('subcategory_name_en', 'asc')->get();

        return json_encode($subcategory);
    } // end GetSubCategory

    function SubSubCategoryStore(Request $request)
    {
        $request->validate(
            [
                'category_id' => 'required',
                'subcategory_id' => 'required',
                'subsubcategory_name_en' => 'required',
                'subsubcategory_name_ar' => 'required',
            ],
            [
                'category_id.required' => 'Please Select Any Category',
                'subcategory_id.required' => 'Please Select Any Sub Category',
                'subsubcategory_name_en.required' => 'Input SubCategory Name English',
                'subsubcategory_name_ar.required' => 'Input SubCategory Name Arabic',
            ]
        );

        SubSubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_ar' => $request->subsubcategory_name_ar,
            'subsubcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subsubcategory_name_en)),
            'subsubcategory_slug_ar' => str_replace(' ', '-', $request->subsubcategory_name_ar),
        ]);

        $notification = array(
            'message' => 'Sub-SubCategory Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end SubCategoryStore

    public function SubSubCategoryEdit($id)
    {
        $category = Category::orderBy('category_name_en', 'asc')->get();
        $subcategory = SubCategory::orderBy('subcategory_name_en', 'asc')->get();
        $subsubcategory = SubSubCategory::findOrFail($id);

        return view('backend.category.sub-subcategory-edit', compact('subcategory','subsubcategory', 'category'));
    } // end SubcategoryEdite

    function SubSubCategoryUpdate(Request $request)
    {
        $category_id = $request->id;

        SubSubcategory::findOrFail($category_id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_ar' => $request->subsubcategory_name_ar,
            'subsubcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subsubcategory_name_en)),
            'subsubcategory_slug_ar' => str_replace(' ', '-', $request->subsubcategory_name_ar),
        ]);

        $notification = array(
            'message' => 'SubSubCategory Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.subsubcategory')->with($notification);
    } // end SubCategoryUpdate

    public function SubSubCategoryDelete($id)
    {
        SubSubcategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'SubSubCategory Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    } // end SubCategoryDelete

}
