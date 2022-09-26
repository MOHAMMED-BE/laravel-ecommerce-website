<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use DateTime;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function ReportView()
    {
        return view('backend.report.report-view');

    } // end ReportView

    public function ReportByDate(Request $request)
    {
        $date = new DateTime($request->date);
        $dateFormat = $date->format('d F Y');

        $orders = Order::where('order_date',$dateFormat)->latest()->get();
        return view('backend.report.report-show',compact('orders'));

    } // end ReportByDate

    public function ReportByMonth(Request $request)
    {
        $orders = Order::where('order_month',$request->month_select)->where('order_year',$request->year_select)->latest()->get();

        return view('backend.report.report-show',compact('orders'));

    } // end ReportByMonth

    public function ReportByYear(Request $request)
    {
        $orders = Order::where('order_year',$request->year)->latest()->get();
        
        return view('backend.report.report-show',compact('orders'));

    } // end ReportByYear
}
