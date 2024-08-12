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
                                    SIR NO: &nbsp; {{ $creditVoucher->id ?? 'N/A' }}
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
                                    DC/INVOICE NO: &nbsp; {{ $creditVoucher->voucher_no ?? 'N/A' }}
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
                      text-transform: uppercase;
                      border: 1px solid #000;
                    ">
                                    RIN NO: &nbsp; {{ $singleData[$creditVoucher->voucher_no]['rin_no']   ?? 'N/A' }}
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
                      text-transform: uppercase;
                      border: 1px solid #000;
                    ">
                                    CRV NO: &nbsp; {{ $creditVoucher->voucher_no  ?? 'N/A' }}
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
                                    SIR DATE: &nbsp; {{ date('d-m-Y') }}
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
                                    DC/INVOICE NO DATE: &nbsp; {{ $creditVoucher->voucher_date  ?? 'N/A' }}
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
                      text-transform: uppercase;
                      border: 1px solid #000;
                    ">
                                    RIN DATE: &nbsp;
                                    {{ $singleData[$creditVoucher->voucher_no]['rin_date']  ?? 'N/A' }}
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
                      text-transform: uppercase;
                      border: 1px solid #000;
                    ">
                                    CRV DATE: &nbsp; {{ $creditVoucher->voucher_date  ?? 'N/A' }}
                                </td>
                            </tr>
                            <tr>
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
                                    Consignor's Name & address: M/S. &nbsp;
                                    {{ $singleData[$creditVoucher->voucher_no]['consignor']  ?? 'N/A' }}
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
                                    Authority: &nbsp; {{ $singleData[$creditVoucher->voucher_no]['member_name']  ?? 'N/A' }}<br />
                                    Date: &nbsp; {{ $creditVoucher->voucher_date  ?? 'N/A' }}
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
                                    {{ $singleData[$creditVoucher->voucher_no]['cost_debatable']  ?? 'N/A' }} <br />
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
                                    Project No.: &nbsp;
                                    {{ $singleData[$creditVoucher->voucher_no]['project_no']  ?? 'N/A' }}<br />
                                    Project Code: &nbsp; {{ $singleData[$creditVoucher->voucher_no]['project_code']  ?? 'N/A' }}
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
                    ">
                                    SI.No.
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
                                    C/ NC
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
                                    A/U
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
                                    Tax %
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
                                    Folio <br />No.
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
                            @php $index = 1; @endphp
                            @foreach ($result[$creditVoucher->voucher_no] as $key => $creditDetail)
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
                    @php $index++; @endphp
                                        {{ $index  ?? 'N/A' }}
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
                                        {{  $creditDetail['item_code']  ?? 'N/A' }}
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
                                        {{ $creditDetail['description']  ?? 'N/A' }}
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
                                        {{  $creditDetail['nc_status']  ?? 'N/A' }}
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
                                        {{ $creditDetail['au_status']  ?? 'N/A' }}
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
                                        {{ $creditDetail['quantity']  ?? 'N/A' }}
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
                                        {{ $creditDetail['rate']  ?? 'N/A' }}
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
                                        {{ $creditDetail['tax']  ?? 'N/A' }}%
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
                                        {{  $creditDetail['total_cost']  ?? 'N/A' }}
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
                                        {{  $creditDetail['remarks']  ?? 'N/A' }}
                                    </td>
                                </tr>
                            @endforeach

                            
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
                                    <span style="text-align: right">{{ $itemCount ?? 'N/A'  }}</span>
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
                                    Total Item Cost (Rs.)
                                    <span style="text-align: right">{{ $totalItemCost  ?? 'N/A' }}/-</span>
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
                                    {{ $total }}/-
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
                                      use App\Helpers\Helper;

                                      $words = Helper::convert($total);
                                @endphp
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
                                    Inclusive of taxes TOTAL COST (Rs.)<br />
                                    In words: {{ $words  ?? 'N/A' }}
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
                                    {{ $total  ?? 'N/A' }}/-
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
                                <td colspan="9"
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
                                <td
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
                                    I/c. Ledger Accounting
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
                                <td
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
                                <td
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
                                <td
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
                                <td
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
                                <td
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
                                <td
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
