<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\AutoRun\MemberPayGenerate;
use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComputeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::orderBy('id', 'asc')->where('name', '!=', 'The Director, CHESS')->with('designation')->get();
        $categories = DB::table('categories')->get();
        return view('frontend.computes.list', compact('members', 'categories'));
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
            'generate_by' => 'required|in:member,category',
            'month' => 'required',
            'year' => 'required',
            'member_id' => 'required_if:generate_by,member',
            'category_id' => 'required_if:generate_by,category',
        ], [
            'generate_by.required' => 'Please select whether to generate data by Member or Category.',
            'month.required' => 'Month is required.',
            'year.required' => 'Year is required.',
            'member_id.required_if' => 'Please select a Member.',
            'category_id.required_if' => 'Please select a Category.',
        ]);

        // Call the method and capture the response
        $response = (new MemberPayGenerate())->paygenerate(
            $request->month,
            $request->year,
            $request->generate_by,
            $request->member_id,
            $request->category_id
        );

        // If JSON response returned, check status
        if ($response instanceof \Illuminate\Http\JsonResponse) {
            $data = $response->getData();
            if (isset($data->status) && $data->status === false) {
                return response()->json([
                    'status' => false,
                    'message' => $data->message
                ]);
            }
        }
        session()->flash('message', 'Data generated successfully.');
        return response()->json([
            'status' => true,
            'message' => 'Data generated successfully.'
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
