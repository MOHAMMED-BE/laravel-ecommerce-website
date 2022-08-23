<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCatagory;
use App\Models\Catagory;


class SubCatagoryController extends Controller
{
    public function SubCatagoryView()
    {
        $catagory = catagory::orderBy('catagory_name_en','asc')->get();
        $subcatagory = SubCatagory::latest()->get();
        // $catagory = Catagory::latest()->get();

        return view('backend.catagory.subcatagory-view', compact('subcatagory','catagory'));
    } // end CatagoryView

    function SubCatagoryStore(Request $request)
    {
        $request->validate(
            [
                'catagory_id' => 'required',
                'subcatagory_name_en' => 'required',
                'subcatagory_name_ar' => 'required',
            ],
            [
                'catagory_id.required' => 'Please Select Any Catagory',
                'subcatagory_name_en.required' => 'Input SubCatagory Name English',
                'subcatagory_name_ar.required' => 'Input SubCatagory Name Arabic',
            ]
        );

        SubCatagory::insert([
            'catagory_id' => $request->catagory_id,
            'subcatagory_name_en' => $request->subcatagory_name_en,
            'subcatagory_name_ar' => $request->subcatagory_name_ar,
            'subcatagory_slug_en' => strtolower(str_replace(' ', '-', $request->subcatagory_name_en)),
            'subcatagory_slug_ar' => str_replace(' ', '-', $request->subcatagory_name_ar),
        ]);

        $notification = array(
            'message' => 'SubCatagory Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end SubCatagoryStore

    public function SubCatagoryEdit($id)
    {
        $subcatagory = SubCatagory::findOrFail($id);
        $catagory = catagory::orderBy('catagory_name_en','asc')->get();

        return view('backend.catagory.subcatagory-edit', compact('subcatagory','catagory'));
    } // end SubcatagoryEdite

    function SubCatagoryUpdate(Request $request)
    {
        $catagory_id = $request->id;

        Subcatagory::findOrFail($catagory_id)->update([
            'catagory_id' => $request->catagory_id,
            'subcatagory_name_en' => $request->subcatagory_name_en,
            'subcatagory_name_ar' => $request->subcatagory_name_ar,
            'subcatagory_slug_en' => strtolower(str_replace(' ', '-', $request->subcatagory_name_en)),
            'subcatagory_slug_ar' => str_replace(' ', '-', $request->subcatagory_name_ar),
        ]);

        $notification = array(
            'message' => 'SubCatagory Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.subcatagory')->with($notification);
    } // end SubCatagoryUpdate

    public function SubCatagoryDelete($id)
    {
        Subcatagory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'SubCatagory Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    } // end SubCatagoryDelete
}
