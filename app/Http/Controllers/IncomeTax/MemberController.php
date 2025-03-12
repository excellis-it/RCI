<?php

namespace App\Http\Controllers\IncomeTax;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\PayDetail;
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
}
