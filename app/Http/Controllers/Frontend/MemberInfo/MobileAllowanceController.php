<?php

namespace App\Http\Controllers\Frontend\MemberInfo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\MemberLandline;
use App\Models\Designation;
use Illuminate\Validation\Rule;
use App\Models\LandlineAllowance;

class MobileAllowanceController extends Controller
{
    public function index()
    {
        $members = Member::with('desigs')->where('member_status', 1)->get();
        $designations = Designation::orderBy('id', 'desc')->get();
        $landline_allowances = MemberLandline::orderBy('id', 'desc')->paginate(10);
        return view('frontend.member-info.landline-allowance.list', compact('members', 'landline_allowances', 'designations'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby', 'id'); // default fallback
            $sort_type = $request->get('sorttype', 'asc');
            $search = $request->get('query', '');
            $search = str_replace(" ", "%", $search);

            $landline_allowances = MemberLandline::where(function ($queryBuilder) use ($search) {
                $queryBuilder
                    ->where('landline_amount', 'like', '%' . $search . '%')
                    ->orWhere('mobile_amount', 'like', '%' . $search . '%')
                    ->orWhere('broadband_amount', 'like', '%' . $search . '%')
                    ->orWhere('entitle_amount', 'like', '%' . $search . '%')
                    ->orWhere('month', 'like', '%' . $search . '%')
                    ->orWhere('year', 'like', '%' . $search . '%')
                    ->orWhereHas('member', function ($memberQuery) use ($search) {
                        $memberQuery->where('name', 'like', '%' . $search . '%');
                    });
            })
                ->orderBy($sort_by, $sort_type)
                ->paginate(10);

            return response()->json([
                'data' => view('frontend.member-info.landline-allowance.table', compact('landline_allowances'))->render()
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
            'member_id' => 'required|exists:members,id',
            'landline_amount' => 'required|numeric',
            'mobile_amount' => 'required|numeric',
            'broadband_amount' => 'required|numeric',
            'entitle_amount' => 'required|numeric|min:1',
            'month' => 'required|string',
            'year' => 'required|digits:4|integer',
            'member_id' => [
                'required',
                Rule::unique('member_landlines')->where(
                    fn($query) =>
                    $query->where('month', $request->month)
                        ->where('year', $request->year)
                ),
            ],
        ]);

        // Calculate total amount
        $totalAmount = floatval($request->landline_amount) +
            floatval($request->mobile_amount) +
            floatval($request->broadband_amount);
        $date = \Carbon\Carbon::createFromFormat('Y-m-d', $request->year . '-' . $request->month . '-01');


        // Merge total into request data
        $data = $request->all();
        $data['date'] = $date;
        $data['total_amount'] = $totalAmount;

        // Create the record
        MemberLandline::create($data);

        session()->flash('message', 'Member Mobile Amount added successfully');
        return response()->json(['message' => 'Member landline added successfully.']);
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
        $member_landline = MemberLandline::findOrFail($id);
        $members = Member::with('desigs')->orderBy('id', 'asc')->get();
        $designations = Designation::orderBy('id', 'desc')->get();
        $edit = true;

        return response()->json(['view' => view('frontend.member-info.landline-allowance.form', compact('member_landline', 'edit', 'members', 'designations'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */



    public function update(Request $request, $id)
    {
        $memberLandline = MemberLandline::findOrFail($id);

        $request->validate([
            'member_id' => [
                'required',
                'exists:members,id',
                Rule::unique('member_landlines')
                    ->where(function ($query) use ($request) {
                        return $query->where('month', $request->month)
                            ->where('year', $request->year);
                    })
                    ->ignore($memberLandline->id),
            ],
            'landline_amount' => 'required|numeric',
            'mobile_amount' => 'required|numeric',
            'broadband_amount' => 'required|numeric',
            'entitle_amount' => 'required|numeric|min:1',
            'month' => 'required|string',
            'year' => 'required|digits:4|integer',
        ]);

        // Calculate total amount
        $totalAmount =
            floatval($request->landline_amount) +
            floatval($request->mobile_amount) +
            floatval($request->broadband_amount);

        $updateData = $request->only([
            'member_id',
            'landline_amount',
            'mobile_amount',
            'broadband_amount',
            'entitle_amount',
            'month',
            'year',
        ]);
          $date = \Carbon\Carbon::createFromFormat('Y-m-d', $request->year . '-' . $request->month . '-01');

        // If your table has a `total_amount` column
        $updateData['total_amount'] = $totalAmount;
        $updateData['date'] = $date;
        $memberLandline->update($updateData);

        session()->flash('message', 'Member Mobile Allowance updated successfully!');
        return response()->json([
            'message' => 'Member Mobile Allowance updated successfully.',
            'total_amount' => formatIndianCurrency($totalAmount, 2),
        ]);
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getEntitleAmount(Request $request)
    {
        $memberId = $request->member_id;

        // Assuming you can get designation_id from Member model
        $member = Member::find($memberId);
        // dd($member);
        if (!$member || !$member->desig) {
            return response()->json(['entitle_amount' => '0']);
        }

        $allowance = LandlineAllowance::where('designation_id', $member->desig)->first();

        return response()->json([
            'entitle_amount' => $allowance ? $allowance->total_amount_allo : '0'
        ]);
    }
}
