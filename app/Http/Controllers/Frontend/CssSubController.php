<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CssSub;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\MemberOriginalRecovery;

class CssSubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $css_subs = CssSub::with('member')->orderBy('id', 'desc')->paginate(10);
        return view('frontend.css-sub.list', compact('css_subs'));
    }

    /**
     * Get the CSS Sub data for AJAX requests.
     */
    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $css_subs = CssSub::with('member')->orderBy('id', 'desc')->paginate(10);
            return view('frontend.css-sub.table', compact('css_subs'))->render();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pc_no' => 'required|string|max:255|unique:css_subs',
            'member_id' => 'required|exists:members,id',
            'amount' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        }

        $css_sub = new CssSub();
        $css_sub->pc_no = $request->pc_no;
        $css_sub->member_id = $request->member_id;
        $css_sub->amount = $request->amount;
        $css_sub->save();

        $member_original_recovery = MemberOriginalRecovery::where('member_id', $request->member_id)->orderBy('id', 'desc')->first() ?? '';
        if ($member_original_recovery) {
            $member_original_recovery->ccs_sub = $request->amount;
            $member_original_recovery->update();
        }

        return response()->json([
            'status' => 200,
            'message' => 'CSS Sub created successfully!'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $css_sub = CssSub::with('member')->find($id);
        if ($css_sub) {
            return response()->json([
                'status' => 200,
                'css_sub' => $css_sub,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'CSS Sub not found!'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pc_no' => 'required|string|max:255',
            'member_id' => 'required|exists:members,id',
            'amount' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        }

        $css_sub = CssSub::find($request->id);
        if ($css_sub) {
            $css_sub->pc_no = $request->pc_no;
            $css_sub->member_id = $request->member_id;
            $css_sub->amount = $request->amount;
            $css_sub->update();

            $member_original_recovery = MemberOriginalRecovery::where('member_id', $request->member_id)->orderBy('id', 'desc')->first() ?? '';
            if ($member_original_recovery) {
                $member_original_recovery->ccs_sub = $request->amount;
                $member_original_recovery->update();
            }

            return response()->json([
                'status' => 200,
                'message' => 'CSS Sub updated successfully!'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'CSS Sub not found!'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $css_sub = CssSub::find($id);
        if ($css_sub) {
            $css_sub->delete();

            $member_original_recovery = MemberOriginalRecovery::where('member_id', $css_sub->member_id)->orderBy('id', 'desc')->first() ?? '';
            if ($member_original_recovery) {
                $member_original_recovery->ccs_sub = $member_original_recovery->ccs_sub - $css_sub->amount;
                $member_original_recovery->update();
            }

            return response()->json([
                'status' => 200,
                'message' => 'CSS Sub deleted successfully!'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'CSS Sub not found!'
            ]);
        }
    }

    /**
     * Find a member by PC number (pers_no).
     */
    public function findMember(Request $request)
    {
        $pc_no = $request->input('pc_no');

        $member = Member::where('pers_no', $pc_no)->first();

        // return $pc_no;

        if ($member) {
            return response()->json([
                'success' => true,
                'member' => $member
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'No member found with this PC number'
        ]);
    }
}
