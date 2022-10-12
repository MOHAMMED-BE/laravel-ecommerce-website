<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Image;

class SliderController extends Controller
{
    public function SliderView()
    {
        $sliders = Slider::latest()->get();
        return view('backend.slider.slider-view',compact('sliders'));
    } // end SliderView

    function SliderStore(Request $request)
    {
        $request->validate(
            [
                'slider_img' => 'required',
            ],
            [
                'slider_img.required' => 'Add Slider Image',
            ]
        );

        $image = $request->file('slider_img');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(870, 370)->save('upload/slider-images/' . $name_gen);
        $save_url = 'upload/slider-images/' . $name_gen;

        Slider::insert([
            'slider_img' => $save_url,
        ]);

        $notification = array(
            'message' => 'Slider Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end SliderStore

    function SliderUpdate(Request $request)
    {
        $slider_id = $request->id;
        $slider_old_image = $request->old_image;

        if ($request->file('edit_slider_img')) {
            unlink($slider_old_image);
            $image = $request->file('edit_slider_img');
            $name_gen = hexdec(uniqid() . '.' . $image->getClientOriginalExtension());
            Image::make($image)->resize(870, 370)->save('upload/slider-images/' . $name_gen);
            $save_url = 'upload/slider-images/' . $name_gen;

            Slider::findOrFail($slider_id)->update([
                'slider_img' => $save_url,
            ]);

            $notification = array(
                'message' => 'Slider Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('menage-slider')->with($notification);
        } // edn if
      
    } // end SliderUpdate

    public function SliderDelete($id){
        $slider = Slider::findOrFail($id);
        $slider_img = $slider->slider_img;
        unlink($slider_img);

        Slider::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Slider Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

    public function InactiveSlider($id)
    {
        Slider::findOrFail($id)->update([
            'status' => 0,
        ]);

        $notification = array(
            'message' => 'Slider Inactivated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // end InactiveSlider

    public function ActiveSlider($id)
    {
        Slider::findOrFail($id)->update([
            'status' => 1,
        ]);

        $notification = array(
            'message' => 'Slider Activated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // end ActiveSlider
}
