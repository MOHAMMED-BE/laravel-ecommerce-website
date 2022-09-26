<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Seo;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Image;

class SiteSettingController extends Controller
{
    public function SiteSetting()
    {
        $setting = SiteSetting::find(1);

        return view('backend.setting.setting-update',compact('setting'));

    } // end SiteSetting


    function SiteSettingUpdate(Request $request)
    {
        $sitesetting = $request->id;

        if ($request->file('logo')) {
            $image = $request->file('logo');
            $name_gen = hexdec(uniqid() . '.' . $image->getClientOriginalExtension());
            Image::make($image)->save('upload/logo/' . $name_gen);
            $save_url = 'upload/logo/' . $name_gen;

            SiteSetting::findOrFail($sitesetting)->update([
                'email' => $request->email,
                'phone_one' => $request->phone_one,
                'phone_two' => $request->phone_two,
                'company_name' => $request->company_name,
                'company_address' => $request->company_address,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'youtube' => $request->youtube,
                'logo' => $save_url,
            ]);

            $notification = array(
                'message' => 'SiteSetting Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('site.setting')->with($notification);
        } // edn if
        else {
            SiteSetting::findOrFail($sitesetting)->update([
                'email' => $request->email,
                'phone_one' => $request->phone_one,
                'phone_two' => $request->phone_two,
                'company_name' => $request->company_name,
                'company_address' => $request->company_address,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'youtube' => $request->youtube,
            ]);

            $notification = array(
                'message' => 'SiteSetting Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('site.setting')->with($notification);
        } // end else
    } // end SiteSettingUpdate


    public function SeoSetting()
    {
        $seo = Seo::find(1);

        return view('backend.setting.seo-update',compact('seo'));

    } // end SeoSetting


    function SeoSettingUpdate(Request $request)
    {
        $seo_id = $request->id;

        Seo::findOrFail($seo_id)->update([
            'meta_title' => $request->meta_title,
            'meta_author' => $request->meta_author,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'google_analytics' => $request->google_analytics,
        ]);

        $notification = array(
            'message' => 'Seo Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

        } // end SeoSettingUpdate
}
