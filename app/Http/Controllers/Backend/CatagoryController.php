<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catagory;

class CatagoryController extends Controller
{
    public function CatagoryView()
    {
        $catagory = Catagory::latest()->get();
        return view('backend.catagory.catagory-view', compact('catagory'));
    } // end CatagoryView

    function CatagoryStore(Request $request)
    {
        $request->validate(
            [
                'catagory_name_en' => 'required',
                'catagory_name_ar' => 'required',
                'catagory_icon' => 'required',
            ],
            [
                'catagory_name_en.required' => 'Input Catagory Name English',
                'catagory_name_ar.required' => 'Input Catagory Name Arabic',
                'catagory_icon.required' => 'Add Catagory Image',
            ]
        );

        Catagory::insert([
            'catagory_name_en' => $request->catagory_name_en,
            'catagory_name_ar' => $request->catagory_name_ar,
            'catagory_slug_en' => strtolower(str_replace(' ', '-', $request->catagory_name_en)),
            'catagory_slug_ar' => str_replace(' ', '-', $request->catagory_name_ar),
            'catagory_icon' => $request->catagory_icon,
        ]);

        $notification = array(
            'message' => 'Catagory Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end CatagoryStore

    public function CatagoryEdit($id)
    {
        $catagory = Catagory::findOrFail($id);
        return view('backend.catagory.catagory-edit', compact('catagory'));
    } // end catagoryEdite

    function CatagoryUpdate(Request $request)
    {
        $catagory_id = $request->id;

        catagory::findOrFail($catagory_id)->update([
            'catagory_icon' => $request->catagory_icon,
            'catagory_name_en' => $request->catagory_name_en,
            'catagory_name_ar' => $request->catagory_name_ar,
            'catagory_slug_en' => strtolower(str_replace(' ', '-', $request->catagory_name_en)),
            'catagory_slug_ar' => str_replace(' ', '-', $request->catagory_name_ar),
        ]);

        $notification = array(
            'message' => 'Catagory Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.catagory')->with($notification);
    } // end CatagoryUpdate

    public function CatagoryDelete($id)
    {
        catagory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Catagory Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    } // end CatagoryDelete
}
