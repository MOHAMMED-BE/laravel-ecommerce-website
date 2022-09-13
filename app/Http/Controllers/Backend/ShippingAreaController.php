<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ShipDistrict;
use App\Models\ShipDivision;
use App\Models\ShipState;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ShippingAreaController extends Controller
{

    // =========================== ShipDivision Start =========================== //

    public function DivisionView()
    {
        $divisions = ShipDivision::orderBy('id','desc')->get();
        return view('backend.ship.division.division-view',compact('divisions'));
    } // end DivisionView

    function DivisionStore(Request $request)
    {
        $request->validate(
            [
                'division_name' => 'required',
            ],
            [
                'division_name.required' => 'Input Division Name ',
            ]
        );

        ShipDivision::insert([
            'division_name' => $request->division_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Division Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end DivisionStore

    public function DivisionEdit($id)
    {
        $division = ShipDivision::findOrFail($id);
        return view('backend.ship.division.division-edit', compact('division'));
    } // end DivisionEdite

    function DivisionUpdate(Request $request)
    {
        $division_id = $request->id;

        ShipDivision::findOrFail($division_id)->update([
            'division_name' => $request->division_name,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Division Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('menage-division')->with($notification);
    } // end DivisionUpdate

    public function DivisionDelete($id)
    {
        ShipDivision::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Division Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    } // end DivisionDelete

    // =========================== ShipDivision End =========================== //



    
    // =========================== ShipDistrict Start =========================== //

    public function DistrictView()
    {
        $districts = ShipDistrict::with('division')->orderBy('id','desc')->get();
        $divisions = ShipDivision::orderBy('division_name','asc')->get();
        return view('backend.ship.district.district-view',compact('districts','divisions'));
    } // end districtView

    function DistrictStore(Request $request)
    {
        $request->validate(
            [
                'division_id' => 'required',
                'district_name' => 'required',
            ],
            [
                'district_name.required' => 'Input district Name ',
                'division_id.required' => 'Input division_id ',
            ]
        );

        ShipDistrict::insert([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'district Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end districtStore

    public function DistrictEdit($id)
    {
        $district = ShipDistrict::findOrFail($id);
        $division = ShipDivision::orderBy('division_name','asc')->get();
        return view('backend.ship.district.district-edit', compact('district','division'));
    } // end districtEdite

    function DistrictUpdate(Request $request)
    {
        $district_id = $request->id;

        ShipDistrict::findOrFail($district_id)->update([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'district Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('menage-district')->with($notification);
    } // end districtUpdate

    public function DistrictDelete($id)
    {
        ShipDistrict::findOrFail($id)->delete();

        $notification = array(
            'message' => 'district Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    } // end DivisionDelete

    // =========================== ShipDistrict End =========================== //


    
    // =========================== ShipState Start =========================== //

    public function StateView()
    {
        $states = ShipState::with('division','district')->orderBy('id','desc')->get();
        $divisions = ShipDivision::orderBy('division_name','asc')->get();
        $districts = ShipDistrict::orderBy('district_name','asc')->get();
        return view('backend.ship.state.state-view',compact('states','districts','divisions'));
    } // end districtView

    function StateStore(Request $request)
    {
        $request->validate(
            [
                'division_id' => 'required',
                'district_id' => 'required',
                'state_name' => 'required',
            ],
            [
                'state_name.required' => 'Input district Name ',
                'division_id.required' => 'Input division_id ',
                'district_id.required' => 'Input district_id ',
            ]
        );

        ShipState::insert([
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_name' => $request->state_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'State Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end districtStore

    public function StateEdit($id)
    {
        $state = ShipState::findOrFail($id);
        $division = ShipDivision::orderBy('division_name','asc')->get();
        $district = ShipDistrict::orderBy('district_name','asc')->get();
        return view('backend.ship.state.state-edit', compact('state','district','division'));
    } // end districtEdite

    function StateUpdate(Request $request)
    {
        $state_id = $request->id;

        ShipState::findOrFail($state_id)->update([
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_name' => $request->state_name,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'State Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('menage-state')->with($notification);
    } // end districtUpdate

    public function StateDelete($id)
    {
        ShipState::findOrFail($id)->delete();

        $notification = array(
            'message' => 'State Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    } // end DivisionDelete

    public function GetDistrict($division_id)
    {
        $shipdistrict = ShipDistrict::where('division_id', $division_id)->orderBy('district_name', 'asc')->get();

        return json_encode($shipdistrict);
    } // end GetDivision

    // =========================== ShipState End =========================== //
    

}
