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

    public function pdfPageTypeSave(Request $request)
    {
        $pdf_page_type = $request->paper_type;
        $setting = Setting::first();
        $setting->pdf_page_type = $pdf_page_type;
        $setting->save();

        session()->flash('message', 'Settings saved successfully');
        return redirect()->route('settings.pdf-page-type.form');
    }
}
