<?php

namespace App\Http\Controllers\IncomeTax;

use App\Http\Controllers\Controller;
use App\Models\IncomeTaxArrears;
use App\Models\Member;
use App\Models\PayDetail;
use App\Models\IncomeTaxSaving;
use App\Models\IncomtTaxRent;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::orderBy('id', 'asc')->where('name', '!=', 'The Director, CHESS')->with('designation')->paginate(15);


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
        // Get member details
        $member = Member::with('designation', 'divisions', 'groups')->where('id', $id)->first();

        // Get current financial year
        $currentMonth = date('m');
        $currentYear = date('Y');

        if ($currentMonth >= 4) {
            $startYear = $currentYear;
            $endYear = $currentYear + 1;
        } else {
            $startYear = $currentYear - 1;
            $endYear = $currentYear;
        }

        $financialYear = "$startYear-$endYear";

        // Fetch rent details for the financial year
        $rents = IncomtTaxRent::where('member_id', $id)
            ->where(function ($query) use ($startYear, $endYear) {
                $query->where(function ($q) use ($startYear) {
                    $q->whereIn('month', ['03', '04', '05', '06', '07', '08', '09', '10', '11', '12'])
                        ->where('year', $startYear);
                })->orWhere(function ($q) use ($endYear) {
                    $q->whereIn('month', ['01', '02'])
                        ->where('year', $endYear);
                });
            })
            ->get();

        $arrears = IncomeTaxArrears::where('member_id', $id)
            ->whereYear('date', '>=', $startYear)
            ->whereYear('date', '<=', $endYear)
            ->get();

        return view('income-tax.members.edit', compact('member', 'financialYear', 'rents', 'arrears'));
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


    public function getPayDetails(Request $request)
    {
        $monthYear = $request->input('month_year');
        $explode = explode('-', $monthYear);
        $payDetail = PayDetail::where('month', $explode[0])
            ->where('year', $explode[1])
            ->where('member_id', $request->input('member_id'))
            ->first();
        // dd($explode[0], $explode[1]);

        if ($payDetail) {
            return response()->json(['success' => true, 'data' => $payDetail]);
        } else {
            return response()->json(['success' => false, 'message' => 'No data found']);
        }
    }



    public function payDetailsStore(Request $request)
    {
        // Validate inputs
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'month_year' => 'required', // Ensures format MM-YYYY
            'var_incr' => 'nullable|numeric',
            'misc' => 'nullable|numeric',
            'p_tax' => 'nullable|numeric',
            'hdfc' => 'nullable|numeric',
            'basic' => 'required|numeric',
            'da' => 'nullable|numeric',
            'ot' => 'nullable|numeric',
            'i_tax' => 'nullable|numeric',
            'd_misc' => 'nullable|numeric',
            'd_pay' => 'nullable|numeric',
            'hra' => 'nullable|numeric',
            'arrears' => 'nullable|numeric',
            'hba' => 'nullable|numeric',
            'gmc' => 'nullable|numeric',
            's_pay' => 'nullable|numeric',
            'cca' => 'nullable|numeric',
            'gpf' => 'nullable|numeric',
            'pli' => 'nullable|numeric',
            'e_pay' => 'nullable|numeric',
            'tpt' => 'nullable|numeric',
            'cgeis' => 'nullable|numeric',
            'lic' => 'nullable|numeric',
            'add_incr' => 'nullable|numeric',
            'wash_ajw' => 'nullable|numeric',
            'cghs' => 'nullable|numeric',
            'eol_hpl' => 'nullable|numeric',
        ]);

        // Extract month and year from month_year (format: MM-YYYY)
        [$month, $year] = explode('-', $request->month_year);

        // Check if record already exists
        $payDetail = PayDetail::firstOrNew([
            'member_id' => $request->member_id,
            'month' => $month,
            'year' => $year
        ]);

        // Fill the attributes dynamically
        $payDetail->fill($request->except(['month_year']));

        // Save the record
        $payDetail->save();

        return response()->json([
            'success' => true,
            'message' => 'Salary details saved successfully',
            'data' => $payDetail
        ]);
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


    public function getRentData(Request $request)
    {
        $financialYear = $request->input('financial_year');

        if (!$financialYear) {
            return response()->json(['rents' => []]);
        }

        $years = explode("-", $financialYear);
        $startYear = (int) $years[0];
        $endYear = (int) $years[1];

        $rents = IncomtTaxRent::where('member_id', $request->member_id)->where(function ($query) use ($startYear, $endYear) {
            $query->where(function ($q) use ($startYear) {
                $q->whereIn('month', ['03', '04', '05', '06', '07', '08', '09', '10', '11', '12'])
                    ->where('year', $startYear);
            })->orWhere(function ($q) use ($endYear) {
                $q->whereIn('month', ['01', '02'])
                    ->where('year', $endYear);
            });
        })
            ->orderBy('year')
            ->orderBy('month')
            ->get();

        return response()->json(['rents' => $rents]);
    }


    public function rent_store(Request $request)
    {
        $validated = $request->validate([
            'member_id' => 'required|exists:members,id',
            'month' => 'required||max:12',
            'year' => 'required',
            'rent' => 'required|numeric|min:0',
        ]);

        $rent = IncomtTaxRent::create($validated);

        return response()->json([
            'success' => true,
            'rent' => $rent
        ]);
    }

    public function rent_update(Request $request)
    {
        $validated = $request->validate([
            'rent_id' => 'required|exists:incomt_tax_rents,id',
            'rent' => 'required|numeric|min:0',
        ]);

        $rent = IncomtTaxRent::find($request->rent_id);
        $rent->rent = $request->rent;
        $rent->save();

        return response()->json([
            'success' => true,
            'rent' => $rent
        ]);
    }

    public function rent_delete(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:incomt_tax_rents,id',
        ]);

        $rent = IncomtTaxRent::find($request->id);
        $rent->delete();

        return response()->json([
            'success' => true,
            'message' => 'Rent record deleted successfully'
        ]);
    }

    public function arrears_store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'name' => 'required|string',
            'amt' => 'required|numeric',
            'cps' => 'nullable|numeric',
            'i_tax' => 'nullable|numeric',
            'cghs' => 'nullable|numeric',
            'gmc' => 'nullable|numeric',
        ]);

        $arrear = IncomeTaxArrears::create($request->all());

        return response()->json([
            'success' => true,
            'data' => [
                'id' => $arrear->id,
                'date' => \Carbon\Carbon::parse($arrear->date)->format('d/m/Y'),
                'name' => $arrear->name,
                'amt' => $arrear->amt,
                'cps' => $arrear->cps,
                'i_tax' => $arrear->i_tax,
                'cghs' => $arrear->cghs,
                'gmc' => $arrear->gmc,
            ]
        ]);
    }

    public function arrearsFetchData(Request $request)
    {
        $financialYear = $request->input('financial_year');

        if (!$financialYear) {
            return response()->json(['status' => false, 'message' => 'Financial year is required'], 400);
        }

        // Extract start and end year from the financial year (e.g., "2023-2024")
        $years = explode('-', $financialYear);
        if (count($years) !== 2) {
            return response()->json(['status' => false, 'message' => 'Invalid financial year format'], 400);
        }

        $startYear = (int) trim($years[0]);
        $endYear = (int) trim($years[1]);

        // Fetch arrears data within the financial year range
        $arrears = IncomeTaxArrears::where('member_id', $request->member_id)->whereYear('date', '>=', $startYear)
            ->whereYear('date', '<=', $endYear)
            ->orderBy('date', 'asc')
            ->get();

        return response()->json([
            'status' => true,
            'arrears' => $arrears
        ]);
    }

    public function arrearsDestroy($id)
    {
        $arrear = IncomeTaxArrears::find($id);

        if (!$arrear) {
            return response()->json(['success' => false, 'message' => 'Record not found'], 404);
        }

        $arrear->delete();

        return response()->json(['success' => true, 'message' => 'Record deleted successfully']);
    }


    public function arrearsEdit($id)
    {
        $arrear = IncomeTaxArrears::find($id);
        if (!$arrear) {
            return response()->json(['success' => false, 'message' => 'Record not found']);
        }

        return response()->json(['success' => true, 'data' => $arrear]);
    }


    public function arrears_update(Request $request, $id)
    {
        $validated = $request->validate([
            'arrear_id' => 'required|exists:income_tax_arrears,id',
            'date' => 'required|date',
            'name' => 'required|string',
            'amt' => 'required|numeric',
            'cps' => 'nullable|numeric',
            'i_tax' => 'nullable|numeric',
            'cghs' => 'nullable|numeric',
            'gmc' => 'nullable|numeric',
        ]);

        $arrear = IncomeTaxArrears::findOrFail($id);
        $arrear->update($validated);

        return response()->json(['success' => true, 'data' => $arrear]);
    }
}
