<?php

namespace App\Http\Controllers\PublicFund;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Receipt;
use App\Models\PaymentCategory;
use App\Models\PublicFundVendor;
use App\Models\ResetVoucher;
use Illuminate\Support\Str;

class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $receipts = Receipt::orderBy('id', 'desc')->paginate(10);
        $paymentCategories = PaymentCategory::where('status', 1)->orderBy('id', 'desc')->get();
        $vendors = PublicFundVendor::where('status', 1)->orderBy('id', 'desc')->get();
        return view('public-funds.receipts.list', compact('receipts','paymentCategories','vendors'));
    }

    public function fetchData(Request $request)
    {
        return $request;
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
        // validation 
        $request->validate([
            'mode' => 'required',
            'vr_date' => 'required',
            'amount' => 'required',
            'vendor_id' => 'required'
        ]);

        if($request->mode == 'cash'){
            $request->validate([
                'vendor_id' => 'required'
            ]);
        }else{
            $request->validate([
                'bank_acc' => 'required',
                'cheque_no' => 'required',
                'cheque_date' => 'required'
            ]);
        }

        //receipt no generation
        $last_receipt = Receipt::latest()->first();
        $currentDate = date('Y-m-d');
        $constantString = 'RV-' . $currentDate . '-';
        if(isset($last_receipt) && Str::substr($last_receipt->receipt_no, 3, 7) === $currentDate)
        {
            $serial_no = (int) Str::substr($last_receipt->receipt_no, -4);
            $counter = $serial_no + 1;
        } else {
            $counter = 1;
        }
        $formattedCounter = str_pad($counter, 4, '0', STR_PAD_LEFT);
        $new_receipt_no = $constantString . $formattedCounter;

        //vr no generation
        $voucherText = ResetVoucher::where('status', 1)->first();
        $last_vr_no = Receipt::latest()->first();
        $constString = $voucherText->voucher_no_text ?? 'RCI-CHESS-';
        if(isset($last_vr_no))
        {
            $serial_no = Str::substr($last_vr_no->vr_no, -1);
            $count = $serial_no + 1;
        } else {
            $count = 1;
        }

        $receipt = new Receipt();
        $receipt->receipt_no = $new_receipt_no;
        $receipt->receipt_type = $request->mode;
        $receipt->vr_no = $constString . $count++;
        $receipt->vr_date = $request->vr_date;
        $receipt->amount = $request->amount;
        $receipt->form = $request->form;
        $receipt->details = $request->details;
        $receipt->fund_vendors_id = $request->vendor_id;
        $receipt->vendor_name = $request->vendor_name;
        $receipt->category_id = $request->category;
        $receipt->sr_no = $request->sr_no;
        $receipt->desig = $request->desig;
        $receipt->bill_ref = $request->bill_ref;
        $receipt->bank_acc_no = $request->bank_acc;
        $receipt->dv_no = $request->dv_no;
        $receipt->cheque_no = $request->cheque_no;
        $receipt->cheque_date = $request->cheque_date;
        $receipt->narration = $request->narration;
        $receipt->save();

        session()->flash('message', 'Receipt added successfully');
        return response()->json(['success' => 'Receipt added successfully']);

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
