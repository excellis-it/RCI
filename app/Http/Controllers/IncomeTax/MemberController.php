<?php

namespace App\Http\Controllers\IncomeTax;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\IncomeTaxSaving;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::orderBy('id', 'desc')->where('name', '!=', 'The Director, CHESS')->with('designation')->paginate(15);

        return view('income-tax.members.index', compact('members'));
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
        //
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
        $member = Member::with('designation', 'divisions', 'groups')->where('id', $id)->first();

        // savings

        return view('income-tax.members.edit', compact('member'));
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

    public function savingStore(Request $request)
    {
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'month_year' => 'required',
        ]);

        // Extract month and year from month_year (format: MM-YYYY)
        $monthYear = explode('-', $request->month_year);
        $month = $monthYear[0];
        $year = $monthYear[1];

        // Check if record already exists
        $existingSaving = IncomeTaxSaving::where('member_id', $request->member_id)
            ->where('month', $month)
            ->where('year', $year)
            ->first();

        if ($existingSaving) {
            // Update existing record
            $existingSaving->update([
                'var_incr' => $request->var_incr,
                'misc' => $request->misc,
                'p_tax' => $request->p_tax,
                'hdfc' => $request->hdfc,
                'basic' => $request->basic,
                'da' => $request->da,
                'ot' => $request->ot,
                'i_tax' => $request->i_tax,
                'd_misc' => $request->d_misc,
                'd_pay' => $request->d_pay,
                'hra' => $request->hra,
                'arrears' => $request->arrears,
                'hba' => $request->hba,
                'gmc' => $request->gmc,
                's_pay' => $request->s_pay,
                'cca' => $request->cca,
                'gpf' => $request->gpf,
                'pli' => $request->pli,
                'e_pay' => $request->e_pay,
                'tpt' => $request->tpt,
                'cgeis' => $request->cgeis,
                'lic' => $request->lic,
                'add_incr' => $request->add_incr,
                'wash_ajw' => $request->wash_ajw,
                'cghs' => $request->cghs,
                'eol_hpl' => $request->eol_hpl,
                'med_ins_80d' => $request->med_ins == 'Yes' ? 1 : 0,
                'med_ins_senior_dependent' => $request->med_ins == 'Yes' ? 1 : 0,
                'cancer_80ddb_senior_dependent' => $request->cancer == 'Yes' ? 1 : 0,
                'med_tri_80dd_disability' => $request->med_tri == 'Yes' ? 1 : 0,
                'ph_disable_80u_disability' => $request->server_dis == 'Yes' ? 1 : 0,
                'it_rules' => $request->it_rules == 'Yes' ? 1 : 0,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Savings data updated successfully',
            ]);
        } else {
            // Create new record
            IncomeTaxSaving::create([
                'member_id' => $request->member_id,
                'month' => $month,
                'year' => $year,
                'var_incr' => $request->var_incr,
                'misc' => $request->misc,
                'p_tax' => $request->p_tax,
                'hdfc' => $request->hdfc,
                'basic' => $request->basic,
                'da' => $request->da,
                'ot' => $request->ot,
                'i_tax' => $request->i_tax,
                'd_misc' => $request->d_misc,
                'd_pay' => $request->d_pay,
                'hra' => $request->hra,
                'arrears' => $request->arrears,
                'hba' => $request->hba,
                'gmc' => $request->gmc,
                's_pay' => $request->s_pay,
                'cca' => $request->cca,
                'gpf' => $request->gpf,
                'pli' => $request->pli,
                'e_pay' => $request->e_pay,
                'tpt' => $request->tpt,
                'cgeis' => $request->cgeis,
                'lic' => $request->lic,
                'add_incr' => $request->add_incr,
                'wash_ajw' => $request->wash_ajw,
                'cghs' => $request->cghs,
                'eol_hpl' => $request->eol_hpl,
                'med_ins_80d' => $request->med_ins == 'Yes' ? 1 : 0,
                'med_ins_senior_dependent' => $request->med_ins == 'Yes' ? 1 : 0,
                'cancer_80ddb_senior_dependent' => $request->cancer == 'Yes' ? 1 : 0,
                'med_tri_80dd_disability' => $request->med_tri == 'Yes' ? 1 : 0,
                'ph_disable_80u_disability' => $request->server_dis == 'Yes' ? 1 : 0,
                'it_rules' => $request->it_rules == 'Yes' ? 1 : 0,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Savings data added successfully',
            ]);
        }
    }

    public function getSavingData(Request $request)
    {
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'month_year' => 'required',
        ]);

        // Extract month and year from month_year (format: MM-YYYY)
        $monthYear = explode('-', $request->month_year);
        $month = $monthYear[0];
        $year = $monthYear[1];

        $saving = IncomeTaxSaving::where('member_id', $request->member_id)
            ->where('month', $month)
            ->where('year', $year)
            ->first();

        if ($saving) {
            return response()->json([
                'status' => true,
                'data' => $saving,
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'No data found for the selected month and year',
            ]);
        }
    }
}
