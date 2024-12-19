<?php

namespace App\Http\Controllers\Imprest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CdaBillAuditTeam;
use App\Models\ImprestResetVoucher;
use App\Models\Project;
use App\Models\VariableType;
use App\Models\AdvanceFundToEmployee;
use App\Models\AdvanceSettlement;
use App\Models\CDAReceipt;
use Illuminate\Support\Str;

class CdaBillAuditTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $cdaBills = CdaBillAuditTeam::orderBy('id', 'desc')->with('project','variableType')->paginate(10);
        $projects = Project::orderBy('id', 'desc')->where('status', 1)->get();
        $variable_types = VariableType::orderBy('id', 'desc')->where('status', 1)->get();
        $advance_settels = AdvanceSettlement::where('balance', '<=', 0)->where('bill_status', 0)->get();

        $advance_bills = AdvanceSettlement::where('balance', '<=', 0)->where('bill_status', 1)->orderBy('id', 'desc')->get();

        foreach ($advance_bills as $advance_bill) {
            // Fetch the related CdaBillAuditTeam based on adv_no and adv_date
            $cda_bill = CdaBillAuditTeam::where('adv_no', $advance_bill->adv_no)
                ->where('adv_date', $advance_bill->adv_date)
                ->first();  // Use first() to get a single match

            // If a matching CdaBillAuditTeam is found, assign its values to the advance_bill object
            if ($cda_bill) {
                $advance_bill->cda_bill_id = $cda_bill->id;
                $advance_bill->cda_bill_no = $cda_bill->cda_bill_no;
                $advance_bill->cda_bill_date = $cda_bill->cda_bill_date;
            } else {
                // If no matching CdaBillAuditTeam is found, set to 'N/A' or any default value
                $advance_bill->cda_bill_id = 0;
                $advance_bill->cda_bill_no = 'N/A';
                $advance_bill->cda_bill_date = 'N/A';
            }
        }



        return view('imprest.cda-bills.list', compact('projects', 'variable_types', 'advance_settels', 'advance_bills'));
    }

    public function getCda(Request $request)
    {
        // $adv_no = $request->adv_no;
        // $adv_date = $request->adv_date;

        // $advance_funds = AdvanceFundToEmployee::where('adv_no', $adv_no)->where('adv_date', $adv_date)->first();
        // $advance_settels = AdvanceSettlement::where('adv_no', $adv_no)->where('adv_date', $adv_date)->get();


        // $balance = 0;

        // $existingBalance = AdvanceSettlement::select('balance')->where('adv_no', $request->adv_no)
        //     ->where('adv_date', $request->adv_date)
        //     ->orderBy('id', 'desc')->first();

        // if ($existingBalance) {
        //     $existingBalanceAmount = $existingBalance->balance;


        //     $balance = $existingBalanceAmount;
        // } else {

        //     $advanceFund = AdvanceFundToEmployee::where('adv_no', $request->adv_no)
        //         ->where('adv_date', $request->adv_date)
        //         ->first();

        //     $balance = $advanceFund->adv_amount;
        // }

        // return response()->json(['view' => view('imprest.cda-bills.form-data', compact('advance_funds', 'advance_settels', 'balance'))->render()]);
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $cdaBills = CdaBillAuditTeam::where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('adv_no', 'like', '%' . $query . '%')
                    ->orWhere('adv_date', 'like', '%' . $query . '%')
                    ->orWhere('adv_amount', 'like', '%' . $query . '%')
                    ->orWhere('var_no', 'like', '%' . $query . '%')
                    ->orWhere('var_date', 'like', '%' . $query . '%')
                    ->orWhere('var_amount', 'like', '%' . $query . '%')
                    ->orWhere('chq_no', 'like', '%' . $query . '%')
                    ->orWhere('chq_date', 'like', '%' . $query . '%')
                    ->orWhere('crv_no', 'like', '%' . $query . '%');
            })
                ->orderBy($sort_by, $sort_type)
                ->paginate(10);

            return response()->json(['data' => view('imprest.cda-bills.table', compact('cdaBills'))->render()]);
        }
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
            'cda_bill_no' => 'required',
            'cda_bill_date' => 'required',
        ]);

        $advanceSettlements = AdvanceSettlement::where('balance', '<=', 0)->where('bill_status', 0)->get();

        foreach ($advanceSettlements as $advanceSettlement) {
            // Create a new CdaBillAuditTeam record
            $cdaBill = new CdaBillAuditTeam();
            $cdaBill->adv_no = $advanceSettlement->adv_no;
            $cdaBill->adv_date = $advanceSettlement->adv_date;
            $cdaBill->cda_bill_no = $request->cda_bill_no;
            $cdaBill->cda_bill_date = $request->cda_bill_date;
            $cdaBill->save();

            $advanceSettlement->bill_status = 1;
            $advanceSettlement->save();
        }

        session()->flash('message', 'CDA bill added successfully');
        return response()->json(['success' => 'CDA bill added successfully']);
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
        $cdaBill = CdaBillAuditTeam::find($id);
        $projects = Project::orderBy('id', 'desc')->get();
        $variable_types = VariableType::orderBy('id', 'desc')->get();
        $edit = true;

        return response()->json(['view' => view('imprest.cda-bills.form', compact('edit', 'cdaBill', 'projects', 'variable_types'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $request->validate([
        //     'adv_no' => 'required',
        //     'adv_date' => 'required',
        //     'adv_amount' => 'required|numeric',
        //     'project_id' => 'required',
        //     'var_date' => 'required',
        //     'var_amount' => 'required|numeric',
        //     'var_type_id' => 'required',
        //     'chq_no' => 'required',
        //     'chq_date' => 'required',
        //     'crv_no' => 'required',
        // ]);

        $cda_bill = CdaBillAuditTeam::findOrFail($id);
        $cda_bill->pc_no = $request->pc_no;
        $cda_bill->project_id = $request->project_id;
        $cda_bill->adv_no = $request->adv_no;
        $cda_bill->adv_date = $request->adv_date;
        $cda_bill->adv_amount = $request->adv_amount;
        $cda_bill->var_date = $request->var_date;
        $cda_bill->var_amount = $request->var_amount;
        $cda_bill->crv_no = $request->crv_no;
        $cda_bill->firm_name = $request->firm_name;
        $cda_bill->cda_bill_no = $request->cda_bill_no;
        $cda_bill->cda_bill_date = $request->cda_bill_date;
        $cda_bill->cda_bill_amount = $request->cda_bill_amount;
        $cda_bill->update();

        session()->flash('message', 'CDA bill updated successfully');
        return response()->json(['success' => 'CDA bill updated successfully']);
    }

    // public function delete($id)
    // {

    //     $cda_bill =  CdaBillAuditTeam::findOrFail($id);
    //     CDAReceipt::where('bill_id', $id)->delete();
    //     AdvanceSettlement::where('id', $id)
    //     ->update(['bill_status'=>0,'receipt_status'=>0]);
    //     $cda_bill->delete();

    //     return redirect()->back()->with('message', 'CDA bill deleted successfully');
    // }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
