<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CashPayment;
use Illuminate\Http\Request;
use App\Models\PaymentCategory;
use App\Models\ResetVoucher;
use Illuminate\Support\Str;

class CashPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cashPayments = CashPayment::orderBy('id', 'desc')->paginate(10);
        $paymentCategories = PaymentCategory::where('status', 1)->orderBy('id', 'desc')->get();
        return view('frontend.public-fund.cash-payment.list', compact('cashPayments', 'paymentCategories'));
    }

    public function fetchData(Request $request)
    {
        
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $cashPayments = CashPayment::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('vr_no', 'like', '%' . $query . '%')
                    ->orWhere('vr_date', 'like', '%' . $query . '%')
                    ->orWhere('amount', 'like', '%' . $query . '%')
                    ->orWhere('rct_no', 'like', '%' . $query . '%')
                    ->orWhere('form', 'like', '%' . $query . '%')
                    ->orWhere('details', 'like', '%' . $query . '%')
                    ->orWhere('name', 'like', '%' . $query . '%')
                    ->orWhere('category', 'like', '%' . $query . '%');
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('frontend.public-fund.cash-payment.table', compact('cashPayments'))->render()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $paymentCategories = PaymentCategory::where('status', 1)->orderBy('id', 'desc')->get();
        
        
        return view('frontend.public-fund.cash-payment.form', compact('paymentCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'vr_date' => 'required',
            'amount' => 'required',
            'rct_no' => 'required',
        ]);
        $voucherText = ResetVoucher::where('status', 1)->first();
        $cashPayment = CashPayment::latest()->first();

        $constantString = $voucherText->voucher_no_text ?? 'RCI-CHESS-';
        if(isset($cashPayment))
        {
            $serial_no = Str::substr($cashPayment->vr_no, -1);
            $counter = $serial_no + 1;
            // dd($serial_no);
        } else {
            $counter = 1;
        }
       
        $cashPayment = new CashPayment();
        $cashPayment->vr_no = $constantString . $counter++;
        $cashPayment->vr_date = $request->vr_date;
        $cashPayment->amount = $request->amount;
        $cashPayment->rct_no = $request->rct_no;
        $cashPayment->form = $request->form;
        $cashPayment->details = $request->details;
        $cashPayment->name = $request->name;
        $cashPayment->category = $request->category;
        $cashPayment->save();

      

        session()->flash('message', 'Cash Payment added successfully');
        return response()->json(['success' => 'Cash Payment added successfully']);
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
        
        $cashPayment = CashPayment::findOrFail($id);
        $paymentCategories = PaymentCategory::where('status', 1)->orderBy('id', 'desc')->get();
        $edit = true;
        return response()->json(['view' => view('frontend.public-fund.cash-payment.form', compact('edit', 'cashPayment', 'paymentCategories'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
           
            'vr_date' => 'required',
            'amount' => 'required',
            'rct_no' => 'required',
            'form' => 'required',
            'details' => 'required',
            'name' => 'required',
            'category' => 'required',
        ]);

        $cashPayment = CashPayment::findOrFail($id);
        $cashPayment->vr_date = $request->vr_date;
        $cashPayment->amount = $request->amount;
        $cashPayment->rct_no = $request->rct_no;
        $cashPayment->form = $request->form;
        $cashPayment->details = $request->details;
        $cashPayment->name = $request->name;
        $cashPayment->category = $request->category;
        $cashPayment->save();

        return redirect()->route('cash-payments.index')->with('message', 'Cash Payment updated successfully');
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
        $cashPayment = CashPayment::find($id);
        $cashPayment->delete();
        return redirect()->back()->with('message', 'Cash Payment deleted successfully');
    }
}