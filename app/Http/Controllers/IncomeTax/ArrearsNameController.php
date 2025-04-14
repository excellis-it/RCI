<?php

namespace App\Http\Controllers\IncomeTax;

use App\Http\Controllers\Controller;
use App\Models\IncomeTaxArrearsName;
use Illuminate\Http\Request;

class ArrearsNameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $arrearsNames = IncomeTaxArrearsName::orderBy('id', 'asc')->get();
        return view('income-tax.arrears-name.list', compact('arrearsNames'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('income-tax.arrears-name.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:income_tax_arrears_names',
            'description' => 'nullable|string',
            'status' => 'nullable|boolean',
        ]);

        $validated['status'] = $request->has('status') ? 1 : 0;

        IncomeTaxArrearsName::create($validated);

        session()->flash('message', 'Arrears name created successfully.');
        return redirect()->route('arrears-name.index')
            ->with('success', 'Arrears name created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $arrearsName = IncomeTaxArrearsName::findOrFail($id);
        return view('income-tax.arrears-name.edit', compact('arrearsName'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $arrearsName = IncomeTaxArrearsName::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:income_tax_arrears_names,name,' . $id,
            'description' => 'nullable|string',
            'status' => 'nullable|boolean',
        ]);

        $validated['status'] = $request->has('status') ? 1 : 0;

        $arrearsName->update($validated);

        session()->flash('message', 'Arrears name updated successfully.');
        // json response
        return response()->json([
            'success' => true,
            'message' => 'Arrears name updated successfully.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $arrearsName = IncomeTaxArrearsName::findOrFail($id);
        $arrearsName->delete();

        session()->flash('message', 'Arrears name deleted successfully.');
        return response()->json([
            'success' => true,
            'message' => 'Arrears name deleted successfully.'
        ]);
    }

    /**
     * Get all active arrears names
     */
    public function getActiveArrearsNames()
    {
        $arrearsNames = IncomeTaxArrearsName::where('status', 1)->orderBy('name', 'asc')->get();

        //  session()->flash('message', 'Active arrears names retrieved successfully.');
        return response()->json([
            'success' => true,
            'data' => $arrearsNames
        ]);
    }
}
