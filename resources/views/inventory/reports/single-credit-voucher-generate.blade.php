@php
    use App\Helpers\Helper;
    use Illuminate\Support\Str;
@endphp
@foreach ($creditVouchers as $key => $creditVoucher)
    @if ($key > 0)
        <div style="page-break-before: always;"></div>
    @endif
    <!DOCTYPE html>
    <html lang="en">
    <title>RCI</title>
    <meta charset="utf-8" />
    <style>
        @page {
            margin: 25px;
            padding: 25px;
        }

        .page-break {

page-break-after: always;

}
    </style>

    <body style="background: #fff">
        @php
            $index = 1;
            $total_amt = 0;
            $total_items = 0;
            $total_rate = 0;
            $total_amount = 0;
            $taxes_amount = 0;
            $total_basic_cost = 0;
        @endphp
        @foreach ($result[$creditVoucher->voucher_no] as $key => $creditDetails)
            <div class="{{ !$loop->last ? 'page-break' : '' }}">


                <center>
                    <img src="{{ public_path('storage/' . $logo->logo) }}" style="max-width: 50px;">
                </center>
                <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff"
                    style="border-radius: 0px; margin: 0 auto">
                    <tbody>
                        <tr>
                            <td style="padding: 0 0px">
                                <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                                    <tbody>
                                        <tr>
                                            <td
                                                style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 5px 5px 0px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                                CENTER FOR HIGHENERGY SYSTEMS & SCIENCES (CHESS) <br />
                                                RCI CAMPUS, HYDERABAD - 500 069 <br /><br />
                                                CREDIT VOUCHER (CRV) <br />
                                                <br>

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 0 0px">
                                <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                                    <tbody>
                                        <tr>
                                            <td
                                                style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                      border: 1px solid #000;
                    ">
                                                CRV NO: &nbsp;
                                                {{ $result['voucher_no'] ?? '-' }}
                                            </td>
                                            <td colspan="2"
                                                style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                      border: 1px solid #000;
                    ">
                                                RIN NO: &nbsp;
                                                {{ $singleData[$creditVoucher->voucher_no]['rin_no'] ?? '-' }}
                                            </td>


                                            <td
                                                style="
                  font-size: 10px;
                  line-height: 14px;
                  font-weight: 400;
                  color: #000;
                  text-align: left;
                  padding: 0px 5px !important;
                  margin: 0px 0px !important;
                  border: 1px solid #000;
                  border-right:1px solid #000;
                ">

                                                Division Name:
                                                {{ $creditVoucher->division_name ?? '' }}

                                            </td>


                                        </tr>
                                        <tr>
                                            <td
                                                style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                      border: 1px solid #000;
                    ">
                                                CRV DATE: &nbsp; {{ $creditVoucher->voucher_date ?? '-' }}
                                            </td>
                                            <td colspan="2"
                                                style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                      border: 1px solid #000;
                    ">
                                                RIN DATE: &nbsp;
                                                {{ isset($singleData[$creditVoucher->voucher_no]['rin_date']) && $singleData[$creditVoucher->voucher_no]['rin_date'] ? date('d-m-Y', strtotime($singleData[$creditVoucher->voucher_no]['rin_date'])) : '-' }}
                                            </td>


                                            <td
                                                style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
border-right:1px solid #000;
                      border: 1px solid #000;
                    ">
                                                Group Name:
                                                {{ $creditVoucher->division_group ?? '' }}

                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    ">
                                                Store receipt date:
                                                {{ $creditVoucher->store_receipt_date ?? '' }}
                                            </td>
                                            <td
                                                style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    ">
                                                Demand no:
                                                {{ $creditVoucher->demand_no ?? '' }}
                                            </td>
                                            <td
                                                style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    ">
                                                ICC no: {{ $creditVoucher->invNo?->number ?? '' }}
                                            </td>

                                            <td
                                                style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      border-right:1px solid #000;
                    ">
                                                {{-- Division date:
                                            {{ $creditVoucher->division_date ?? '' }} --}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4"
                                                style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;

                    ">
                                                Consignor's Name & address: M/S. &nbsp;
                                                {{ Str::ucfirst($result['consigner_name']) ?? '-' }} &
                                                {{ $result['consigner_Address'] ?? '-' }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 0 0px">
                                <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                                    <tbody>
                                        <tr>
                                            <td colspan="3"
                                                style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    ">
                                                Supply Order Number: &nbsp;
                                                {{ $creditVoucher['supplyOrder']['order_number'] ?? 'N/A' }}<br />
                                                Supply Order Date: &nbsp;
                                                {{ isset($creditVoucher['supplyOrder']['created_at']) && $creditVoucher['supplyOrder']['created_at'] ? date('d-m-Y', strtotime($creditVoucher['supplyOrder']['created_at'])) : '-' }}
                                            </td>
                                            <td colspan="6"
                                                style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    ">
                                                Cost Debatable to Budget Head: &nbsp;
                                                {{ $singleData[$creditVoucher->voucher_no]['cost_debatable'] ?? '-' }}
                                                <br />
                                            </td>
                                            <td colspan="5"
                                                style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    ">
                                                Project No.: &nbsp;
                                                {{ $singleData[$creditVoucher->voucher_no]['project_no'] ?? '-' }}<br />
                                                Project Code: &nbsp;
                                                {{ $singleData[$creditVoucher->voucher_no]['project_code'] ?? '-' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      width:30px;

                    ">
                                                SI.No.
                                            </td>
                                            <td colspan="2"
                                                style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    ">
                                                Item Code
                                            </td>

                                            <td
                                                style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    ">
                                                Nomenclature/ description of Stores
                                            </td>
                                            <td
                                                style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    ">
                                                C/ NC / NCF
                                            </td>
                                            {{-- <td
                                            style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    ">
                                            A/U
                                        </td> --}}
                                            <td
                                                style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    ">
                                                Qty
                                            </td>
                                            <td
                                                style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    ">
                                                Rate<br />
                                                (Rs.)
                                            </td>
                                            <td
                                                style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    ">
                                                GST %
                                            </td>
                                            <td
                                                style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    ">
                                                Disc %
                                            </td>
                                            <td
                                                style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    ">
                                                Disc Amt
                                            </td>
                                            <td
                                                style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      white-space: nowrap;
                    ">
                                                Total Cost <br />
                                                (Rs.)
                                            </td>
                                            <td
                                                style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    ">
                                                Ledger <br />No.
                                            </td>
                                            <td
                                                style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    ">
                                                Page <br />No.
                                            </td>
                                            <td
                                                style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    ">
                                                Remarks
                                            </td>
                                        </tr>

                                        @foreach ($creditDetails as $key => $creditDetail)
                                            @php
                                                $total_items++;
                                                $total_rate += $creditDetail['rate'];
                                                $total_amount += $creditDetail['total_price'];
                                                $total_basic_cost +=
                                                    $creditDetail['total_price'] - $creditDetail['gst_amt'];
                                                $taxes_amount += $creditDetail['gst_amt'];
                                            @endphp
                                            <tr>
                                                <td
                                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                      border-right: 1px solid #000;
                    ">

                                                    {{ $index ?? '-' }}
                                                </td>
                                                @php $index++; @endphp
                                                <td colspan="2"
                                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                      border-right: 1px solid #000;
                    ">
                                                    {{ $creditDetail['item_code'] ?? '-' }}
                                                </td>

                                                <td
                                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                      border-right: 1px solid #000;
                    ">
                                                    {{ $creditDetail['description'] ?? '-' }}
                                                </td>
                                                <td
                                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                      border-right: 1px solid #000;
                    ">
                                                    {{ $creditDetail['nc_status'] ?? '-' }}
                                                </td>
                                                {{-- <td
                                                style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                      border-right: 1px solid #000;
                    ">
                                                {{ $creditDetail['au_status'] ?? '-' }}
                                            </td> --}}
                                                <td
                                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                      border-right: 1px solid #000;
                    ">
                                                    {{ $creditDetail['quantity'] ?? '-' }}
                                                </td>
                                                <td
                                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                      border-right: 1px solid #000;
                    ">
                                                    {{ formatIndianCurrency($creditDetail['rate'], 2) ?? '-' }}
                                                </td>
                                                <td
                                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                      border-right: 1px solid #000;
                    ">
                                                    {{ $creditDetail['gst_percent'] ?? 0 }} %
                                                </td>
                                                <td
                                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                      border-right: 1px solid #000;
                    ">
                                                    {{ formatIndianCurrency($creditDetail['disc_percent'], 2) . '%' ?? '-' }}
                                                </td>
                                                <td
                                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                      border-right: 1px solid #000;
                    ">
                                                    {{ $creditDetail['disc_amt'] ?? '-' }}
                                                </td>
                                                @php
                                                    if ($creditDetail['disc_amt'] == 0) {
                                                        $totalCost = $creditDetail['rate'] * $creditDetail['quantity'];
                                                    } else {
                                                        $totalCost = $creditDetail['total_price'];
                                                    }
                                                @endphp
                                                <td
                                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                      border-right: 1px solid #000;
                    ">
                                                    {{ formatIndianCurrency($creditDetail['total_price'], 2) ?? '-' }}
                                                </td>
                                                <td
                                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                      border-right: 1px solid #000;
                    ">
                                                    @php
                                                        $parts = explode('.', $creditDetail['item_code'] ?? '');
                                                        $firstNumber = $parts[0] ?? '-';
                                                    @endphp

                                                    {{ $creditDetail['ledger_no'] ?? '' }}
                                                </td>
                                                <td
                                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                      border-right: 1px solid #000;
                    ">
                                                    @php
                                                        $parts = explode('.', $creditDetail['item_code'] ?? '');
                                                        $middleNumber = $parts[1] ?? '-';
                                                    @endphp

                                                    {{ $creditDetail['folio_no'] ?? '' }}
                                                </td>

                                                <td
                                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                      border-right: 1px solid #000;
                    ">
                                                    {{ $creditDetail['remarks'] ?? '-' }}
                                                </td>
                                            </tr>
                                            @php
                                                $total_amt += (float) $totalCost;
                                            @endphp
                                        @endforeach
                                        @if ($loop->last)
                                        <tr>
                                            <td
                                                style="border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; font-size: 10px;">
                                                &nbsp;</td>
                                            <td
                                                style="border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; border-right: 0; font-size: 10px;">
                                            </td>
                                            <td
                                                style="border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; border-left: 0; font-size: 10px;">
                                            </td>

                                            <td colspan="4"
                                                style="border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; text-align: right; font-weight: 600; font-size: 10px;">
                                                Total Number of <br>
                                                Items:</td>
                                            <td
                                                style="text-align:center; border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; font-size: 10px;">
                                                {{ $total_items ?? '' }}
                                            </td>
                                            <td colspan="2"
                                                style="border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; border-left: 0; font-weight: 600; font-size: 10px;">
                                                Total Basic Cost (Rs)</td>
                                            <td colspan="4"
                                                style="text-align:right; border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; font-size: 10px;">
                                                {{ formatIndianCurrency($total_basic_cost, 2) ?? '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; font-size: 10px;">
                                                &nbsp;</td>
                                            <td
                                                style="border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; border-right: 0; font-size: 10px;">
                                            </td>
                                            <td
                                                style="border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; border-left: 0; font-size: 10px;">
                                            </td>

                                            <td colspan="4"
                                                style="border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; text-align: right; font-weight: 600; font-size: 10px;">
                                                Applicable Taxes (Tax Type & Percentage):</td>
                                            <td
                                                style="border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; font-size: 10px;">
                                                @php
                                                    $average_gst = 0;
                                                    if ($total_items > 0) {
                                                        $sum_gst = 0;
                                                        foreach ($result[$creditVoucher->voucher_no] as $item) {
                                                            $sum_gst += $item['gst_percent'] ?? 0;
                                                        }
                                                        $average_gst = round($sum_gst / $total_items, 2);
                                                    }
                                                @endphp
                                                <span>GST {{ $average_gst }}%</span>
                                            </td>
                                            <td colspan="2"
                                                style="border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; border-left: 0; font-weight: 600; font-size: 10px;">
                                                Taxes (Amount):</td>
                                            <td colspan="4"
                                                style="border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; text-align: right; font-size: 10px;">

                                                {{ formatIndianCurrency($taxes_amount, 2) ?? '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; font-size: 10px;">
                                                &nbsp;</td>
                                            <td
                                                style="border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; border-right: 0; font-size: 10px;">
                                            </td>
                                            <td
                                                style="border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; border-left: 0; font-size: 10px;">
                                            </td>

                                            <td colspan="4"
                                                style="border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; text-align: right; font-weight: 600; font-size: 10px;">
                                                Applicable Other Charges :</td>
                                            <td
                                                style="border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; font-size: 10px;">
                                            </td>
                                            <td colspan="2"
                                                style="border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; border-left: 0; font-weight: 600; font-size: 10px;">
                                                Other Charges (Amount):</td>
                                            <td colspan="4"
                                                style="border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; text-align: center; font-size: 10px;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="10"
                                                style="border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; text-align: right; font-weight: 600; font-size: 10px;">
                                                Total Cost Inclusive of Taxes, Duties and Other Charges :</td>
                                            @php

                                                $words = Helper::convert(Helper::formatDecimal($total_amount));
                                            @endphp
                                            <td colspan="4"
                                                style="text-align:right; border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; border-left: 0; font-weight: 600; font-size: 12px;">
                                                {{ formatIndianCurrency($total_amount, 2) ?? '' }} <br>({{ $words ?? '' }})
                                            </td>
                                        </tr>


                                        @endif

                                        <tr>
                                            <td colspan="3"
                                                style="border-top: 1px solid #000;
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                    ">
                                                <br />
                                                O I/c.<br />
                                                Stores Officer <br />
                                                Date:
                                            </td>
                                            <td colspan="11"
                                                style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: center;border-top: 1px solid #000;
                      padding: 0px 2px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                      border-right: 1px solid #000;
                    ">
                                                The above stores have been taken on charge and posted in
                                                Ledger
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"
                                                style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;border-top: 1px solid #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                    ">
                                            </td>
                                            <td colspan="8"
                                                style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;border-top: 1px solid #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                    ">
                                                <br>
                                                <br>
                                                I/ c. Ledger
                                            </td>
                                            <td colspan="3"
                                                style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;border-top: 1px solid #000;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-right: 1px solid #000;
                    ">
                                                <br>
                                                <br>
                                                <br>
                                                I/c. Ledger <br>Accounting
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"
                                                style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                      height: 10px;
                    ">
                                            </td>
                                            <td colspan="8"
                                                style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                      height: 10px;
                    ">
                                            </td>
                                            <td colspan="3"
                                                style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-right: 1px solid #000;
                      height: 10px;
                    ">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"
                                                style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                      height: 10px;
                    ">
                                            </td>
                                            <td colspan="8"
                                                style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                      height: 10px;
                    ">
                                            </td>
                                            <td colspan="3"
                                                style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-right: 1px solid #000;
                      height: 10px;
                    ">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="3"
                                                style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
">
                                            </td>
                                            <td colspan="8"
                                                style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                    ">
                                                SSO-II
                                            </td>
                                            <td colspan="3"
                                                style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-right: 1px solid #000;
                    ">
                                                Stores Officer
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"
                                                style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
      height: 10px;
                    ">
                                            </td>
                                            <td colspan="8"
                                                style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                      height: 10px;
                    ">
                                            </td>
                                            <td colspan="3"
                                                style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-right: 1px solid #000;
                      height: 10px;
                    ">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"
                                                style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                      height: 10px;
                    ">
                                            </td>
                                            <td colspan="8"
                                                style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                      height: 10px;
                    ">
                                            </td>
                                            <td colspan="3"
                                                style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-right: 1px solid #000;
                      height: 10px;
                    ">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"
                                                style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-bottom: 1px solid #000;
                      border-left: 1px solid #000;
                    ">
                                            </td>
                                            <td colspan="8"
                                                style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                      border-bottom: 1px solid #000;
                    ">
                                                Date:
                                            </td>
                                            <td colspan="3"
                                                style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-right: 1px solid #000;
                      border-bottom: 1px solid #000;
                    ">
                                                Date:
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endforeach
    </body>

    </html>
@endforeach
