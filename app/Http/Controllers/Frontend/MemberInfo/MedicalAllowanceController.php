<?php

namespace App\Http\Controllers\Frontend\MemberInfo;

use App\Http\Controllers\Controller;
use App\Models\MedicalAllowance;
use App\Models\Member;
use Illuminate\Http\Request;

class MedicalAllowanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::where('member_status', 1)->whereHas('desigs')->get();
        $medical_allowances = MedicalAllowance::orderBy('id', 'desc')->paginate(10);
        return view('frontend.member-info.medical-allowance.list', compact('members', 'medical_allowances'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);

            $medical_allowances = MedicalAllowance::where(function ($q) use ($query) {
                $q->where('bill_no', 'like', '%' . $query . '%')
                    ->orWhere('type', 'like', '%' . $query . '%')
                    ->orWhere('type_number', 'like', '%' . $query . '%')
                    ->orWhere('treatment_for', 'like', '%' . $query . '%')
                     ->orWhere('patient_name', 'like', '%' . $query . '%')
                    ->orWhere('name_of_hospital', 'like', '%' . $query . '%')
                    ->orWhere('amount_claimed', 'like', '%' . $query . '%')
                    ->orWhere('total_adv_amount_given', 'like', '%' . $query . '%')
                    ->orWhere('amount_passed', 'like', '%' . $query . '%')
                    ->orWhere('amount_disallowed', 'like', '%' . $query . '%')
                    ->orWhereHas('member', function ($memberQuery) use ($query) {
                        $memberQuery->where('name', 'like', '%' . $query . '%');
                    });
            })
                ->orderBy($sort_by, $sort_type)
                ->paginate(10);

            return response()->json([
                'data' => view('frontend.member-info.medical-allowance.table', compact('medical_allowances'))->render()
            ]);
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
            'patient_name' => 'required',
            'name_of_hospital' => 'nullable',
            'bill_no' => 'required',
            'bill_date' => 'required|date',
            'type' => 'nullable|string',
            'type_number' => 'nullable|string',
            'member_id' => 'required|exists:members,id',
            'treatment_for' => 'nullable|string',
            'amount_claimed' => 'required|numeric',
            'total_adv_amount_given' => 'nullable|numeric',
            'amount_passed' => 'nullable|numeric',
            'amount_disallowed' => 'nullable|numeric',
        ]);

        // Duplicate check
        $exists = MedicalAllowance::where('bill_no', $request->bill_no)
            ->where('bill_date', $request->bill_date)
            ->where('member_id', $request->member_id)
            ->exists();

        if ($exists) {
            return response()->json([
                'status' => false,
                'message' => 'Duplicate entry for this Bill No and Bill Date.',
            ]);
        }

        $medical = MedicalAllowance::create($request->all());

        session()->flash('message', 'Medical Allowance added successfully.');
        return response()->json([
            'status' => true,
            'message' => 'Medical Allowance added successfully.',
            'data' => $medical,
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
        $medicalAllowance = MedicalAllowance::findOrFail($id);
        $members = Member::with('desigs')->orderBy('id', 'asc')->where('member_status', 1)->whereHas('desigs')->get();
        $edit = true;

        return response()->json(['view' => view('frontend.member-info.medical-allowance.form', compact('medicalAllowance', 'edit', 'members'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
              'patient_name' => 'required',
            'name_of_hospital' => 'nullable',
            'bill_no' => 'required',
            'bill_date' => 'required|date',
            'type' => 'nullable|string',
            'type_number' => 'nullable|string',
            'member_id' => 'required|exists:members,id',
            'treatment_for' => 'nullable|string',
            'amount_claimed' => 'required|numeric',
            'total_adv_amount_given' => 'nullable|numeric',
            'amount_passed' => 'nullable|numeric',
            'amount_disallowed' => 'nullable|numeric',
        ]);

        $medical = MedicalAllowance::findOrFail($id);

        // Duplicate check (excluding current record)
        $duplicate = MedicalAllowance::where('bill_no', $request->bill_no)
            ->where('bill_date', $request->bill_date)
            ->where('member_id', $request->member_id)
            ->where('id', '!=', $medical->id)
            ->exists();

        if ($duplicate) {
            return response()->json([
                'status' => false,
                'message' => 'Duplicate entry for this Bill No and Bill Date.',
            ]);
        }

        $medical->update($request->all());
        session()->flash('message', 'Medical Allowance updated successfully.');
        return response()->json([
            'status' => true,
            'message' => 'Medical Allowance updated successfully.',
            'data' => $medical,
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function delete($id)
    {
        MedicalAllowance::findOrFail($id)->delete();
        return redirect()->back()->with('message',  'Medical Allowance deleted successfully.');
    }
}
