<?php

namespace App\Http\Controllers\Inventory;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\CertificateIssueVoucher;
use Illuminate\Http\Request;
use App\Models\CertificateIssueVoucherDetail;
use App\Models\CreditVoucher;
use App\Models\CreditVoucherDetail;
use App\Models\DebitVoucher;
use App\Models\GatePassItem;
use App\Models\Rin;
use App\Models\DebitVoucherDetail;
use App\Models\ExternalIssueVoucher;
use App\Models\TransferVoucher;
use App\Models\ConversionVoucher;
use App\Models\ConversionVoucherDetail;
use App\Models\GatePass;
use App\Models\InventoryNumber;
use App\Models\InventoryProject;
use App\Models\ItemCode;
use App\Models\SecurityGateStore;
use App\Models\TrafficControl;
use App\Models\InventoryLoan;
use App\Models\ExternalIssueVoucherDetail;
use App\Models\InventorySir;
use App\Models\SirType;
use PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Setting;


class ReportController extends Controller
{

    public function inventoryReportGenerate()
    {
        return view('inventory.reports.list');
    }

    public function invReportPage($type)
    {
        $report_type = $type;
        $report_title = ucwords(str_replace('_', ' ', $report_type));
        return view('inventory.reports.report-page', compact('report_type', 'report_title'));
    }

    public function invReportGenerate(Request $request)
    {
        $report_type = $request->type;
        $request->validate([
            'daterange' => 'required|string',
        ]);

        // Split the daterange into start and end dates
        $dates = explode(' - ', $request->daterange);


        // Extract start and end date
        // $startDate = $dates[0];
        // $endDate = $dates[1];

        // Extract start and end date
        $startDate_s = Carbon::parse($dates[0])->subDay();
        $endDate_s = Carbon::parse($dates[1])->addDay();

        // If you need the dates as strings, you can format them
        $startDate = $startDate_s->toDateString(); // e.g., 'YYYY-MM-DD'
        $endDate = $endDate_s->toDateString();

        $setting = Setting::first();

        $paperType = $request->paper_type ?? $setting->pdf_page_type;


        if ($report_type == 'credit_voucher') {
            return $this->creditVoucherGenerate($request, $startDate, $endDate, $paperType);
        }

        if ($report_type == 'debit_voucher') {
            return $this->debitVoucherGenerate($request, $startDate, $endDate, $paperType);
        }

        if ($report_type == 'transfer_voucher') {
            return $this->transferVoucherGenerate($request, $startDate, $endDate, $paperType);
        }

        if ($report_type == 'conversion_voucher') {
            return $this->conversionVoucherGenerate($request, $startDate, $endDate, $paperType);
        }

        if ($report_type == 'external_issue') {
            return $this->externalIssueVoucherGenerate($request, $startDate, $endDate, $paperType);
        }

        if ($report_type == 'certificate_issue') {
            return $this->certificateIssueVoucherGenerate($request, $startDate, $endDate, $paperType);
        }

        if ($report_type == 'inventory_numbers') {
            return $this->inventoryCRVGenerate($request, $startDate, $endDate, $paperType);
        }

        if ($report_type == 'statement_of_damaged') {
            return $this->rinDamagedGenerate($request, $startDate, $endDate, $paperType);
        }
    }


    public function creditVoucherGenerate(Request $request, $startDate = null, $endDate = null, $paperType = null)
    {
        try {
            // dd($request->all());
            if ($startDate && $endDate) {
                $creditVouchers = CreditVoucher::whereBetween('created_at', [$startDate, $endDate])->get();
            }
            if ($request->has('id')) {
                // Get credit voucher by ID
                $creditVouchers = CreditVoucher::where('id', $request->id)->get();
            }
            $logo = Helper::logo() ?? '';

            $result = [];
            $singleData = [];


            foreach ($creditVouchers as $creditVoucher) {

                $totalItemCost = 0;
                $total = 0;
                $itemCount = 0;

                // return $creditVoucher;

                // $creditVoucher = CreditVoucher::where('id', $request->id)->first();
                $creditVoucherDetails = CreditVoucherDetail::where('credit_voucher_id', $creditVoucher->id)->with('rins', 'inventoryProjects', 'members', 'itemCodes')->get();

                $singleCreditVoucher =  CreditVoucherDetail::where('credit_voucher_id', $creditVoucher->id)->with('inventoryProjects', 'members', 'itemCodes')->first();
                $get_sir = Rin::where('rin_no', $singleCreditVoucher->rin)->first();
                // result array to store the credit voucher details


                $result['voucher_no'] = $creditVoucher->voucher_no;
                $result['voucher_date'] = $creditVoucher->voucher_date;
                $result['consigner_name'] = $creditVoucherDetails[0]->rins->vendorDetail->name;
                $result['consigner_Address'] = $creditVoucherDetails[0]->rins->vendorDetail->address;


                if ($creditVoucherDetails) {

                    foreach ($creditVoucherDetails as $detail) {

                        $rin_date = Rin::where('rin_no', $detail->rin)->first();
                        $price = $detail->price ?? 0;
                        $totalCost = $detail->total_price ?? 0;

                        $result[$creditVoucher->voucher_no][$detail->item_code_id] = [
                            'rin_no' => $detail->rin ?? '',
                            'rin_date' => $rin_date->created_at ?? '',
                            'consigner' => $detail->rins->vendorDetail->name ?? '',
                            'cost_debatable' => $detail->cost_debatable ?? '',
                            'project_no' => $detail->inventoryProjects->project_name ?? '',
                            'project_code' => $detail->inventoryProjects->project_code ?? '',
                            'member_name' => $detail->members->name ?? '',
                            'item_code' => $detail->item_code_id ?? '',
                            'gem_item_code' => $detail->gem_item_code ?? '',
                            'description' => $detail->description ?? '',
                            'quantity' => $detail->quantity ?? '',
                            'remarks' => $detail->rins->remarks ?? '',
                            'nc_status' => $detail->rins->nc_status ?? '',
                            'au_status' => $detail->rins->au_status ?? '',
                            'rate' => $price ?? 0,
                            'tax' => $detail->rins->gst ?? 0,
                            'disc_percent' => $detail->disc_percent ?? 0,
                            'disc_amt' => $detail->disc_amt ?? 0,
                            'total_price' => $detail->total_price ?? 0,
                            'total_cost' => $totalCost ?? 0,
                            'ledger_no' => $detail->ledger_no ?? '',
                            'folio_no' => $detail->folio_no ?? '',
                        ];

                        $totalItemCost += (float)$price;
                        $total += (float)$totalCost;

                        $singleData[$creditVoucher->voucher_no] = [
                            'rin_no' => $detail->rin ?? '',
                            'rin_date' =>  $rin_date->created_at ?? '',
                            'item_type' => $detail->item_type ?? '',
                            'consignor' => $detail->consigner ?? '',
                            'member_name' => $detail->members->name ?? '',
                            'cost_debatable' => $detail->cost_debatable ?? '',
                            'project_no' => $detail->inventoryProjects->project_name ?? '',
                            'project_code' => $detail->inventoryProjects->project_code ?? '',
                        ];

                        $itemCount++;
                    }
                }
            }

            // return $singleData;

            // dd($result);

            $setting = Setting::first();

            $paperType = $paperType ?? $setting->pdf_page_type;

            // return $paperType;

            $pdf = PDF::loadView('inventory.reports.single-credit-voucher-generate', compact('logo', 'creditVouchers', 'creditVoucherDetails', 'result', 'totalItemCost', 'total', 'singleData', 'itemCount', 'singleCreditVoucher', 'get_sir'))->setPaper('a4', $paperType);
            return $pdf->download('credit-voucher-' . $creditVoucher->voucher_no . '.pdf');
        } catch (\Exception $e) {
            //   return response()->json(['error' => $e->getMessage()], 201);
            //   session()->flash('message', 'Data Not Found');
            return response()->json(['error' => 'Data Not Found'], 404);
        }
    }

    public function debitVoucherGenerate(Request $request, $startDate = null, $endDate = null, $paperType = null)
    {

        // $result = [];
        // $itemCodeCounts = [];
        $itemCodeCounts = [];

        if ($startDate && $endDate) {
            $debitVouchers = DebitVoucher::with('inventoryNumbers', 'details')->whereBetween('created_at', [$startDate, $endDate])->get();
            //   return $debitVouchers;
        }
        if ($request->has('id')) {
            $debitVouchers = DebitVoucher::where('id', $request->id)->with('inventoryNumbers', 'details')->get();
        }
        $logo = Helper::logo() ?? '';

        $totalItems = 0;

        foreach ($debitVouchers as $debitVoucher) {

            $totalItems++;

            // Fetch the debit voucher and associated details
            // $debitVoucher = DebitVoucher::where('id', $request->id)->with('inventoryNumbers')->first();
            $debitVoucherDetails = DebitVoucherDetail::where('debit_voucher_id', $debitVoucher->id)->get();
            $creditVoucherDetails = CreditVoucherDetail::where('inv_no', $debitVoucher->inv_no)->where('item_type', 'consumable')->with('itemCodes')->get();



            foreach ($debitVoucherDetails as $detail) {
            }
        }

        // return $debitVoucher;

        // dd($result, $totalItemCost, $total, $itemCodeCounts);
        $setting = Setting::first();

        $paperType = $paperType ?? $setting->pdf_page_type;

        $pdf = PDF::loadView('inventory.reports.single-debit-voucher-generate', compact('logo', 'debitVouchers', 'debitVoucherDetails', 'creditVoucherDetails', 'itemCodeCounts', 'totalItems'))->setPaper('a4', $paperType);
        return $pdf->download('debit-voucher ' . date('d-m-Y') . '.pdf');
    }


    public function transferVoucherGenerate(Request $request, $startDate = null, $endDate = null, $paperType = null)
    {
        if ($startDate && $endDate) {
            $transferVouchers = TransferVoucher::whereBetween('created_at', [$startDate, $endDate])->get();
        }
        if ($request->has('id')) {
            $transferVouchers = TransferVoucher::where('id', $request->id)->get();
        }
        $logo = Helper::logo() ?? '';

        foreach ($transferVouchers as $transferVoucher) {
            // $transferVoucher = TransferVoucher::with('voucherDetails')->where('id', $request->id)->first();
            //  dd($transferVoucher);
            $itemDesc = ItemCode::where('id', $transferVoucher->item_id)->first();
        }
        $setting = Setting::first();

        $paperType = $paperType ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('inventory.reports.single-transfer-voucher-generate', compact('logo', 'transferVouchers', 'itemDesc'))->setPaper('a4', $paperType);
        return $pdf->download('transfer-voucher.pdf');
    }

    public function conversionVoucherGenerate(Request $request, $startDate = null, $endDate = null, $paperType = null)
    {
        if ($startDate && $endDate) {
            $conversionVouchers = ConversionVoucher::whereBetween('created_at', [$startDate, $endDate])->get();
        }
        if ($request->has('id')) {
            $conversionVouchers = ConversionVoucher::where('id', $request->id)->get();
        }
        $logo = Helper::logo() ?? '';

        foreach ($conversionVouchers as $conversionVoucher) {
            // $conversionVoucher = ConversionVoucher::where('id', $request->id)->first();
            //   $conversionDetails = ConversionVoucherDetail::where('conversion_voucher_id', $conversionVoucher->id)->get();
            $itemDesc = ItemCode::where('id', $conversionVoucher->item_id)->first();
            $inv_no = InventoryNumber::where('id', $conversionVoucher->inv_no)->first();
        }

        // return $conversionVouchers;
        $setting = Setting::first();

        $paperType = $paperType ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('inventory.reports.single-conversion-voucher-generate', compact('logo', 'conversionVouchers', 'itemDesc', 'inv_no'))->setPaper('a4', $paperType);
        return $pdf->download('conversion-voucher.pdf');
    }

    public function externalIssueVoucherGenerate(Request $request, $startDate = null, $endDate = null, $paperType = null)
    {
        // dd($request->all());
        if ($startDate && $endDate) {
            $externalIssueVouchers = ExternalIssueVoucher::whereBetween('created_at', [$startDate, $endDate])->get();
        }
        if ($request->has('id')) {
            $externalIssueVouchers = ExternalIssueVoucher::where('id', $request->id)->get();
        }
        $logo = Helper::logo() ?? '';

        foreach ($externalIssueVouchers as $externalIssueVoucher) {

            //  $externalIssueVoucher = ExternalIssueVoucher::with('details')->where('id', $request->id)->first();
            //  $external_issue_voucher_details = ExternalIssueVoucherDetail::where('external_issue_voucher_id', $externalIssueVoucher->id)->get();
            //  $itemDesc = ItemCode::where('id', $externalIssueVoucher->item_id)->first();
            //   $gatepass = GatePass::where('id', $externalIssueVoucher->gate_pass_id)->first();
        }
        $setting = Setting::first();

        $paperType = $paperType ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('inventory.reports.single-external-issue-voucher-generate', compact('logo', 'externalIssueVouchers'))->setPaper('a4', $paperType);
        return $pdf->download('external-issue-voucher.pdf');
    }

    public function certificateIssueVoucherGenerate(Request $request, $startDate = null, $endDate = null, $paperType = null)
    {
        if ($startDate && $endDate) {
            $certificateIssueVouchers = CertificateIssueVoucher::with('details')->whereBetween('created_at', [$startDate, $endDate])->get();
        }
        if ($request->has('id')) {
            $certificateIssueVouchers = CertificateIssueVoucher::with('details')->where('id', $request->id)->get();
        }
        $logo = Helper::logo() ?? '';
        // return $certificateIssueVouchers;
        // $certificateIssueVoucher = CertificateIssueVoucher::where('id', $request->id)->first();
        //  $certificateIssuevoucherDetails = CertificateIssueVoucherDetail::where('certicate_issue_voucher_id', $certificateIssueVoucher->id)->get();
        //  $itemDesc = ItemCode::where('id', $certificateIssueVoucher->item_id)->first();

        if ($certificateIssueVouchers->isEmpty()) {
            session()->flash('error', 'Data Not Found');
            return response()->json(['error' => 'Data Not Found'], 404);
        }
        $setting = Setting::first();

        $paperType = $paperType ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('inventory.reports.single-certificate-issue-voucher-generate', compact('logo', 'certificateIssueVouchers'))->setPaper('a4', $paperType);
        return $pdf->download('certificate-issue-voucher.pdf');
    }

    public function rinDamagedGenerate(Request $request, $startDate = null, $endDate = null, $paperType = null)
    {
        try {
            if ($startDate && $endDate) {
                $rins = Rin::where('damage_status', 1)
                    ->whereBetween('created_at', [$startDate, $endDate])
                    ->whereIn('id', function ($query) {
                        $query->select(DB::raw('MAX(id)'))
                            ->from('rins')
                            ->groupBy('rin_no');
                    })
                    ->get();
            }
            if ($request->has('id')) {
                $rins = Rin::where('damage_status', 1)
                    ->where('id', $request->id)
                    ->whereIn('id', function ($query) {
                        $query->select(DB::raw('MAX(id)'))
                            ->from('rins')
                            ->groupBy('rin_no');
                    })
                    ->get();
            }
            $logo = Helper::logo() ?? '';

            // return $rins;

            //   $all_rins =  Rin::where('rin_no', $rin->rin_no)->get();

            if ($rins->isEmpty()) {
                session()->flash('error', 'Data Not Found');
                return response()->json(['error' => 'Data Not Found'], 404);
            }

            foreach ($rins as $rin) {
                // $rin = Rin::where('id', $request->id)->first();
                // $damaged_items = Rin::where('damage_status', 1)->where('rin_no', $rin->rin_no)->pluck('item_id');
                // $rin->rinDamagedItems = ItemCode::whereIn('id', $damaged_items)->get();


                $rin->rinDamagedItems = Rin::where('damage_status', 1)->where('rin_no', $rin->rin_no)->get();
            }

            // return $rins;
            $setting = Setting::first();

            $paperType = $paperType ?? $setting->pdf_page_type;
            $pdf = PDF::loadView('inventory.reports.rin-damaged-generate', compact('logo', 'rins'))->setPaper('a4', $paperType);
            return $pdf->download('rin-damaged.pdf');
        } catch (\Exception $e) {
            //   return response()->json(['error' => $e->getMessage()], 201);
            //   session()->flash('message', 'Data Not Found');
            return response()->json(['error' => 'Data Not Found'], 404);
        }
    }


    public function lvpList()
    {
        return view('inventory.reports.lvp-list');
    }

    public function lvpListGenerate(Request $request)
    {
        $logo = Helper::logo() ?? '';

        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;

        $pdf = PDF::loadView('inventory.reports.lvp-list-generate', compact('logo'))->setPaper('a4', $paperType);
        return $pdf->download('lvp-list.pdf');
    }

    public function gatePassReport($id)
    {
        $date = Carbon::now();
        $gatePass = GatePass::findOrFail($id);
        $gate_pass_items = GatePassItem::where('gate_pass_id', $id)->get();
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        if ($gatePass->gate_pass_type == 'returnable') {
            $pdf = PDF::loadView('inventory.reports.gate-pass-returnable-generate', compact('gatePass', 'date', 'gate_pass_items'))->setPaper('a4', $paperType);
            return $pdf->download('returnable-gate-pass.pdf');
        } else {
            $pdf = PDF::loadView('inventory.reports.gate-pass-non-returnable-generate', compact('gatePass', 'date', 'gate_pass_items'))->setPaper('a4', $paperType);
            return $pdf->download('non-returnable-gate-pass.pdf');
        }
    }

    public function rinsReport($id)
    {
        $rin = Rin::findOrFail($id);
        $all_items = Rin::where('rin_no', $rin->rin_no)->get();
        $total_item = count($all_items);
        $inventory_no = InventoryNumber::where('id', $rin->inventory_id)->first() ?? '';
        // $project = InventoryProject::where('id', $inventory_no->inventory_project_id)->first() ?? '';
        // $gst = GstPercentage::where('id',)
        $logo = Helper::logo() ?? '';
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('inventory.reports.rin-generate', compact('logo', 'rin', 'all_items', 'total_item'))->setPaper('a4', $paperType);
        return $pdf->download('rin.pdf');
    }

    public function trafficControlReport(Request $request)
    {
        $date = $request->date;
        $explode = explode(' - ', $date);
        // $from = Carbon::parse($explode[0])->format('Y-m-d');
        // $to = Carbon::parse($explode[1])->format('Y-m-d');

        $from = Carbon::parse($explode[0])->subDay()->format('Y-m-d');
        $to = Carbon::parse($explode[1])->addDay()->format('Y-m-d');

        $logo = Helper::logo() ?? '';
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;

        // return $request->paper_type;

        $trafficControls = TrafficControl::whereBetween('created_at', [$from, $to])->get();
        $pdf = PDF::loadView('inventory.reports.traffic-control-generate', compact('logo', 'trafficControls', 'date'))->setPaper('a4', $paperType);

        // Return the PDF directly for download
        return $pdf->download('traffic-control-report-' . $from . '-to-' . $to . '.pdf');
    }


    public function securityGateReport(Request $request)
    {
        $date = $request->date;

        // Get data by date range created_at
        $explode = explode(' - ', $date);
        // $from = Carbon::parse($explode[0])->format('Y-m-d');
        // $to = Carbon::parse($explode[1])->format('Y-m-d');
        $from = Carbon::parse($explode[0])->subDay()->format('Y-m-d');
        $to = Carbon::parse($explode[1])->addDay()->format('Y-m-d');

        $securityGates = SecurityGateStore::whereBetween('created_at', [$from, $to])->get();

        $logo = Helper::logo() ?? '';
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;

        $pdf = PDF::loadView('inventory.reports.security-gate-store-generate', compact('logo', 'securityGates', 'date'))->setPaper('a4', $paperType);

        // Return the PDF directly for download
        return $pdf->download('security-gate-store-report-' . $from . '-to-' . $to . '.pdf');
    }

    public function storeInwardReport(Request $request)
    {
        // Validate the request
        $request->validate([
            'daterange' => 'required|string',
        ]);

        // Split the daterange into start and end dates
        $dates = explode(' - ', $request->daterange);

        // Parse the dates
        $startDate = Carbon::parse($dates[0])->startOfDay();
        $endDate = Carbon::parse($dates[1])->endOfDay();

        $sir_type = $request->sir_type;

        if ($sir_type != '') {
            $storeInwards = InventorySir::where('sir_type_id', $sir_type)->whereBetween('created_at', [$startDate, $endDate])
                ->with(['supplyOrder']) // Eager load related data for better performance
                ->get()
                ->groupBy('sir_no')
                ->map(fn($group) => $group->first());
        } else {


            // Fetch Store Inward entries within the given date range, grouped by `sir_no`, and get the first record per group
            $storeInwards = InventorySir::whereBetween('created_at', [$startDate, $endDate])
                ->with(['supplyOrder']) // Eager load related data for better performance
                ->get()
                ->groupBy('sir_no')
                ->map(fn($group) => $group->first());
        }
        // dd($storeInwards);

        // return $storeInwards;

        // if data not found
        if ($storeInwards->isEmpty()) {
            session()->flash('error', 'Data Not Found');
            return redirect()->back()->with('error', 'Data Not Found');
        }

        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        // Generate and download the PDF
        $logo = Helper::logo() ?? '';
        $pdf = PDF::loadView('inventory.reports.store-inward-generate', compact('logo', 'storeInwards', 'startDate', 'endDate'))->setPaper('a4', $paperType);

        return $pdf->download('store-inward-' . $startDate->format('d-m-Y') . '-to-' . $endDate->format('d-m-Y') . '.pdf');
    }

    public function storeInwardReportList()
    {
        $sir_types = SirType::get();
        return view('inventory.reports.store-inward-list', compact('sir_types'));
    }

    public function rinControllerReport(Request $request)
    {
        // Validate the request
        $request->validate([
            'financial_year' => 'required',
        ]);

        // Split the financial year into start and end years
        [$startYear, $endYear] = explode('-', $request->financial_year);

        // Set the start and end of the financial year
        $startOfYear = Carbon::createFromDate($startYear, 4, 1)->startOfDay();
        $endOfYear = Carbon::createFromDate($endYear, 3, 31)->endOfDay();

        // Fetch RINs grouped by rin_no for the financial year and get only the first item in each group
        $rinControllerReports = Rin::whereBetween('created_at', [$startOfYear, $endOfYear])
            ->with([
                'sirNo.supplyOrder',
                'sirNo.inventoryNumber.group'
            ])
            ->get()
            ->groupBy('rin_no')
            ->map(fn($group) => $group->first());

        if ($rinControllerReports->isEmpty()) {
            session()->flash('error', 'Data Not Found');
            return redirect()->back()->with('error', 'Data Not Found');
        }
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        // Generate and download the PDF
        $logo = Helper::logo() ?? '';
        $pdf = PDF::loadView('inventory.reports.rin-controller-generate', compact('logo', 'rinControllerReports', 'startOfYear', 'endOfYear'))->setPaper('a4', $paperType);
        return $pdf->download('rin-controller-report-' . $request->financial_year . '.pdf');
    }


    public function rinControllerReportList()
    {
        $financialYears = Helper::getFinancialYears();
        return view('inventory.reports.rin-list')->with(compact('financialYears'));
    }

    public function certificateReceiptVoucher()
    {
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('inventory.reports.certificate-receipt-voucher-generate')->setPaper('a4', $paperType);
        return $pdf->download('certificate-receipt-voucher.pdf');
    }



    public function ledgerSheetReport()
    {
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('inventory.reports.ledger-sheet-generate')->setPaper('a4', $paperType);
        return $pdf->download('ledger-sheet.pdf');
    }


    public function binCardReport()
    {
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('inventory.reports.bin-card-generate')->setPaper('a4', $paperType);
        return $pdf->download('bin-card.pdf');
    }

    public function registerForInventories()
    {
        $inventoryNumbers = InventoryNumber::orderBy('id', 'desc')->get();
        $groupedData = collect($inventoryNumbers)->chunk(8);

        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;

        $pdf = PDF::loadView('inventory.reports.register-for-inventories-generate', compact('inventoryNumbers', 'groupedData'))->setPaper('a4', $paperType);
        return $pdf->download('register-for-inventories.pdf');
    }

    public function stockSheetReport()
    {
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('inventory.reports.stock-sheet-generate')->setPaper('a4', $paperType);
        return $pdf->download('stock-sheet.pdf');
    }

    public function inventoryLoanRegister()
    {

        $inventory_loans = InventoryLoan::orderBy('id', 'desc')->get();
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('inventory.reports.inventory-loan-register-generate', compact('inventory_loans'))->setPaper('a4', $paperType);
        return $pdf->download('inventory-loan-register.pdf');
    }

    public function discrepancyReport()
    {
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('inventory.reports.discrepancy-report-generate')->setPaper('a4', $paperType);
        return $pdf->download('discrepancy-report.pdf');
    }

    public function internalDemandIssueVoucher()
    {
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('inventory.reports.internal-demand-issue-voucher-generate')->setPaper('a4', $paperType);
        return $pdf->download('internal-demand-issue-voucher.pdf');
    }

    public function internalReturnReceiptVoucher()
    {
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('inventory.reports.internal-return-receipt-voucher-generate')->setPaper('a4', $paperType);
        return $pdf->download('internal-return-receipt-voucher.pdf');
    }

    public function trialStoreGatePass()
    {
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('inventory.reports.trial-store-gate-pass-generate')->setPaper('a4', $paperType);
        return $pdf->download('trial-store-gate-pass.pdf');
    }

    public function armamentsAmmunitionRegister()
    {
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('inventory.reports.armaments-ammunition-register-generate')->setPaper('a4', $paperType);
        return $pdf->download('armaments-ammunition-register.pdf');
    }

    public function disposalItemReport()
    {
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('inventory.reports.disposal-item-report-generate')->setPaper('a4', $paperType);
        return $pdf->download('disposal-item-report.pdf');
    }

    public function statementOfDamaged()
    {
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('inventory.reports.statement-of-damaged-generate')->setPaper('a4', $paperType);
        return $pdf->download('statement-of-damaged.pdf');
    }

    public function cashPurchaseControlRegister()
    {
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('inventory.reports.cash-purchase-control-register-generate')->setPaper('a4', $paperType);
        return $pdf->download('cash-purchase-control-register.pdf');
    }

    public function storesOutwardRegister()
    {
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('inventory.reports.stores-outward-register-generate')->setPaper('a4', $paperType);
        return $pdf->download('stores-outward-register.pdf');
    }

    public function recordOfTransaction()
    {
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('inventory.reports.record-of-transaction-generate')->setPaper('a4', $paperType);
        return $pdf->download('record-of-transaction.pdf');
    }

    public function loanOutLedgerRegister()
    {
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('inventory.reports.loan-out-ledger-register-generate')->setPaper('a4', $paperType);
        return $pdf->download('loan-out-ledger-register.pdf');
    }

    public function loanInLedgerRegister()
    {
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('inventory.reports.loan-in-ledger-register-generate')->setPaper('a4', $paperType);
        return $pdf->download('loan-in-ledger-register.pdf');
    }

    public function cprvControlRegister()
    {
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('inventory.reports.cprv-control-register-generate')->setPaper('a4', $paperType);
        return $pdf->download('cprv-control-register.pdf');
    }

    public function cpivControlRegister()
    {
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('inventory.reports.cpiv-control-register-generate')->setPaper('a4', $paperType);
        return $pdf->download('cpiv-control-register.pdf');
    }

    public function contingentBill() //not getting data
    {
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('inventory.reports.contingent-bill-generate')->setPaper('a4', $paperType);
        return $pdf->download('contingent-bill.pdf');
    }

    public function contractorsBill()
    {
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('inventory.reports.contractors-bill-generate')->setPaper('a4', $paperType);
        return $pdf->download('contractors-bill.pdf');
    }

    public function certifiedIssueVoucher()
    {
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('inventory.reports.certified-issue-voucher-generate')->setPaper('a4', $paperType);
        return $pdf->download('certified-issue-voucher.pdf');
    }

    public function expendableStoreIssueVoucher()
    {
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('inventory.reports.expendable-store-issue-voucher-generate')->setPaper('a4', $paperType);
        return $pdf->download('expendable-store-issue-voucher.pdf');
    }

    public function fitmentVoucher()
    {
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('inventory.reports.fitment-voucher-generate')->setPaper('a4', $paperType);
        return $pdf->download('fitment-voucher.pdf');
    }

    // public function reportLvpList()
    // {
    //     $pdf = PDF::loadView('inventory.reports.report-lvp-list-generate');
    //     return $pdf->download('report-lvp-list.pdf');
    // }

    public function inventoryCRVGenerate(Request $request, $startDate = null, $endDate = null, $paperType = null)
    {
        // Fetch all credit voucher IDs based on the inv_id
        //    $crv_nos = CreditVoucherDetail::where('inv_no', $request->id)->pluck('credit_voucher_id');
        //    $creditVouchers = CreditVoucher::whereIn('id', $crv_nos)->get();
        // try {

        if ($startDate && $endDate) {
            //   $creditVouchers = CreditVoucher::whereBetween('created_at', [$startDate, $endDate])->get();
            $crv_nos = CreditVoucherDetail::whereBetween('created_at', [$startDate, $endDate])->pluck('credit_voucher_id');
            $creditVouchers = CreditVoucher::whereIn('id', $crv_nos)->get();
        }
        if ($request->has('id')) {
            // Get credit voucher by ID
            //   $creditVouchers = CreditVoucher::where('id', $request->id)->get();
            $crv_nos = CreditVoucherDetail::where('inv_no', $request->id)->pluck('credit_voucher_id');
            $creditVouchers = CreditVoucher::whereIn('id', $crv_nos)->get();
        }

        $logo = Helper::logo() ?? '';

        $result = [];
        $singleData = [];


        foreach ($creditVouchers as $creditVoucher) {

            $totalItemCost = 0;
            $total = 0;
            $itemCount = 0;

            // return $creditVoucher;

            // $creditVoucher = CreditVoucher::where('id', $request->id)->first();
            $creditVoucherDetails = CreditVoucherDetail::where('credit_voucher_id', $creditVoucher->id)->with('rins', 'inventoryProjects', 'members', 'itemCodes')->get();

            $singleCreditVoucher =  CreditVoucherDetail::where('credit_voucher_id', $creditVoucher->id)->with('inventoryProjects', 'members', 'itemCodes')->first();
            $get_sir = Rin::where('rin_no', $singleCreditVoucher->rin)->first();
            // result array to store the credit voucher details


            $result['voucher_no'] = $creditVoucher->voucher_no;
            $result['voucher_date'] = $creditVoucher->voucher_date;
            $result['consigner_name'] = $creditVoucherDetails[0]->rins->vendorDetail->name;
            $result['consigner_Address'] = $creditVoucherDetails[0]->rins->vendorDetail->address;


            if ($creditVoucherDetails) {

                foreach ($creditVoucherDetails as $detail) {

                    $rin_date = Rin::where('rin_no', $detail->rin)->first();
                    $price = $detail->price ?? 0;
                    $totalCost = $detail->total_price ?? 0;

                    $result[$creditVoucher->voucher_no][$detail->item_code_id] = [
                        'rin_no' => $detail->rin ?? '',
                        'rin_date' => $rin_date->created_at ?? '',
                        'consigner' => $detail->rins->vendorDetail->name ?? '',
                        'cost_debatable' => $detail->cost_debatable ?? '',
                        'project_no' => $detail->inventoryProjects->project_name ?? '',
                        'project_code' => $detail->inventoryProjects->project_code ?? '',
                        'member_name' => $detail->members->name ?? '',
                        'item_code' => $detail->item_code_id ?? '',
                        'description' => $detail->description ?? '',
                        'quantity' => $detail->quantity ?? 0,
                        'remarks' => $detail->rins->remarks ?? '',
                        'nc_status' => $detail->rins->nc_status ?? '',
                        'au_status' => $detail->rins->au_status ?? '',
                        'rate' => $price ?? 0,
                        'tax' => $detail->rins->gst ?? 0,
                        'disc_percent' => $detail->disc_percent ?? 0,
                        'disc_amt' => $detail->disc_amt ?? 0,
                        'total_price' => $detail->total_price ?? 0,
                        'total_cost' => $totalCost ?? 0,
                    ];

                    $totalItemCost += (float)$price;
                    $total += (float)$totalCost;

                    $singleData[$creditVoucher->voucher_no] = [
                        'rin_no' => $detail->rin ?? '',
                        'rin_date' =>  $rin_date->created_at ?? '',
                        'item_type' => $detail->item_type ?? '',
                        'consignor' => $detail->consigner ?? '',
                        'member_name' => $detail->members->name ?? '',
                        'cost_debatable' => $detail->cost_debatable ?? '',
                        'project_no' => $detail->inventoryProjects->project_name ?? '',
                        'project_code' => $detail->inventoryProjects->project_code ?? '',
                    ];

                    $itemCount++;
                }
            }
        }
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        // Pass all credit vouchers to the PDF view
        $pdf = PDF::loadView('inventory.reports.inventory-crv-generate', compact(
            'logo',
            'creditVouchers',
            'creditVoucherDetails',
            'result',
            'totalItemCost',
            'total',
            'singleData',
            'itemCount',
            'singleCreditVoucher',
            'get_sir'
        ))->setPaper('a4', $paperType);


        return $pdf->download('credit-voucher-reports.pdf');
        // } catch (\Exception $e) {
        //     //   return response()->json(['error' => $e->getMessage()], 201);
        //     //   session()->flash('message', 'Data Not Found');
        //     return response()->json(['error' => 'Data Not Found'], 404);
        // }
    }
}
