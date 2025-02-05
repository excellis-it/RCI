<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class WebSettingsController extends Controller
{
    //

    public function pdfPageType()
    {
        $setting = Setting::first();
        return view('settings.pdf-page-type', compact('setting'));
    }

    public function pdfPageTypeSave(Request $request) {}
}
