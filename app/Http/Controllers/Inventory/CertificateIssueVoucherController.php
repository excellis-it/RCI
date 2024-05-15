<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\CertificateIssueVoucher;
use App\Models\ItemCode;

class CertificateIssueVoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::all();
        $items = ItemCode::all();
        $certificateIssueVouchers = CertificateIssueVoucher::paginate(10);

        return view('inventory.certificate-issue-vouchers.list', compact('members', 'items', 'certificateIssueVouchers'));

    }

    public function fetchData(Request $request)
    {

        
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $certificateIssueVouchers = CertificateIssueVoucher::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('member_id', 'like', '%' . $query . '%')
                    ->orWhere('item_id', 'like', '%' . $query . '%')
                    ->orWhere('price', 'like', '%' . $query . '%')
                    ->orWhere('item_type', 'like', '%' . $query . '%')
                    ->orWhere('description', 'like', '%' . $query . '%');
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            $members = Member::all();
            $items = ItemCode::all();

            return response()->json(['data' => view('inventory.certificate-issue-vouchers.table', compact('certificateIssueVouchers', 'members', 'items'))->render()]);
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
            'item_id' => 'required',
            'price' => 'required',
            'item_type' => 'required',
            'description' => 'required',
        ]);

        $certificateIssueVoucher = new CertificateIssueVoucher();
        $certificateIssueVoucher->member_id = $request->member_id;
        $certificateIssueVoucher->item_id = $request->item_id;
        $certificateIssueVoucher->price = $request->price;
        $certificateIssueVoucher->item_type = $request->item_type;
        $certificateIssueVoucher->description = $request->description;
        $certificateIssueVoucher->save();

        session()->flash('message', 'Certificate Issue Voucher created successfully');
        return response()->json(['success' => 'Certificate Issue Voucher created successfully']);
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
        $certificateIssueVoucher = CertificateIssueVoucher::findOrFail($id);
        $edit = true;
        $members = Member::all();
        $items = ItemCode::all();

        return response()->json(['view' => view('inventory.certificate-issue-vouchers.form', compact('certificateIssueVoucher', 'edit', 'members', 'items'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'member_id' => 'required',
            'item_id' => 'required',
            'price' => 'required',
            'item_type' => 'required',
            'description' => 'required',
        ]);

        $certificateIssueVoucher = CertificateIssueVoucher::findOrFail($id);
        $certificateIssueVoucher->member_id = $request->member_id;
        $certificateIssueVoucher->item_id = $request->item_id;
        $certificateIssueVoucher->price = $request->price;
        $certificateIssueVoucher->item_type = $request->item_type;
        $certificateIssueVoucher->description = $request->description;
        $certificateIssueVoucher->save();

        session()->flash('message', 'Certificate Issue Voucher updated successfully');
        return response()->json(['success' => 'Certificate Issue Voucher updated successfully']);
    }

    public function getItemType(Request $request)
    {
        $item = ItemCode::findOrFail($request->item_id);
        return response()->json(['item_type' => $item->item_type, 'item_description' => $item->description]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function delete(string $id)
    {
        $certificateIssueVoucher = CertificateIssueVoucher::findOrFail($id);
        $certificateIssueVoucher->delete();

        return redirect()->route('certificate-issue-vouchers.index')->with('message', 'Certificate Issue Voucher deleted successfully');
    }
}
