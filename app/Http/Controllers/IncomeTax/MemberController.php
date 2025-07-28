<?php

namespace App\Http\Controllers\IncomeTax;

use App\Http\Controllers\Controller;
use App\Models\IncomeTaxArrears;
use App\Models\Member;
use App\Models\PayDetail;
use App\Models\IncomeTaxSaving;
use App\Models\IncomtTaxRent;
use Carbon\Carbon;
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
            ->where(function ($query) use ($startYear, $endYear) {
                $query->where(function ($q) use ($startYear) {
                    $q->whereYear('date', $startYear)
                        ->whereMonth('date', '>=', 3); // March to Dec of start year
                })->orWhere(function ($q) use ($endYear) {
                    $q->whereYear('date', $endYear)
                        ->whereMonth('date', '<=', 2); // Jan and Feb of end year
                });
            })
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
        $inputFields = [
            'member_id',
            'month_year',
            'var_incr',
            'misc',
            'p_tax',
            'hdfc',
            'basic',
            'da',
            'ot',
            'i_tax',
            'd_misc',
            'd_pay',
            'hra',
            'arrears',
            'hba',
            's_pay',
            'cca',
            'gpf',
            'nps_10_rec',
            'npsc',
            'pli',
            'e_pay',
            'tpt',
            'da_tpt',
            'cgeis',
            'lic',
            'add_incr',
            'dis_alw',
            'cghs',
            'eol_hpl'
        ];

        $rules = [
            'member_id'  => 'required|exists:members,id',
            'month_year' => 'required', // MM-YYYY format
            'basic'      => 'required|numeric',
        ];

        foreach (array_diff($inputFields, ['member_id', 'month_year', 'basic']) as $field) {
            $rules[$field] = 'nullable|numeric';
        }

        $validated = $request->validate($rules);

        // Parse month & year
        [$month, $year] = explode('-', $validated['month_year']);
        $date = \Carbon\Carbon::createFromFormat('m-Y', $validated['month_year'])->startOfMonth();

        // First or new
        $payDetail = PayDetail::firstOrNew([
            'member_id' => $validated['member_id'],
            'month'     => $month,
            'year'      => $year,
        ]);

        // Fill validated fields
        $payDetail->fill(array_intersect_key($validated, array_flip($inputFields)));
        $payDetail->month = $month;
        $payDetail->year = $year;
        $payDetail->date = $date;

        $payDetail->save();

        return response()->json([
            'success' => true,
            'message' => 'Salary details saved successfully',
            'data'    => $payDetail
        ]);
    }



    public function savingStore(Request $request)
    {
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'financial_year' => 'required',
        ]);

        // dd($request->all());

        $data = $request->only([
            'financial_year',
            'annual_rent',
            'ph_disable',
            'fd_int',
            'nsc_ctd',
            't_fee',
            'hba_int',
            'edu_loan_int',
            'nscint',
            'hba_prncpl',
            'ohters_s',
            'hba_int_80ee',
            'others_d',
            'letout',
            'pli',
            'infa_bond',
            'ac_int_80tta',
            'pension',
            'js_sukanya',
            'nsdl',
            'med_trt',
            'equity_mf',
            'ppf',
            'lic',
            'sec_89',
            'cancer',
            'cancer_amount',
            'cea',
            'bonds',
            'ulip',
            'ph',
            'med_ins_80d',
            'med_ins',
            'med_ins_senior_dependent',
            'cancer_80ddb_senior_dependent',
            'med_tri_80dd_disability',
            'ph_disable_80u_disability',
            'it_rules'
        ]);

        // Convert checkboxes/select values to boolean
        $data['med_ins_80d'] = $request->med_ins_80d == 'Yes' ? 1 : 0;
        $data['med_ins_senior_dependent'] = $request->med_ins == 'Yes' ? 1 : 0;
        $data['cancer_80ddb_senior_dependent'] = $request->cancer == 'Yes' ? 1 : 0;
        $data['med_tri_80dd_disability'] = $request->med_tri == 'Yes' ? 1 : 0;
        $data['ph_disable_80u_disability'] = $request->server_dis == 'Yes' ? 1 : 0;
        $data['it_rules'] = $request->it_rules == 'Yes' ? 1 : 0;

        $data['member_id'] = $request->member_id;
        // $data['month'] = $month;
        // $data['year'] = $year;

        $existingSaving = IncomeTaxSaving::where('member_id', $request->member_id)
            ->where('financial_year', $request->financial_year)
            ->first();

        if ($existingSaving) {
            $existingSaving->update($data);
            return response()->json([
                'status' => true,
                'message' => 'Savings data updated successfully',
            ]);
        } else {
            IncomeTaxSaving::create($data);
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
            'financial_year' => 'required',
        ]);

        // Extract month and year from month_year (format: MM-YYYY)
        $financial_year = $request->financial_year;
        $saving = IncomeTaxSaving::where('member_id', $request->member_id)
            ->where('financial_year', $financial_year)
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

        // Expected format: "2025-2026"
        $years = explode('-', $financialYear);
        if (count($years) !== 2) {
            return response()->json(['status' => false, 'message' => 'Invalid financial year format'], 400);
        }

        $startYear = (int) trim($years[0]); // e.g., 2025
        $endYear = (int) trim($years[1]);   // e.g., 2026

        // Define full date range: from March 1st of startYear to February end of endYear
        $startDate = Carbon::create($startYear, 3, 1)->startOfDay();  // 01-03-2025
        $endDate = Carbon::create($endYear, 2, 28)->endOfDay();       // 28-02-2026 (or 29 if leap year)

        // Adjust for leap year if needed
        if (checkdate(2, 29, $endYear)) {
            $endDate = Carbon::create($endYear, 2, 29)->endOfDay();
        }

        // Fetch arrears for the member within this date range
        $arrears = IncomeTaxArrears::where('member_id', $request->member_id)
            ->where(function ($query) use ($startYear, $endYear) {
                $query->where(function ($q) use ($startYear) {
                    $q->whereYear('date', $startYear)
                        ->whereMonth('date', '>=', 3); // March to Dec of start year
                })->orWhere(function ($q) use ($endYear) {
                    $q->whereYear('date', $endYear)
                        ->whereMonth('date', '<=', 2); // Jan and Feb of end year
                });
            })
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
