<?php

namespace App\Http\Controllers\Frontend\MemberInfo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\MemberGpf;
use App\Models\MemberCredit;


class MemberGpfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::orderBy('id', 'desc')->get();
        $member_gpfs = MemberGpf::orderBy('id', 'desc')->paginate(12);
        return view('frontend.member-info.gpf.list', compact('members','member_gpfs'));
    }

    public function memberGpfCheckSubscription(Request $request)
    {
        
        $subscription_amount = $request->monthly_subscription;
        $member_ids = $request->members;
    
        $errors = [];
        $success = [];
        $members_with_issues = [];
    
        foreach ($member_ids as $member_id) {
            // Fetch member data including name
            $member = Member::where('id', $member_id)->first();
            $member_name = $member ? $member->name : "Unknown Member";
    
            $member_basic = MemberCredit::where('member_id', $member_id)
                                        ->orderBy('id', 'desc')
                                        ->first();
    
            // Error handling if no member_basic found
            if (!$member_basic) {
                $errors[$member_name][] = 'Basic pay information not found.';
                $members_with_issues[] = $member_name;
                continue;
            }
    
            // Validation checks
            if ($member_basic->pay * 0.06 > $subscription_amount) {
                $errors[$member_name][] = 'The Monthly Subscription must be at least 6% of the Basic Pay.';
                $members_with_issues[] = $member_name;
            }
            if ($subscription_amount > $member_basic->pay) {
                $errors[$member_name][] = 'The Monthly Subscription should not exceed the Basic Pay.';
                $members_with_issues[] = $member_name;
            }
            if ($subscription_amount * 12 > 500000) {
                $errors[$member_name][] = 'The total annual subscription (Monthly Subscription x 12) should not exceed 500,000.';
                $members_with_issues[] = $member_name;
            }
    
            // If no errors for this member, add to success
            if (!isset($errors[$member_name])) {
                $success[$member_name] = 'Monthly Subscription is valid';
            }
        }
    
        // Prepare the response based on errors or success
        if (!empty($errors)) {
            return response()->json([
                'errors' => $errors,
                'message' => 'Please review the following employees: ' . implode(', ', array_unique($members_with_issues)),
                'status' => 'error'
            ]);
        } else {
            return response()->json([
                'success' => $success,
                'status' => 'success'
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
            'member_id' => 'required',
            'finantial_year' => 'required',
            'monthly_subscription' => 'required',
            'month' =>'required',
            'openning_balance' => 'required',
            'closing_balance' => 'required',
            'year' => 'required',
        ]);

        $member_gpf = new MemberGpf();
        $member_gpf->member_id = $request->member_id;
        $member_gpf->finantial_year = $request->finantial_year;
        $member_gpf->monthly_subscription = $request->monthly_subscription;
        $member_gpf->month = $request->month;
        $member_gpf->closing_balance = $request->closing_balance;
        $member_gpf->openning_balance = $request->openning_balance;
        $member_gpf->year = $request->year;
        $member_gpf->save();

        session()->flash('message', 'Member Gpf added successfully');
        return response()->json(['success' => 'Member Gpf added successfully']);

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
        //
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
}
