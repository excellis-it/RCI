<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\CertificateIssueVoucher;
use Illuminate\Http\Request;

use App\Models\CreditVoucher;
use App\Models\CreditVoucherDetail;
use App\Models\DebitVoucher;

use App\Models\Rin;
use App\Models\DebitVoucherDetail;
use App\Models\ExternalIssueVoucher;
use App\Models\TransferVoucher;
use App\Models\ConversionVoucher;
use App\Models\GatePass;
use App\Models\InventoryNumber;
use App\Models\ItemCode;
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

        if ($creditVoucherDetails) {

            foreach ($creditVoucherDetails as $detail) {

                $rin_date = Rin::where('rin_no', $detail->rin)->first();
                $price = $detail->price ?? 0;
                $totalCost = $detail->total_price ?? 0;

                $result[$creditVoucher->voucher_no][$detail->item_code_id] = [
                    'rin_no' => $detail->rin ?? 'N/A',
                    'rin_date' => $rin_date->created_at ?? 'N/A',
                    'consigner' => $detail->consigner ?? 'N/A',
                    'cost_debatable' => $detail->cost_debatable ?? 'N/A',
                    'project_no' => $detail->inventoryProjects->project_name ?? 'N/A',
                    'project_code' => $detail->inventoryProjects->project_code ?? 'N/A',
                    'member_name' => $detail->members->name ?? 'N/A',
                    'item_code' => $detail->item_code_id ?? 'N/A',
                    'description' => $detail->description ?? 'N/A',
                    'quantity' => $detail->quantity ?? 'N/A',
                    'remarks' => $detail->rins->remarks ?? 'N/A',
                    'nc_status' => $detail->rins->nc_status ?? 'N/A',
                    'au_status' => $detail->rins->au_status ?? 'N/A',
                    'rate' => $price ?? 'N/A',
                    'tax' => $detail->tax ?? 'N/A',
                    'total_cost' => $totalCost ?? 'N/A',
                ];

                $totalItemCost += (float)$price;
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
                $totalCost = (($detail->quantity) * $price) ?? 0;
                $uom = $matchingCreditDetail->uom ?? 'N/A';
                $description = $detail->item_desc ?? 'N/A';
                $remarks = $detail->remarks ?? 'N/A';

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
        return $pdf->download('debit-voucher ' . date('d-m-Y') .'.pdf');
    }


    public function inventoryReportGenerate()
    {
        return view('inventory.reports.list');
    }


    public function transferVoucherGenerate(Request $request)
    {
        $transferVoucher = TransferVoucher::where('id', $request->id)->first();
        $itemDesc = ItemCode::where('id', $transferVoucher->item_id)->first();
        $pdf = PDF::loadView('inventory.reports.single-transfer-voucher-generate', compact('transferVoucher', 'itemDesc'));
        return $pdf->download('transfer-voucher.pdf');
    }

    public function conversionVoucherGenerate(Request $request)
    {
        $conversionVoucher = ConversionVoucher::where('id', $request->id)->first();
        $itemDesc = ItemCode::where('id', $conversionVoucher->item_id)->first();
        $inv_no = InventoryNumber::where('id', $conversionVoucher->inv_no)->first();

        $pdf = PDF::loadView('inventory.reports.single-conversion-voucher-generate', compact('conversionVoucher', 'itemDesc', 'inv_no'));
        return $pdf->download('conversion-voucher.pdf');
    }

    public function externalIssueVoucherGenerate(Request $request)
    {
        // dd($request->all());
        $externalIssueVoucher = ExternalIssueVoucher::where('id', $request->id)->first();
        $itemDesc = ItemCode::where('id', $externalIssueVoucher->item_id)->first();
        $gatepass = GatePass::where('id', $externalIssueVoucher->gate_pass_id)->first();

        $pdf = PDF::loadView('inventory.reports.single-external-issue-voucher-generate', compact('externalIssueVoucher', 'itemDesc', 'gatepass'));
        return $pdf->download('external-issue-voucher.pdf');
    }

    public function certificateIssueVoucherGenerate(Request $request)
    {
        $certificateIssueVoucher = CertificateIssueVoucher::where('id', $request->id)->first();
        $itemDesc = ItemCode::where('id', $certificateIssueVoucher->item_id)->first();

        $pdf = PDF::loadView('inventory.reports.single-certificate-issue-voucher-generate', compact('certificateIssueVoucher', 'itemDesc'));
        return $pdf->download('certificate-issue-voucher.pdf');
    }

    public function lvpList()
    {
        return view('inventory.reports.lvp-list');
    }

    public function lvpListGenerate(Request $request)
    {

        $pdf = PDF::loadView('inventory.reports.lvp-list-generate');
        return $pdf->download('lvp-list.pdf');
    }

    public function gatePassReport($id)
    {
        $date = Carbon::now();
        $gatePass = GatePass::findOrFail($id);
        if ($gatePass->gate_pass_type == 'returnable') {
            $pdf = PDF::loadView('inventory.reports.gate-pass-returnable-generate',compact('gatePass','date'));
            return $pdf->download('returnable-gate-pass.pdf');
        } else {
            $pdf = PDF::loadView('inventory.reports.gate-pass-non-returnable-generate',compact('gatePass','date'));
            return $pdf->download('non-returnable-gate-pass.pdf');
        }
    }

    public function rinsReport($id)
    {
        $rin = Rin::findOrFail($id);
        $all_items = Rin::where('rin_no', $rin->rin_no)->get();
        $total_item = count($all_items);
        $pdf = PDF::loadView('inventory.reports.rin-generate', compact('rin', 'all_items', 'total_item'));
        return $pdf->download('rin.pdf');
    }

    public function trafficControlReport()
    {
        $pdf = PDF::loadView('inventory.reports.traffic-control-generate');
        return $pdf->download('traffic-control.pdf');
    }

    public function securityGateReport()
    {
        $pdf = PDF::loadView('inventory.reports.security-gate-store-generate');
        return $pdf->download('security-gate-store.pdf');
    }

    public function storeInwardReport()
    {
        $pdf = PDF::loadView('inventory.reports.store-inward-generate');
        return $pdf->download('store-inward.pdf');
    }

    public function rinControllerReport()
    {
        $pdf = PDF::loadView('inventory.reports.rin-controller-generate');
        return $pdf->download('rin-controller.pdf');
    }

    public function certificateReceiptVoucher()
    {
        $pdf = PDF::loadView('inventory.reports.certificate-receipt-voucher-generate');
        return $pdf->download('certificate-receipt-voucher.pdf');
    }



    public function ledgerSheetReport()
    {
        $pdf = PDF::loadView('inventory.reports.ledger-sheet-generate');
        return $pdf->download('ledger-sheet.pdf');
    }


    public function binCardReport()
    {
        $pdf = PDF::loadView('inventory.reports.bin-card-generate');
        return $pdf->download('bin-card.pdf');
    }

    public function registerForInventories()
    {
        $pdf = PDF::loadView('inventory.reports.register-for-inventories-generate');
        return $pdf->download('register-for-inventories.pdf');
    }

    public function stockSheetReport()
    {
        $pdf = PDF::loadView('inventory.reports.stock-sheet-generate');
        return $pdf->download('stock-sheet.pdf');
    }

    public function inventoryLoanRegister()
    {
        $pdf = PDF::loadView('inventory.reports.inventory-loan-register-generate');
        return $pdf->download('inventory-loan-register.pdf');
    }

    public function discrepancyReport()
    {
        $pdf = PDF::loadView('inventory.reports.discrepancy-report-generate');
        return $pdf->download('discrepancy-report.pdf');
    }

    public function internalDemandIssueVoucher()
    {
        $pdf = PDF::loadView('inventory.reports.internal-demand-issue-voucher-generate');
        return $pdf->download('internal-demand-issue-voucher.pdf');
    }

    public function internalReturnReceiptVoucher()
    {
        $pdf = PDF::loadView('inventory.reports.internal-return-receipt-voucher-generate');
        return $pdf->download('internal-return-receipt-voucher.pdf');
    }

    public function trialStoreGatePass()
    {
        $pdf = PDF::loadView('inventory.reports.trial-store-gate-pass-generate');
        return $pdf->download('trial-store-gate-pass.pdf');
    }

    public function armamentsAmmunitionRegister()
    {
        $pdf = PDF::loadView('inventory.reports.armaments-ammunition-register-generate');
        return $pdf->download('armaments-ammunition-register.pdf');
    }

    public function disposalItemReport()
    {
        $pdf = PDF::loadView('inventory.reports.disposal-item-report-generate');
        return $pdf->download('disposal-item-report.pdf');
    }

    public function statementOfDamaged()
    {
        $pdf = PDF::loadView('inventory.reports.statement-of-damaged-generate');
        return $pdf->download('statement-of-damaged.pdf');
    }

    public function cashPurchaseControlRegister()
    {
        $pdf = PDF::loadView('inventory.reports.cash-purchase-control-register-generate');
        return $pdf->download('cash-purchase-control-register.pdf');
    }

    public function storesOutwardRegister()
    {
        $pdf = PDF::loadView('inventory.reports.stores-outward-register-generate');
        return $pdf->download('stores-outward-register.pdf');
    }

    public function recordOfTransaction()
    {
        $pdf = PDF::loadView('inventory.reports.record-of-transaction-generate');
        return $pdf->download('record-of-transaction.pdf');
    }

    public function loanOutLedgerRegister()
    {
        $pdf = PDF::loadView('inventory.reports.loan-out-ledger-register-generate');
        return $pdf->download('loan-out-ledger-register.pdf');
    }

    public function loanInLedgerRegister()
    {
        $pdf = PDF::loadView('inventory.reports.loan-in-ledger-register-generate');
        return $pdf->download('loan-in-ledger-register.pdf');
    }

    public function cprvControlRegister()
    {
        $pdf = PDF::loadView('inventory.reports.cprv-control-register-generate');
        return $pdf->download('cprv-control-register.pdf');
    }

    public function cpivControlRegister()
    {
        $pdf = PDF::loadView('inventory.reports.cpiv-control-register-generate');
        return $pdf->download('cpiv-control-register.pdf');
    }

    public function contingentBill() //not getting data
    {
        $pdf = PDF::loadView('inventory.reports.contingent-bill-generate');
        return $pdf->download('contingent-bill.pdf');
    }

    public function contractorsBill()
    {
        $pdf = PDF::loadView('inventory.reports.contractors-bill-generate');
        return $pdf->download('contractors-bill.pdf');
    }

    public function certifiedIssueVoucher()
    {
        $pdf = PDF::loadView('inventory.reports.certified-issue-voucher-generate');
        return $pdf->download('certified-issue-voucher.pdf');
    }

    public function expendableStoreIssueVoucher()
    {
        $pdf = PDF::loadView('inventory.reports.expendable-store-issue-voucher-generate');
        return $pdf->download('expendable-store-issue-voucher.pdf');
    }

    public function fitmentVoucher()
    {
        $pdf = PDF::loadView('inventory.reports.fitment-voucher-generate');
        return $pdf->download('fitment-voucher.pdf');
    }

    // public function reportLvpList()
    // {
    //     $pdf = PDF::loadView('inventory.reports.report-lvp-list-generate');
    //     return $pdf->download('report-lvp-list.pdf');
    // }
}
