<?php

namespace App\Http\Controllers\Frontend\MemberInfo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\MemberNewspaperAllowance;
use App\Models\Category;
use App\Models\NewspaperAllowance;

class MemberNewspaperAllowanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $members = Member::where('member_status', 1)->whereHas('desigs')->get();
        $categories = Category::orderBy('id', 'desc')->get();
        $member_newspapers = MemberNewspaperAllowance::orderBy('id', 'desc')->paginate(10);
        return view('frontend.member-info.newspaper-allowance.list', compact('members', 'member_newspapers', 'categories'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $member_newspapers = MemberNewspaperAllowance::where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('amount', 'like', '%' . $query . '%')
                    ->orWhere('year', 'like', '%' . $query . '%')
                    ->orWhereHas('member', function ($queryBuilder) use ($query) {
                        $queryBuilder->where('name', 'like', '%' . $query . '%');
                    });
            })
                ->orderBy($sort_by, $sort_type)
                ->paginate(10);

            return response()->json(['data' => view('frontend.member-info.newspaper-allowance.table', compact('member_newspapers'))->render()]);
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
        // Validate incoming request
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'duration' => 'required|in:half_yearly,quarterly',
            'year' => 'required|digits:4|integer|min:1950|max:' . date('Y'),
            'month_duration' => 'required|string',
            'remarks' => 'nullable|string',
        ]);

        // Check for duplicate entry: same member + year + month_duration
        $exists = MemberNewspaperAllowance::where('member_id', $request->member_id)
            ->where('year', $request->year)
            ->where('month_duration', $request->month_duration)
            ->first();

        if ($exists) {
            session()->flash('error', 'An allowance for this member, year, and duration already exists.');
            return response()->json(['message' => 'An allowance for this member, year, and duration already exists.', 'status' => false]);
        }
        $member = Member::findOrFail($request->member_id);

        $newspaper_max_allocation_amount = NewspaperAllowance::where('designation_id', $member->desig)->where('duration', $request->duration)->first()['max_allocation_amount'] ?? 0;
        // dd(NewspaperAllowance::where('designation_id', $member->desig)->where('duration', $request->duration)->first());
        if ($newspaper_max_allocation_amount == 0) {
            session()->flash('error', 'Please add first the monthly duration amount from member management.');
            return response()->json(['message' => 'Please add first the monthly duration amount from member management.', 'status' => false]);
        }

        // Save new record
        $allowance = new MemberNewspaperAllowance();
        $allowance->member_id = $request->member_id;
        $allowance->duration = $request->duration;
        $allowance->year = $request->year;
        $allowance->amount = $newspaper_max_allocation_amount;
        $allowance->month_duration = $request->month_duration;
        $allowance->remarks = $request->remarks;
        $allowance->save();

        session()->flash('message', 'Member newspaper allowance added successfully.');
        return response()->json(['success' => 'Member newspaper allowance added successfully.']);
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
        $member_newspaper = MemberNewspaperAllowance::findOrFail($id);
        $members = Member::where('member_status', 1)->whereHas('desigs')->get();
        $edit = true;

        return response()->json(['view' => view('frontend.member-info.newspaper-allowance.form', compact('member_newspaper', 'edit', 'members'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate incoming request
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'duration' => 'required|in:half_yearly,quarterly',
            'year' => 'required|digits:4|integer|min:1950|max:' . date('Y'),
            'month_duration' => 'required|string',
            'remarks' => 'nullable|string',
        ]);

        // Find the record
        $allowance = MemberNewspaperAllowance::findOrFail($id);

        // Check for duplicate entry (excluding current ID)
        $exists = MemberNewspaperAllowance::where('member_id', $request->member_id)
            ->where('year', $request->year)
            ->where('month_duration', $request->month_duration)
            ->where('id', '!=', $id)
            ->first();

        if ($exists) {
            session()->flash('error', 'An allowance for this member, year, and duration already exists.');
            return response()->json(['error' => 'An allowance for this member, year, and duration already exists.']);
        }

        // Update record
        $allowance->member_id = $request->member_id;
        $allowance->duration = $request->duration;
        $allowance->year = $request->year;
        $allowance->month_duration = $request->month_duration;
        $allowance->remarks = $request->remarks;
        $allowance->save();

        session()->flash('message', 'Member newspaper allowance updated successfully.');
        return response()->json(['success' => 'Member newspaper allowance updated successfully.']);
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
        $allowance = MemberNewspaperAllowance::findOrFail($id);
        $allowance->delete();

        return redirect()->back()->with('message',  'Member newspaper allowance deleted successfully.');
    }
}
