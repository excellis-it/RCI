<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GatePass;
use App\Models\ItemCode;
use App\Models\User;

class GatePassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gatePasses = GatePass::paginate(10);
        $itemCodes = ItemCode::orderBy('id','desc')->get();
        $vendors = User::role('MATERIAL-MANAGER')->get();
        return view('inventory.gate-passes.list', compact('gatePasses','itemCodes','vendors'));
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
            'pass_no' => 'required|unique:gate_passes,gate_pass_no',
            'pass_date' => 'required',
            'pass_type' => 'required',
            'item_code_id' => 'required'
        ]);

        if($request->consignee == '0')
        {
            $user = new User();
            $user->user_name = $request->consignee_other_name;
            $user->phone =  $request->consignee_other_number;
            $user->save();

            $user->assignRole('MATERIAL-MANAGER');

        }

        $gatepass = new GatePass();
        $gatepass->gate_pass_no = $request->pass_no;
        $gatepass->gate_pass_date = $request->pass_date;
        $gatepass->gate_pass_type = $request->pass_type;
        if($request->consignee == 0){
            $gatepass->consignee_id = $user->id;
        }else{
            $gatepass->consignee_id = $request->consignee;
        }
        $gatepass->save();

        // gatepass items


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
        $itemCodes = ItemCode::orderBy('id','desc')->get();
        $vendors = User::role('MATERIAL-MANAGER')->get();
        $edit = true;

        return response()->json(['view' => view('inventory.gate-passes.form', compact('gatepass', 'edit','itemCodes','vendors'))->render()]);

        // return view('inventory.gate-passes.form', compact('gatepass', 'edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'pass_no' => 'required|unique:gate_passes,gate_pass_no,' . $id . ',id',
            'pass_date' => 'required',
            'pass_type' => 'required',
        ]);

        $gatepass = GatePass::findOrFail($id);
        $gatepass->gate_pass_no = $request->pass_no;
        $gatepass->gate_pass_date = $request->pass_date;
        $gatepass->gate_pass_type = $request->pass_type;
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
