<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\PmLevel;
use Illuminate\Http\Request;
use App\Models\Tpta;
use App\Models\DearnessAllowancePercentage;
use App\Models\Member;
use App\Models\MemberCredit;
use App\Models\MemberMonthlyDataCredit;

class TptaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tptas = Tpta::orderBy('id', 'desc')->paginate(10);
        $payLevels = PmLevel::all();

        return view('frontend.tptas.list', compact('tptas', 'payLevels'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $tptas = Tpta::where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('tpt_type', 'like', '%' . $query . '%')
                    ->orWhere('status', '=', $query == 'Active' ? 1 : ($query == 'Inactive' ? 0 : null));
            })
                ->orderBy($sort_by, $sort_type)
                ->paginate(10);

            $payLevels = PmLevel::all();

            return response()->json(['data' => view('frontend.tptas.table', compact('tptas', 'payLevels'))->render()]);
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
            'pay_level_id' => 'required',
            'tpt_type' => 'required',
            'tpt_allowance' => 'required',
            'tpt_da' => 'required',
        ]);

        $lastTptaData = Tpta::where('tpt_type', $request->tpt_type)->where('pay_level_id', $request->pay_level_id)->latest()->first();

        $tpta = new Tpta();
        $tpta->pay_level_id = $request->pay_level_id;
        $tpta->tpt_type = $request->tpt_type;
        $tpta->tpt_allowance = $request->tpt_allowance;
        $tpta->tpt_da = $request->tpt_da;
        $tpta->status = $request->status;
        $tpta->save();

        // update the old datas inactive
        if ($lastTptaData && $request->status == 1) {
            $lastTptaData->status = 0;
            $lastTptaData->update();

            $current_month = date('m');
            $current_year = date('Y');
            $records = MemberMonthlyDataCredit::whereHas('member', function ($query) use ($tpta) {
                $query->where('pm_level', $tpta->pay_level_id);
            })
                ->where(function ($query) use ($current_month, $current_year) {
                    $query->where('year', '>', $current_year)
                        ->orWhere(function ($q) use ($current_month, $current_year) {
                            $q->where('year', $current_year)
                                ->where('month', '>=', $current_month);
                        });
                })
                ->get();

            foreach ($records as $record) {
                $record->tpt = $request->tpt_allowance;
                $record->da_on_tpt = $request->tpt_da; // da_on_tpt set based on TPT value
                $record->tot_credits = (($record->tot_credits -  $record->tpt) - $record->da_on_tpt) + ($request->tpt_allowance + $request->tpt_da);
                $record->save();
                Helper::updateTotalCredit($record->member_id, $current_month, $current_year);
                Helper::updateTotalDebit($record->member_id, $current_month, $current_year);
            }
        }

        $members = Member::where('pm_level', $request->pay_level_id)->pluck('id');
        MemberCredit::whereIn('member_id', $members)->update([
            'tpt' => $request->tpt_allowance,
            'da_on_tpt' => $request->tpt_da,
        ]);

        session()->flash('message', 'TPTA created successfully');
        return response()->json(['success' => 'TPTA created successfully']);
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
        $tpta = Tpta::findOrFail($id);
        $payLevels = PmLevel::all();
        $edit = true;

        return response()->json(['view' => view('frontend.tptas.form', compact('tpta', 'payLevels', 'edit'))->render(), 'tpta' => $tpta]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'pay_level_id' => 'required',
            'tpt_type' => 'required',
            'tpt_allowance' => 'required',
            'tpt_da' => 'required',
        ]);

        $tpta = Tpta::findOrFail($id);
        $tpta->pay_level_id = $request->pay_level_id;
        $tpta->tpt_type = $request->tpt_type;
        $tpta->tpt_allowance = $request->tpt_allowance;
        $tpta->tpt_da = $request->tpt_da;
        $tpta->status = $request->status;
        $tpta->update();


        $members = Member::where('pm_level', $request->pay_level_id)->pluck('id');
        $current_month = date('m');
        $current_year = date('Y');
        $records = MemberMonthlyDataCredit::whereHas('member', function ($query) use ($tpta) {
            $query->where('pm_level', $tpta->pay_level_id);
        })
            ->where(function ($query) use ($current_month, $current_year) {
                $query->where('year', '>', $current_year)
                    ->orWhere(function ($q) use ($current_month, $current_year) {
                        $q->where('year', $current_year)
                            ->where('month', '>=', $current_month);
                    });
            })
            ->get();

        foreach ($records as $record) {
            $record->tpt = $request->tpt_allowance;
            $record->da_on_tpt = $request->tpt_da; // da_on_tpt set based on TPT value
            $record->tot_credits = (($record->tot_credits -  $record->tpt) - $record->da_on_tpt) + ($request->tpt_allowance + $request->tpt_da);
            $record->save();

            Helper::updateTotalCredit($record->member_id, $current_month, $current_year);
            Helper::updateTotalDebit($record->member_id, $current_month, $current_year);
        }


        session()->flash('message', 'TPTA updated successfully');
        return response()->json(['success' => 'TPTA updated successfully']);
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
        $tpta = Tpta::findOrFail($id);
        $tpta->delete();

        return redirect()->back()->with('message', 'TPTA deleted successfully');
    }

    public function daPercentageCalculation(Request $request)
    {
        $daPercentage = DearnessAllowancePercentage::where('is_active', 1)->first();
        $allowance = $request->allowance;

        $daAmount = $allowance * $daPercentage->percentage / 100;

        return response()->json(['tpt_da' => $daAmount]);
    }
}