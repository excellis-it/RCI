<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentCategory;
use App\Models\ChequePayment;
use App\Models\ResetVoucher;

class ChequePaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paymentCategories = PaymentCategory::where('status', 1)->orderBy('id', 'desc')->get();
        $chequePayments = ChequePayment::orderBy('id', 'desc')->paginate(10);
        return view('frontend.public-fund.cheque-payment.list', compact('chequePayments', 'paymentCategories'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $paymentCategories = PaymentCategory::where('status', 1)->orderBy('id', 'desc')->get();
        $chequePayment = ChequePayment::latest()->first();
        $voucherText = ResetVoucher::where('status', 1)->first();
        return view('frontend.public-fund.cheque-payment.form', compact('paymentCategories', 'chequePayment','voucherText'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $chequePayments = ChequePayment::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('vr_no', 'like', '%' . $query . '%')
                    ->orWhere('vr_date', 'like', '%' . $query . '%')
                    ->orWhere('amount', 'like', '%' . $query . '%')
                    ->orWhere('sr_no', 'like', '%' . $query . '%')
                    ->orWhere('name', 'like', '%' . $query . '%')
                    ->orWhere('designation', 'like', '%' . $query . '%')
                    ->orWhere('bill_ref', 'like', '%' . $query . '%')
                    ->orWhere('bank_account', 'like', '%' . $query . '%')
                    ->orWhere('dv_no', 'like', '%' . $query . '%')
                    ->orWhere('cheque_no', 'like', '%' . $query . '%')
                    ->orWhere('cheque_date', 'like', '%' . $query . '%')
                    ->orWhere('narration', 'like', '%' . $query . '%')
                    ->orWhere('category', 'like', '%' . $query . '%');
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('frontend.public-fund.cheque-payment.table', compact('chequePayments'))->render()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'vr_no' => 'required',
        //     'vr_date' => 'required',
        //     'amount' => 'required',
        //     'rct_no' => 'required',
        //     'form' => 'required',
        //     'details' => 'required',
        //     'name' => 'required',
        //     'category' => 'required',
        // ]);

        $chequePayment = new ChequePayment();
        $chequePayment->vr_no = $request->vr_no;
        $chequePayment->vr_date = $request->vr_date;
        $chequePayment->sr_no = $request->sr_no;
        $chequePayment->amount = $request->amount;
        $chequePayment->name = $request->name;
        $chequePayment->designation = $request->designation;
        $chequePayment->bill_ref = $request->bill_ref;
        $chequePayment->bank_account = $request->bank_account;
        $chequePayment->dv_no = $request->dv_no;
        $chequePayment->cheque_no = $request->cheque_no;
        $chequePayment->cheque_date = $request->cheque_date;
        $chequePayment->narration = $request->narration;
        $chequePayment->category = $request->category;
        $chequePayment->save();

        return redirect()->route('cheque-payments.index')->with('success', 'Cheque Payment created successfully.');
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
        $paymentCategories = PaymentCategory::where('status', 1)->orderBy('id', 'desc')->get();
        $chequePayment = ChequePayment::findOrFail($id);
        $edit = true;
        return view('frontend.public-fund.cheque-payment.form', compact('paymentCategories', 'chequePayment', 'edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $request->validate([
        //     'vr_no' => 'required',
        //     'vr_date' => 'required',
        //     'amount' => 'required',
        //     'rct_no' => 'required',
        //     'form' => 'required',
        //     'details' => 'required',
        //     'name' => 'required',
        //     'category' => 'required',
        // ]);

        $chequePayment = ChequePayment::findOrFail($id);
        $chequePayment->vr_no = $request->vr_no;
        $chequePayment->vr_date = $request->vr_date;
        $chequePayment->sr_no = $request->sr_no;
        $chequePayment->amount = $request->amount;
        $chequePayment->name = $request->name;
        $chequePayment->designation = $request->designation;
        $chequePayment->bill_ref = $request->bill_ref;
        $chequePayment->bank_account = $request->bank_account;
        $chequePayment->dv_no = $request->dv_no;
        $chequePayment->cheque_no = $request->cheque_no;
        $chequePayment->cheque_date = $request->cheque_date;
        $chequePayment->narration = $request->narration;
        $chequePayment->category = $request->category;
        $chequePayment->save();

        return redirect()->route('cheque-payments.index')->with('success', 'Cheque Payment updated successfully.');
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
        $chequePayment = ChequePayment::findOrFail($id);
        $chequePayment->delete();
        return redirect()->route('cheque-payments.index')->with('success', 'Cheque Payment deleted successfully.');
    }
}
