<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\NewspaperAllowance;
use App\Models\MemberNewspaperAllowance;
use App\Models\Member;

class NewspaperAllowanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::where('status',1)->get();
        $newspaper_allows = NewspaperAllowance::paginate(10);
        return view('frontend.newspaper-allowance.list',compact('categories','newspaper_allows'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {

            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $newspaper_allows = NewspaperAllowance::where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('max_allocation_amount', 'like', '%' . $query . '%')
                    ->orWhere('remarks', 'like', '%' . $query . '%')
                    ->orWhereHas('category', function ($queryBuilder) use ($query) {
                        $queryBuilder->where('name', 'like', '%' . $query . '%');
                    });
            })
                ->orderBy($sort_by, $sort_type)
                ->paginate(10);
            return response()->json(['data' => view('frontend.newspaper-allowance.table', compact('newspaper_allows'))->render()]);
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
            'category_id' => 'required|unique:newspaper_allowances',
            'max_allocation_amount' => 'required|numeric',
        ]);

        $newspaper_allow = new NewspaperAllowance();
        $newspaper_allow->category_id = $request->category_id;
        $newspaper_allow->max_allocation_amount = $request->max_allocation_amount;
        $newspaper_allow->remarks = $request->remarks;
        $newspaper_allow->save();

        // get all members respect to category
        $members = Member::where('category', $request->category_id)->get();
        foreach ($members as $member) {
            $del_news_allowance = MemberNewspaperAllowance::where('member_id', $member->id)->first();
            if($del_news_allowance){
                $del_news_allowance->delete();
            }

            $member_newspaper_allow = new MemberNewspaperAllowance();
            $member_newspaper_allow->member_id = $member->id;
            $member_newspaper_allow->amount = $request->max_allocation_amount;
            $member_newspaper_allow->year = date('Y');
            $member_newspaper_allow->remarks = $request->remarks;
            $member_newspaper_allow->save();
        }

        session()->flash('message', 'Newspaper added successfully');
        return response()->json(['success' => 'Newspaper added successfully']);
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
        $newspaper_allowance = NewspaperAllowance::findOrFail($id);
        $categories = Category::where('status',1)->get();
        $edit = true;

        return response()->json(['view' => view('frontend.newspaper-allowance.form', compact('newspaper_allowance', 'categories', 'edit'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category_id' => 'required',
            'max_allocation_amount' => 'required|numeric',
        ]);

        $newspaper_allow = NewspaperAllowance::where('id', $id)->first();
        $newspaper_allow->category_id = $request->category_id;
        $newspaper_allow->max_allocation_amount = $request->max_allocation_amount;
        $newspaper_allow->remarks = $request->remarks;
        $newspaper_allow->update();

        // get all members respect to category
        $members = Member::where('category', $request->category_id)->get();
        foreach ($members as $member) {
            $del_news_allowance = MemberNewspaperAllowance::where('member_id', $member->id)->first();
            if($del_news_allowance){
                $del_news_allowance->delete();
            }


            $member_newspaper_allow = new MemberNewspaperAllowance();
            $member_newspaper_allow->member_id = $member->id;
            $member_newspaper_allow->amount = $request->max_allocation_amount;
            $member_newspaper_allow->year = date('Y');
            $member_newspaper_allow->remarks = $request->remarks;
            $member_newspaper_allow->save();
        }

        session()->flash('message', 'Newspaper updated successfully');
        return response()->json(['success' => 'Newspaper updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
