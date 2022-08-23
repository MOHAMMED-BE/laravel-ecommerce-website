<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function CategoryView()
    {
        $category = Category::latest()->get();
        return view('backend.category.category-view', compact('category'));
    } // end CategoryView

    function CategoryStore(Request $request)
    {
        $request->validate(
            [
                'category_name_en' => 'required',
                'category_name_ar' => 'required',
                'category_icon' => 'required',
            ],
            [
                'category_name_en.required' => 'Input Category Name English',
                'category_name_ar.required' => 'Input Category Name Arabic',
                'category_icon.required' => 'Add Category Image',
            ]
        );

        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_ar' => $request->category_name_ar,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
            'category_slug_ar' => str_replace(' ', '-', $request->category_name_ar),
            'category_icon' => $request->category_icon,
        ]);

        $notification = array(
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end CategoryStore

    public function CategoryEdit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.category-edit', compact('category'));
    } // end categoryEdite

    function CategoryUpdate(Request $request)
    {
        $category_id = $request->id;

        category::findOrFail($category_id)->update([
            'category_icon' => $request->category_icon,
            'category_name_en' => $request->category_name_en,
            'category_name_ar' => $request->category_name_ar,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
            'category_slug_ar' => str_replace(' ', '-', $request->category_name_ar),
        ]);

        $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.category')->with($notification);
    } // end CategoryUpdate

    public function CategoryDelete($id)
    {
        category::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    } // end CategoryDelete
}
