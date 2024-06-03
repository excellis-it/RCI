<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\MemberIncomeTax;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberIncomeTaxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $memberIncomeTaxes = MemberIncomeTax::paginate(10);
        $members = Member::all();
        return view('frontend.member-income-taxes.index', compact('memberIncomeTaxes', 'members'));
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
            'member_id' => 'required',
            'section' => 'required',
            'description' => 'required',
            'max_deduction' => 'required',
            'year' => 'required',
            'financial_year' => 'required',
        ]);

        $memberIncomeTaxe = new MemberIncomeTax();
        $memberIncomeTaxe->member_id = $request->member_id;
        $memberIncomeTaxe->section = $request->section;
        $memberIncomeTaxe->description = $request->description;
        $memberIncomeTaxe->max_deduction = $request->max_deduction; 
        $memberIncomeTaxe->year = $request->year;
        $memberIncomeTaxe->financial_year = $request->financial_year;
        $memberIncomeTaxe->save();

        session()->flash('success', 'Member Income Tax created successfully.');
        return redirect()->route('member-income-taxes.index')->with('success', 'Member Income Tax created successfully.');
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
        $memberIncomeTax = MemberIncomeTax::findOrFail($id);
        $members = Member::all();
        $edit = true;

        return response()->json([
            'view' => view('frontend.member-income-taxes.edit', compact('memberIncomeTax', 'edit', 'members'))->render()
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'member_id' => 'required',
            'section' => 'required',
            'description' => 'required',
            'max_deduction' => 'required',
            'year' => 'required',
            'financial_year' => 'required',
        ]);

        $memberIncomeTax = MemberIncomeTax::findOrFail($id);
        $memberIncomeTax->member_id = $request->member_id;
        $memberIncomeTax->section = $request->section;
        $memberIncomeTax->description = $request->description;
        $memberIncomeTax->max_deduction = $request->max_deduction;
        $memberIncomeTax->year = $request->year;
        $memberIncomeTax->financial_year = $request->financial_year;
        $memberIncomeTax->update();

        session()->flash('success', 'Member Income Tax updated successfully.');
        return redirect()->route('member-income-taxes.index')->with('success', 'Member Income Tax updated successfully.');
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
        $memberIncomeTax = MemberIncomeTax::findOrFail($id);
        $memberIncomeTax->delete();

        return redirect()->route('member-income-taxes.index')->with('success', 'Member Income Tax deleted successfully.');
    }
}
