@foreach ($creditVouchers as $creditVoucher)
<!DOCTYPE html>
<html lang="en">
<title>RCI</title>
<meta charset="utf-8" />

<body style="background: #fff">
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
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                      text-decoration: underline;
                    ">
                                    CENTER FOR HIGHENERGY SYSTEMS & SCIENCES (CHESS) <br />
                                    RCI CAMPUS, HYDERABAD - 500 069 <br />
                                    CERTIFICATE RECEIPT VOUCHER (CRV) <br />
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
                                <td style="border: 1px solid #000; padding: 5px; font-size: 10px;">SIR NO:
                                    {{ $get_sir->sirNo->sir_no ?? '-' }}</td>
                                <td colspan="2" style="border: 1px solid #000; padding: 5px; font-size: 10px;">
                                    DC/INVOICE NO: {{ $creditVoucher->invoice_no ?? '-' }}</td>
                                <td style="border: 1px solid #000; padding: 5px; font-size: 10px;">RIN NO:
                                    {{ $result[$creditVoucher->voucher_no][0]['rin_no'] ?? '-' }}</td>
                                <td style="border: 1px solid #000; padding: 5px; font-size: 10px;">CRV NO:
                                    {{ $result['voucher_no'] ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #000; padding: 5px; font-size: 10px;">SIR DATE:
                                    {{ isset($get_sir->sirNo->sir_date) ? date('d-m-Y', strtotime($get_sir->sirNo->sir_date)) : '-' }}
                                </td>
                                <td colspan="2" style="border: 1px solid #000; padding: 5px; font-size: 10px;">
                                    DC/INVOICE NO DATE:
                                    {{ $creditVoucher->invoice_date ? date('d-m-Y', strtotime($creditVoucher->invoice_date)) : '-' }}
                                </td>
                                <td style="border: 1px solid #000; padding: 5px; font-size: 10px;">RIN DATE:
                                    {{ isset($result[$creditVoucher->voucher_no][0]['rin_date']) ? date('d-m-Y', strtotime($result[$creditVoucher->voucher_no][0]['rin_date'])) : '-' }}
                                </td>
                                <td style="border: 1px solid #000; padding: 5px; font-size: 10px;">CRV DATE:
                                    {{ $creditVoucher->voucher_date ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td colspan="5" style="border: 1px solid #000; padding: 5px; font-size: 10px;">
                                    Consignor's Name &amp; address: M/S. {{ $result['consigner_name'] ?? '-' }} &amp;
                                    {{ $result['consigner_Address'] ?? '-' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="font-size: 10px;">
                    <table style="width: 100%; border: 0px solid #000; border-collapse: collapse; font-size: 10px;"
                        cellspacing="0" cellpadding="5">
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
                                     Supply Order Number: &nbsp; {{ $creditVoucher['supplyOrder']['order_number']  ?? 'N/A' }}<br />
                                     Supply Order Date: &nbsp; {{ isset($creditVoucher['supplyOrder']['created_at']) && ($creditVoucher['supplyOrder']['created_at']) ?  date('d-m-Y', strtotime($creditVoucher['supplyOrder']['created_at'])) : '-'}}
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
                                    {{ $result[$creditVoucher->voucher_no]['cost_debatable']  ?? '-' }} <br />
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
                                    {{ $result[$creditVoucher->voucher_no]['project_no']  ?? '-' }}<br />
                                    Project Code: &nbsp; {{ $result[$creditVoucher->voucher_no]['project_code']  ?? '-' }}
                                </td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #000; padding: 5px; font-size: 10px;">SI.No.</td>
                                <td style="border: 1px solid #000; padding: 5px; font-size: 10px;">Item Code</td>
                                <td style="border: 1px solid #000; padding: 5px; font-size: 10px;">Nomenclature/
                                    description of Stores</td>
                                <td style="border: 1px solid #000; padding: 5px; font-size: 10px;">C/ NC / NCF</td>
                                <td style="border: 1px solid #000; padding: 5px; font-size: 10px;">A/U</td>
                                <td style="border: 1px solid #000; padding: 5px; font-size: 10px;">Qty</td>
                                <td style="border: 1px solid #000; padding: 5px; font-size: 10px;">Rate<br /> (Rs.)</td>
                                <td style="border: 1px solid #000; padding: 5px; font-size: 10px;">Tax %</td>
                                <td style="border: 1px solid #000; padding: 5px; font-size: 10px;">Disc %</td>
                                <td style="border: 1px solid #000; padding: 5px; font-size: 10px;">Disc Amt</td>
                                <td style="border: 1px solid #000; padding: 5px; font-size: 10px;">Total Cost <br />
                                    (Rs.)</td>
                                <td style="border: 1px solid #000; padding: 5px; font-size: 10px;">Ledger <br />No.</td>
                                <td style="border: 1px solid #000; padding: 5px; font-size: 10px;">Folio <br />No.</td>
                                <td style="border: 1px solid #000; padding: 5px; font-size: 10px;">Remarks</td>
                            </tr>
                            @php $index = 1; $total_amt = 0; @endphp
                            @foreach ($result[$creditVoucher->voucher_no] as $key => $creditDetail)
                                <tr>
                                    <td style="border: 1px solid #000; padding: 5px; font-size: 10px;">
                                        {{ $loop->iteration }}</td>
                                    <td style="border: 1px solid #000; padding: 5px; font-size: 10px;">
                                        {{ $creditDetail['item_code'] ?? '-' }}</td>
                                    <td style="border: 1px solid #000; padding: 5px; font-size: 10px;">
                                        {{ $creditDetail['description'] ?? '-' }}</td>
                                    <td style="border: 1px solid #000; padding: 5px; font-size: 10px;">
                                        {{ $creditDetail['nc_status'] ?? '-' }}</td>
                                    <td style="border: 1px solid #000; padding: 5px; font-size: 10px;">
                                        {{ $creditDetail['au_status'] ?? '-' }}</td>
                                    <td style="border: 1px solid #000; padding: 5px; font-size: 10px;">
                                        {{ $creditDetail['quantity'] ?? '-' }}</td>
                                    <td style="border: 1px solid #000; padding: 5px; font-size: 10px;">
                                        {{ $creditDetail['rate'] ?? '-' }}</td>
                                    <td style="border: 1px solid #000; padding: 5px; font-size: 10px;">
                                        {{ $creditDetail['tax'] ?? '-' }}%</td>
                                    <td style="border: 1px solid #000; padding: 5px; font-size: 10px;">
                                        {{ $creditDetail['disc_percent'] ?? '-' }}%</td>
                                    <td style="border: 1px solid #000; padding: 5px; font-size: 10px;">
                                        {{ $creditDetail['disc_amt'] ?? '-' }}</td>
                                        @php
                                        if($creditDetail['disc_amt'] == 0) {
                                            $totalCost = $creditDetail['rate'] * $creditDetail['quantity'];
                                        } else {
                                            $totalCost = $creditDetail['total_price'];
                                        }
                                    @endphp
                                    <td style="border: 1px solid #000; padding: 5px; font-size: 10px;">
                                        {{ $creditDetail['total_price'] ?? '-' }}</td>
                                    <td style="border: 1px solid #000; padding: 5px; font-size: 10px;">
                                        {{ $creditDetail['remarks'] ?? '-' }}</td>
                                </tr>
                                @php
                                    (float)$total_amt += (float)$totalCost;
                                @endphp
                            @endforeach
                            <tr>
                                <td colspan="3" style="border: 1px solid #000; padding: 5px; font-size: 10px;">Total
                                    Number of Items: {{ $itemCount ?? '-' }}</td>
                                <td colspan="7" style="border: 1px solid #000; padding: 5px; font-size: 10px;">Total
                                    Item Cost (Rs.) {{ $totalItemCost ?? '-' }}/-</td>
                                <td colspan="4" style="border: 1px solid #000; padding: 5px; font-size: 10px;">
                                    {{ $total }}/-</td>
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
                      border: 1px solid #000;
                    ">
                                    Total Number Number of Items:
                                    <span style="text-align: right">{{ $itemCount ?? '-' }}</span>
                                </td>
                                <td colspan="7"
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
                                    Total Item Cost (Rs.)
                                    <span style="text-align: right">{{ $totalItemCost ?? '-' }}/-</span>
                                </td>

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
                                    {{ $total_amt }}/-
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
                      border-right: 1px solid #000;
                      height: 100px;
                    ">
                                    <br /><br /><br /><br /><br /><br />
                                    O I/c.<br /><br />
                                    Stores Officer <br /><br />
                                    Date:
                                </td>
                                @php

                                    $words = App\Helpers\Helper::convert($total_amt);
                                @endphp
                                <td colspan="7"
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
                                    Inclusive of taxes TOTAL COST (Rs.)<br />
                                    In words: {{ $words ?? '-' }}
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
                      border: 1px solid #000;
                    ">
                                    {{ $total_amt ?? '-' }}/-
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
                                <td colspan="11"
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
                                    I/ c. Ledger
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
</body>
</html>
    <div style="page-break-before: always;"></div> <!-- This ensures the next report starts on a new page -->
@endforeach
