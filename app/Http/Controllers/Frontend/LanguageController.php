<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function English()
    {
        session()->get('language');
        session()->forget('language');
        Session::put('language','english');
        return redirect()->back();
    } // end English

    public function Arabic()
    {
        session()->get('language');
        session()->forget('language');
        Session::put('language','arabic');
        return redirect()->back();
    } // end Arabic
}
