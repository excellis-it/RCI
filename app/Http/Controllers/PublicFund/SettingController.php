<?php

namespace App\Http\Controllers\PublicFund;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;


class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Setting::orderBy('id', 'desc')->first();
        return view('frontend.public-fund.settings.public-fund-ac', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'public_bank_ac' => 'required',
        ]);

        // $settings=new Setting;

        $settings = Setting::orderBy('id', 'desc')->first();

        $settings->public_bank_ac = $request->public_bank_ac ?? '';
        $settings->save();

        session()->flash('message', 'Public Bank Account No. added successfully');
        return redirect()->route('settings.index')->with('success', 'Public Bank Account No. added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
