<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CreditVoucher;
use App\Models\CreditVoucherDetail;
use App\Models\DebitVoucher;
use App\Models\GatePass;
use App\Models\DebitVoucherDetail;

use PDF;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function creditVoucherGenerate(Request $request) 
    {
        // dd($request->all());
        $creditVoucher = CreditVoucher::where('id', $request->id)->first();
        $creditVoucherDetails = CreditVoucherDetail::where('credit_voucher_id', $creditVoucher->id)->with('rins', 'inventoryProjects', 'members', 'itemCodes')->get();

        // result array to store the credit voucher details
        $result = [];
        $singleData = [];
        $totalItemCost = 0;
        $total = 0;
        $itemCount = 0;

        $result['voucher_no'] = $creditVoucher->voucher_no;
        $result['voucher_date'] = $creditVoucher->voucher_date;


        foreach ($creditVoucherDetails as $detail) {
            $price = $detail->price ?? 0;
            $totalCost = $detail->total_price ?? 0;

            $result[$creditVoucher->voucher_no][$detail->itemCodes->code] = [
                'rin_no' => $detail->rins->rin_no ?? 'N/A',
                'rin_date' => $detail->rins->created_at ?? 'N/A',
                'consigner' => $detail->consigner ?? 'N/A',
                'cost_debatable' => $detail->cost_debatable ?? 'N/A',
                'project_no' => $detail->inventoryProjects->project_name ?? 'N/A',
                'project_code' => $detail->inventoryProjects->project_code ?? 'N/A',
                'member_name' => $detail->members->name ?? 'N/A',
                'item_code' => $detail->itemCodes->code ?? 'N/A',
                'description' => $detail->description ?? 'N/A',
                'quantity' => $detail->quantity ?? 'N/A',
                'remarks' => $detail->rins->remarks ?? 'N/A',
                'nc_status' => $detail->rins->nc_status ?? 'N/A',
                'au_status' => $detail->rins->au_status ?? 'N/A',
                'rate' => $price ?? 'N/A',
                'tax' => $detail->tax ?? 'N/A',
                'total_cost' => $totalCost ?? 'N/A',
            ];

            $totalItemCost += (float)$price;;
            $total += (float)$totalCost;

            $singleData[$creditVoucher->voucher_no] = [
                'rin_no' => $detail->rins->rin_no ?? 'N/A',
                'rin_date' => $detail->rins->created_at ?? 'N/A',
                'consignor' => $detail->consigner ?? 'N/A',
                'member_name' => $detail->members->name ?? 'N/A',
                'cost_debatable' => $detail->cost_debatable ?? 'N/A',
                'project_no' => $detail->inventoryProjects->project_name ?? 'N/A',
                'project_code' => $detail->inventoryProjects->project_code ?? 'N/A',
            ];

            $itemCount++;

        }
        // dd($itemCount);


        $pdf = PDF::loadView('frontend.reports.single-credit-voucher-generate', compact('creditVoucher', 'creditVoucherDetails', 'result', 'totalItemCost', 'total', 'singleData', 'itemCount'));
        return $pdf->download('credit-voucher-' . $creditVoucher->voucher_no . '.pdf');
    }

    public function debitVoucherGenerate(Request $request)
    {

        // Fetch the debit voucher and associated details
        $debitVoucher = DebitVoucher::where('id', $request->id)->with('inventoryNumbers')->first();
        $debitVoucherDetails = DebitVoucherDetail::where('debit_voucher_id', $debitVoucher->id)->with('itemCodes')->get();
        $creditVoucherDetails = CreditVoucherDetail::where('inv_no', $debitVoucher->inv_no)->where('item_type', 'consumable')->with('itemCodes')->get();

        // Initialize result array and variables
        $result = [];
        $totalItemCost = 0;
        $total = 0;
        $itemCodeCounts = [];

        $result['voucher_no'] = $debitVoucher->voucher_no;
        $result['voucher_date'] = $debitVoucher->voucher_date;
        $result['voucher_type'] = $debitVoucher->voucher_type;
        $result['inv_no'] = $debitVoucher->inventoryNumbers->number;

        // Uncomment the line below for debugging purposes only
        // dd($debitVoucherDetails, $creditVoucherDetails);

        foreach ($debitVoucherDetails as $detail) {
            // Find the matching credit detail
            $matchingCreditDetail = null;
            foreach ($creditVoucherDetails as $creditDetail) {
                if ($detail->item_id == $creditDetail->item_code_id) { // Ensure the correct item code ID is being checked
                    $matchingCreditDetail = $creditDetail;
                    break; // Stop the loop once we find a match
                }
            }

            if ($matchingCreditDetail) {
                $price = $matchingCreditDetail->price ?? 0;
                $totalCost = $matchingCreditDetail->total_price ?? 0;
                $uom = $matchingCreditDetail->uom ?? 'N/A';
                $description = $matchingCreditDetail->description ?? 'N/A';
                $remarks = $matchingCreditDetail->rins->remarks ?? 'N/A';

                // Access the first item code, assuming itemCodes is a collection
                $itemCode = $detail->itemCodes->first()->code ?? 'N/A';

                // Increment the count for this item code
                if (!isset($itemCodeCounts[$itemCode])) {
                    $itemCodeCounts[$itemCode] = 0;
                }
                $itemCodeCounts[$itemCode]++;

                $result[$debitVoucher->voucher_no][$itemCode] = [
                    'item_code' => $itemCode,
                    'quantity' => $detail->quantity ?? 'N/A',
                    'rate' => $price,
                    'uom' => $uom,
                    'description' => $description,
                    'total_cost' => $totalCost,
                    'remarks' => $remarks,
                ];

                $totalItemCost += (float)$price;
                $total += (float)$totalCost;
            }
        }

        // dd($result, $totalItemCost, $total, $itemCodeCounts);
        
        $pdf = PDF::loadView('frontend.reports.single-debit-voucher-generate', compact('debitVoucher', 'debitVoucherDetails', 'creditVoucherDetails', 'result', 'totalItemCost', 'total', 'itemCodeCounts'));
        return $pdf->download('debit-voucher.pdf');
    }

    public function lvpList()
    {
        return view('frontend.reports.lvp-list');
    }

    public function lvpListGenerate(Request $request)
    {

        $pdf = PDF::loadView('frontend.reports.single-lvp-generate');
        return $pdf->download('lvp-list.pdf');
    }

    public function gatePassReport($id)
    {
        $gatePass = GatePass::findOrFail($id);
        if($gatePass->gate_pass_type == 'returnable')
        {
            $pdf = PDF::loadView('inventory.reports.gate-pass-returnable-generate');
            return $pdf->download('debit-voucher.pdf');
        }else{
            $pdf = PDF::loadView('inventory.reports.gate-pass-non-returnable-generate');
            return $pdf->download('debit-voucher.pdf');
        }
        
    }
}
