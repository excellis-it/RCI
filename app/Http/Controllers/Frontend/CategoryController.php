<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\DesignationType;
use App\Models\FundType;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\MemberPersonalInfo;
use App\Models\MemberOriginalRecovery;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $designation_types = DesignationType::orderBy('designation_type', 'asc')->get();
        $categories = Category::orderBy('id', 'desc')->paginate(10);
        $fund_typs = FundType::orderBy('id', 'asc')->get();
        return view('frontend.categories.list', compact('categories', 'designation_types', 'fund_typs'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {

            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $categories = Category::where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('category', 'like', '%' . $query . '%')
                    ->orWhereHas('designationType', function ($queryBuilder) use ($query) {
                        $queryBuilder->where('designation_type', 'like', '%' . $query . '%');
                    })
                    ->orWhere('status', '=', $query == 'Active' ? 1 : ($query == 'Inactive' ? 0 : null))
                    ->orWhere('gazetted', '=', $query == 'Gazetted' ? 1 : ($query == 'Non-Gazetted' ? 0 : null));
            })
                ->orderBy($sort_by, $sort_type)
                ->paginate(10);




            return response()->json(['data' => view('frontend.categories.table', compact('categories'))->render()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|unique:categories|max:255',
            // 'designation_type_id' => 'required',
            'gazetted' => 'required',
            'status' => 'required',
            'fund_type' => 'required',
            'med_ins' => 'required|numeric|min:0',
            'wel_sub' => 'required|numeric|min:0',
        ]);

        try {
            DB::beginTransaction();

            $category = new Category();
            $category->category = $request->category;
            // $category->designation_type_id = $request->designation_type_id;
            $category->gazetted = $request->gazetted;
            $category->status = $request->status;
            $category->fund_type = $request->fund_type;
            $category->med_ins = $request->med_ins;
            $category->wel_sub = $request->wel_sub;
            $category->save();


            DB::commit();
            session()->flash('message', 'Category added successfully');
            return response()->json(['success' => 'Category added successfully']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => 'Error adding category: ' . $e->getMessage()], 500);
        }
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
        $designation_types = DesignationType::orderBy('designation_type', 'asc')->get();
        $category = Category::find($id);
        $fund_typs = FundType::orderBy('id', 'asc')->get();
        $edit = true;
        return response()->json(['view' => view('frontend.categories.form', compact('edit', 'category', 'designation_types', 'fund_typs'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category' => 'required|max:255|unique:categories,category,' . $id,
            // 'designation_type_id' => 'required',
            'gazetted' => 'required',
            'status' => 'required',
            'fund_type' => 'required',
            'med_ins' => 'required|numeric|min:0',
            'wel_sub' => 'required|numeric|min:0',
        ]);

        try {
            DB::beginTransaction();

            $category = Category::find($id);
            $oldFundType = $category->fund_type;
            $oldMedIns = $category->med_ins;
            $oldWelSub = $category->wel_sub;

            $category->category = $request->category;
            // $category->designation_type_id = $request->designation_type_id;
            $category->gazetted = $request->gazetted;
            $category->status = $request->status;
            $category->fund_type = $request->fund_type;
            $category->med_ins = $request->med_ins;
            $category->wel_sub = $request->wel_sub;
            $category->save();

            // Update fund_type for all members with this category
            if ($oldFundType != $request->fund_type) {
                $memberIds = Member::where('category', $id)->pluck('id')->toArray();
                if (!empty($memberIds)) {
                    MemberPersonalInfo::whereIn('member_id', $memberIds)
                        ->update(['fund_type' => $request->fund_type]);
                    // also update in members table same col name
                    Member::whereIn('id', $memberIds)
                        ->update(['fund_type' => $request->fund_type]);
                }
            }

            // Update med_ins for all members with this category
            // Only if med_ins is 0 or the same amount for all members
            if ($oldMedIns != $request->med_ins) {
                $memberIds = Member::where('category', $id)->pluck('id')->toArray();
                //  return response()->json(['memberIds' => $memberIds]);
                if (!empty($memberIds)) {
                    // Get members where pg != 1
                    $eligibleMemberIds = Member::whereIn('id', $memberIds)
                        ->where(function ($query) {
                            $query->where('pg', '!=', 1)
                                ->orWhereNull('pg');
                        })
                        ->pluck('id')
                        ->toArray();


                    // Get member_original_recoveries for eligible members
                    $memberRecoveries = MemberOriginalRecovery::whereIn('member_id', $eligibleMemberIds)->get();

                    //  return $memberRecoveries;

                    // Check if all members have the same med_ins value (0 or same amount)
                    $uniqueMedInsValues = $memberRecoveries->pluck('med_ins')->unique();
                    if ($uniqueMedInsValues->count() <= 1 && ($uniqueMedInsValues->isEmpty() || $uniqueMedInsValues->first() == 0 || $uniqueMedInsValues->first() == $oldMedIns)) {
                        MemberOriginalRecovery::whereIn('member_id', $eligibleMemberIds)
                            ->update(['med_ins' => $request->med_ins]);
                    }
                }
            }

            // Update wel_sub for all members with this category
            // Only if wel_sub is 0 or the same amount for all members
            if ($oldWelSub != $request->wel_sub) {
                $memberIds = Member::where('category', $id)->pluck('id')->toArray();
                if (!empty($memberIds)) {
                    $memberRecoveries = MemberOriginalRecovery::whereIn('member_id', $memberIds)->get();

                    // Check if all members have the same wel_sub value (0 or same amount)
                    $uniqueWelSubValues = $memberRecoveries->pluck('wel_sub')->unique();
                    if ($uniqueWelSubValues->count() <= 1 && ($uniqueWelSubValues->isEmpty() || $uniqueWelSubValues->first() == 0 || $uniqueWelSubValues->first() == $oldWelSub)) {
                        MemberOriginalRecovery::whereIn('member_id', $memberIds)
                            ->update(['wel_sub' => $request->wel_sub]);
                    }
                }
            }

            DB::commit();
            session()->flash('message', 'Category updated successfully');
            return response()->json(['success' => 'Category updated successfully']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => 'Error updating category: ' . $e->getMessage()], 500);
        }
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
        $related_members = Member::where('category', $id)->exists();

        if ($related_members) {
            return redirect()->back()->with('error', 'Category is related to members.Please remove the relation first.');
        } else {
            $category = Category::find($id);
            $category->delete();
            return redirect()->back()->with('message', 'Category deleted successfully');
        }
    }
}
