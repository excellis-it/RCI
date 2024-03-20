<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payband;
use App\Models\PaybandType;
use App\Models\Category;
use App\Models\DesignationType;
use App\Models\PayscaleType;


class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payband_types = PaybandType::orderBy('payband_type', 'asc')->get();
        $paybands = Payband::orderBy('id', 'desc')->get();
        $categories = Category::orderBy('id', 'desc')->where('status',1)->get();
        $designation_types = DesignationType::orderBy('id', 'desc')->get();
        $payscale_types = PayscaleType::orderBy('id', 'desc')->get();

        return view('frontend.members.list',compact('paybands', 'payband_types', 'categories', 'designation_types', 'payscale_types'));
    }

    public function editMember()
    {
        return view('frontend.members.edit');
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
