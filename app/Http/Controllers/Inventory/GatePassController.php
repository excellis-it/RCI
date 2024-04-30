<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GatePass;

class GatePassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gatePasses = GatePass::paginate(10);
        return view('inventory.gate-passes.list', compact('gatePasses'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $gatePasses = GatePass::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('gate_pass_no', 'like', '%' . $query . '%')
                    ->orWhere('gate_pass_date', 'like', '%' . $query . '%');
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('inventory.gate-passes.table', compact('gatePasses'))->render()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inventory.gate-passes.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pass_no' => 'required',
            'pass_date' => 'required',
        ]);

        $gatepass = new GatePass();
        $gatepass->gate_pass_no = $request->pass_no;
        $gatepass->gate_pass_date = $request->pass_date;
        $gatepass->save();

        return redirect()->route('gate-passes.index')->with('success', 'Gate Pass created successfully.');
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
        $gatepass = GatePass::findOrFail($id);
        $edit = true;

        return response()->json(['view' => view('inventory.gate-passes.form', compact('gatepass', 'edit'))->render()]);

        // return view('inventory.gate-passes.form', compact('gatepass', 'edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'pass_no' => 'required',
            'pass_date' => 'required',
        ]);

        $gatepass = GatePass::findOrFail($id);

        $gatepass->gate_pass_no = $request->pass_no;
        $gatepass->gate_pass_date = $request->pass_date;
        $gatepass->save();

        return redirect()->route('gate-passes.index')->with('success', 'Gate Pass updated successfully.');
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
        $gatepass = GatePass::findOrFail($id);
        $gatepass->delete();

        return redirect()->back()->with('message', 'Gate Pass deleted successfully.');
    }
}
