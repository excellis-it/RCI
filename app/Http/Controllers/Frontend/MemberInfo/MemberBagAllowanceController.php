<?php

namespace App\Http\Controllers\Frontend\MemberInfo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\MemberBagPurse;
use App\Models\BagPurse;

class MemberBagAllowanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::where('member_status', 1)->whereHas('desigs')->get();
        $member_bag_purses = MemberBagPurse::orderBy('id', 'desc')->paginate(10);
        return view('frontend.member-info.bag-allowance.list', compact('members', 'member_bag_purses'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $member_bag_purses = MemberBagPurse::where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('entitle_amount', 'like', '%' . $query . '%')
                    ->orWhere('year', 'like', '%' . $query . '%')
                    ->orWhere('month', 'like', '%' . $query . '%')
                    ->orWhere('bill_amount', 'like', '%' . $query . '%')
                    ->orWhere('net_amount', 'like', '%' . $query . '%')
                    ->orWhere('remarks', 'like', '%' . $query . '%')
                    ->orWhereHas('member', function ($queryBuilder) use ($query) {
                        $queryBuilder->where('name', 'like', '%' . $query . '%');
                    });
            })
                ->orderBy($sort_by, $sort_type)
                ->paginate(10);

            return response()->json(['data' => view('frontend.member-info.bag-allowance.table', compact('member_bag_purses'))->render()]);
        }
    }

    public function fetchBagAllotment(Request $request)
    {
        if ($request->ajax()) {
            $member_id = $request->get('member_id');
            $member = Member::where('id', $member_id)->first();
            $member_bag_purses_allow = BagPurse::where('designation_id', $member->desig)->orderBy('id', 'desc')->first()['entitle_amount'] ?? 0;

            return response()->json(['data' => $member_bag_purses_allow]);
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
            'member_id' => 'required',
            'entitle_amount' => 'required',
            'bill_amount' => 'required',
            'net_amount' => 'required',
            'year' => 'required',
            'month' => 'required',
            // 'remarks' => 'required',
        ]);

        // Check for duplicate entry
        $exists = MemberBagPurse::where('member_id', $request->member_id)
            ->where('year', $request->year)
            ->where('month', $request->month)
            ->exists();

        if ($exists) {
            return response()->json([
                'message' => 'Record already exists for this member, year, and month.',
                'status' => false
            ]); // 409 Conflict
        }

        // Save new record
        $add_member_bag_purses = new MemberBagPurse();
        $add_member_bag_purses->member_id = $request->member_id;
        $add_member_bag_purses->entitle_amount = $request->entitle_amount;
        $add_member_bag_purses->bill_amount = $request->bill_amount;
        $add_member_bag_purses->net_amount = $request->net_amount;
        $add_member_bag_purses->year = $request->year;
        $add_member_bag_purses->month = $request->month;
        $add_member_bag_purses->remarks = $request->remarks;
        $add_member_bag_purses->save();

        session()->flash('message', 'Member bag-purse amount added successfully');
        return response()->json(['success' => 'Member bag-purse amount added successfully']);
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
        $member_bag_purse = MemberBagPurse::findOrFail($id);
        $members = Member::with('desigs')->orderBy('id', 'asc')->where('member_status', 1)->whereHas('desigs')->get();
        $edit = true;

        return response()->json(['view' => view('frontend.member-info.bag-allowance.form', compact('member_bag_purse', 'edit', 'members'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'member_id' => 'required',
            'entitle_amount' => 'required',
            'bill_amount' => 'required',
            'net_amount' => 'required',
            'year' => 'required',
            'month' => 'required',
            // 'remarks' => 'required',
        ]);

        // Check if the record exists
        $memberBagPurse = MemberBagPurse::findOrFail($id);

        // Check for duplicate entry (excluding current record)
        $duplicate = MemberBagPurse::where('member_id', $request->member_id)
            ->where('year', $request->year)
            ->where('month', $request->month)
            ->where('id', '!=', $id)
            ->exists();

        if ($duplicate) {
            return response()->json([
                'message' => 'Another record already exists for this member, year, and month.',
                'status' => false
            ]);
        }

        // Update the record
        $memberBagPurse->member_id = $request->member_id;
        $memberBagPurse->entitle_amount = $request->entitle_amount;
        $memberBagPurse->bill_amount = $request->bill_amount;
        $memberBagPurse->net_amount = $request->net_amount;
        $memberBagPurse->year = $request->year;
        $memberBagPurse->month = $request->month;
        $memberBagPurse->remarks = $request->remarks;
        $memberBagPurse->save();

        session()->flash('message', 'Member bag-purse amount updated successfully');
        return response()->json(['success' => 'Member bag-purse amount updated successfully']);
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
        MemberBagPurse::findOrFail($id)->delete();
        return redirect()->back()->with('message',  'Member bag purse allowance deleted successfully.');
    }
}
