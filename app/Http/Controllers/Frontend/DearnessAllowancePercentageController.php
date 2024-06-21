<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DearnessAllowancePercentage;
use App\Models\PayCommission;

class DearnessAllowancePercentageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dearnessAllowancePercentages = DearnessAllowancePercentage::paginate(10);
        $payCommissions = PayCommission::where('is_active', true)->get();

        return view('frontend.dearness-allowance-percentages.list', compact('dearnessAllowancePercentages', 'payCommissions'));
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
            'year' => 'required',
            'quarter' => 'required',
            'percentage' => 'required',
            'pay_commission_id' => 'required',
        ]);

        $dearnessAllowancePercentage = new DearnessAllowancePercentage();
        $dearnessAllowancePercentage->year = $request->year;
        $dearnessAllowancePercentage->quarter = $request->quarter;
        $dearnessAllowancePercentage->percentage = $request->percentage;
        $dearnessAllowancePercentage->pay_commission_id = $request->pay_commission_id;
        $dearnessAllowancePercentage->save();

        // make the older dearness allowance percentage inactive
        $lastDa = DearnessAllowancePercentage::latest()->first();
        DearnessAllowancePercentage::where('id', '!=', $lastDa->id)
            ->update(['is_active' => 0]);

        session()->flash('message', 'Dearness Allowance Percentage updated successfully');
        return response()->json([
            'message' => 'Dearness Allowance Percentage created successfully!'
        ]);
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
        $dearnessAllowancePercentage = DearnessAllowancePercentage::findOrFail($id);
        $payCommissions = PayCommission::where('is_active', true)->get();
        $edit = true;

        return response()->json([
            'view' => view('frontend.dearness-allowance-percentages.form', compact('dearnessAllowancePercentage', 'edit', 'payCommissions'))->render()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'year' => 'required',
            'quarter' => 'required',
            'percentage' => 'required',
            'pay_commission_id' => 'required',
        ]);

        $dearnessAllowancePercentage = DearnessAllowancePercentage::findOrFail($id);
        $dearnessAllowancePercentage->year = $request->year;
        $dearnessAllowancePercentage->quarter = $request->quarter;
        $dearnessAllowancePercentage->percentage = $request->percentage;
        $dearnessAllowancePercentage->pay_commission_id = $request->pay_commission_id;
        $dearnessAllowancePercentage->update();

        session()->flash('message', 'Dearness Allowance Percentage updated successfully');
        return response()->json([
            'message' => 'Dearness Allowance Percentage updated successfully!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    
    public function delete(string $id)
    {
        $dearnessAllowancePercentage = DearnessAllowancePercentage::findOrFail($id);
        $dearnessAllowancePercentage->delete();

        return redirect()->back()->with('message', 'Dearness Allowance Percentage deleted successfully.');
    }
}