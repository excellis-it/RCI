@php
    use App\Helpers\Helper;
@endphp
@foreach ($externalIssueVouchers as $key => $externalIssueVoucher)
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
        </style>

        <body style="background: #fff">
            <center>
                <img src="{{ public_path('storage/' . $logo->logo) }}" style="max-width: 50px;">
            </center>
            <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                <tbody>
                    <tr>
                        <td>
                            <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                                <tbody>
                                    <tr>
                                        <td></td>

                                        <td
                                            style="
                      font-size: 10px;
                      text-align: right;
                      font-weight: bold;
                    ">
                                            DRDO.SM.16
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 14px"></td>
                                        <td
                                            style="
                      text-align: center;
                      font-weight: bold;
                      font-size: 14px;
                      width: 100%;
                    ">
                                            CENTER FOR HIGHENERGY SYSTEMS & SCIENCES (CHESS)<br />
                                            RCI CAMPUS, HYDERABAD - 500 069<br /><br />
                                            EXTERNAL ISSUE VOUCHER (EIV)
                                        </td>
                                        <td style="font-size: 14px; text-align: right"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                style="padding-top: 20px">
                                <tbody>
                                    <tr>
                                        <td
                                            style="
                      font-size: 14px;
                      width: 70%;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                    ">
                                            Loan/Permanent issue* <br />
                                            Consignee
                                            :{{ $externalIssueVoucher->vendor->name ?? ($externalIssueVoucher->other_consignee_name ?? '') }}<br />
                                            ....................................................................................
                                            <br />
                                            ....................................................................................<br />
                                            Consignee RV No. &
                                            Date***..................................................(if
                                            applicable) <br />
                                            Material/Trial Stores Gate Pass
                                            No........................................................
                                            <br />
                                            Loan
                                            period...................................................................(if
                                            applicable)
                                        </td>
                                        <td
                                            style="
                      font-size: 14px;
                      line-height: 18px;
                      width: 30%;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding-left: 10px;
                    ">
                                            Free/Payment Issue*<br />
                                            EIV No:{{ $externalIssueVoucher->voucher_no ?? '' }}<br />
                                            Date&nbsp; &nbsp; &nbsp; &nbsp;
                                            .................................................. <br />

                                            <br />
                                            Authority for Issue:{{ $externalIssueVoucher->authority_of_issue ?? '' }}
                                            <br />
                                            ICC No.: {{ $externalIssueVoucher->inventoryNumber->number ?? '' }}<br />
                                            Division Name:
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center"
                                style="margin-top: 2rem">
                                <tbody>
                                    <tr>
                                        <th valign="top"
                                            style="
                      border: 1px solid #000;
                      padding: 5px;
                      font-size: 12px;
                      text-align: center;
                      font-weight: 600;
                    ">
                                            SI.No
                                        </th>
                                        <th valign="top"
                                            style="
                      border: 1px solid #000;
                      padding: 5px;
                      font-size: 12px;
                      text-align: center;
                      font-weight: 600;
                    ">
                                            Item Code
                                        </th>
                                        <th valign="top"
                                            style="
                      border: 1px solid #000;
                      padding: 5px;
                      font-size: 12px;
                      text-align: center;
                      font-weight: 600;
                    ">
                                            Nomenclature
                                        </th>

                                        <th valign="top"
                                            style="
                      border: 1px solid #000;
                      padding: 5px;
                      font-size: 12px;
                      text-align: center;
                      font-weight: 600;
                    ">
                                            A/U / Item <br />
                                            Type (C <br />
                                            /NC <br />
                                            (NCF)
                                        </th>
                                        <th valign="top"
                                            style="
                      border: 1px solid #000;
                      padding: 5px;
                      font-size: 12px;
                      text-align: center;
                    ">
                                            Ledger & <br />
                                            page No.
                                        </th>
                                        <th valign="top"
                                            style="
                  border: 1px solid #000;
                  padding: 5px;
                  font-size: 12px;
                  text-align: center;
                ">
                                            Unit Rate
                                        </th>
                                        <th valign="top"
                                            style="
                      border: 1px solid #000;
                      padding: 5px;
                      font-size: 12px;
                      text-align: center;
                      font-weight: 600;
                    ">
                                            Quantity <br />
                                            Issued
                                        </th>
                                        <th valign="top"
                                            style="
                      border: 1px solid #000;
                      padding: 5px;
                      font-size: 12px;
                      text-align: center;
                      font-weight: 600;
                    ">
                                            Total Cost <br />
                                            (Including <br />
                                            Taxes)
                                        </th>
                                        <th valign="top"
                                            style="
                      border: 1px solid #000;
                      padding: 5px;
                      font-size: 12px;
                      text-align: center;
                      font-weight: 600;
                    ">
                                            Consignee <br />
                                            Acceptance <br />
                                            Date
                                        </th>
                                        <th valign="top"
                                            style="
                      border: 1px solid #000;
                      padding: 5px;
                      font-size: 12px;
                      text-align: center;
                      font-weight: 600;
                    ">
                                            Remarks
                                        </th>
                                    </tr>
                                    @php $total_cost = 0 @endphp
                                    @foreach ($externalIssueVoucher->details as $external_issue_voucher_detail)
                                        <tr>
                                            <td
                                                style="
                      border: 1px solid #000;
                      padding: 5px;
                      text-align: center;
                      font-weight: 600;
                      height: 50px;
                      font-size: 12px;
                    ">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td
                                                style="
                      border: 1px solid #000;
                      padding: 5px;
                      text-align: center;
                      font-weight: 600;
                      height: 50px;
                      font-size: 12px;
                    ">
                                                {{ $external_issue_voucher_detail->item->code ?? '' }}
                                            </td>
                                            <td
                                                style="
                      border: 1px solid #000;
                      padding: 5px;
                      text-align: center;
                      font-weight: 600;
                      height: 50px;
                      font-size: 12px;
                    ">
                                                {{ $external_issue_voucher_detail->item->description ?? '' }}
                                            </td>

                                            <td
                                                style="
                      border: 1px solid #000;
                      padding: 5px;
                      text-align: center;
                      font-weight: 600;
                      height: 50px;
                      font-size: 12px;
                    ">
                                                {{ $external_issue_voucher_detail->item->ncStatus->status ?? '' }}
                                            </td>
                                            <td
                                                style="
                      border: 1px solid #000;
                      padding: 5px;
                      text-align: center;
                      font-weight: 600;
                      height: 50px;
                      font-size: 12px;
                    ">
                                                {{ Helper::getStockByInvId($externalIssueVoucher->inventoryNumber->id, $external_issue_voucher_detail->item->id)['ledger_no'] ?? '' }}
                                                <br>
                                                {{ Helper::getStockByInvId($externalIssueVoucher->inventoryNumber->id, $external_issue_voucher_detail->item->id)['page_no'] ?? '' }}

                                            </td>
                                            <td
                                                style="
                      border: 1px solid #000;
                      padding: 5px;
                      text-align: center;
                      font-weight: 600;
                      height: 50px;
                      font-size: 12px;
                    ">
                                                {{ $external_issue_voucher_detail->unit_price ?? '' }}
                                            </td>
                                            <td
                                                style="
                      border: 1px solid #000;
                      padding: 5px;
                      text-align: center;
                      font-weight: 600;
                      height: 50px;
                      font-size: 12px;
                    ">
                                                {{ $external_issue_voucher_detail->quantity ?? '' }}
                                            </td>
                                            <td
                                                style="
                      border: 1px solid #000;
                      padding: 5px;
                      text-align: right;
                      font-weight: 600;
                      height: 50px;
                      font-size: 12px;
                    ">
                                                {{ formatIndianCurrency($external_issue_voucher_detail->total_cost, 2) ?? '' }}
                                            </td>
                                            <td
                                                style="
                      border: 1px solid #000;
                      padding: 5px;
                      text-align: center;
                      font-weight: 600;
                      height: 50px;
                      font-size: 12px;
                    ">
                                            </td>
                                            <td
                                                style="
                      border: 1px solid #000;
                      padding: 5px;
                      text-align: center;
                      font-weight: 600;
                      height: 50px;
                      font-size: 12px;
                    ">
                                                {{ $external_issue_voucher_detail->remarks ?? '' }}</td>
                                        </tr>
                                        @php
                                            $total_cost += $external_issue_voucher_detail->total_cost;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                style="padding-top: 20px">
                                <tbody>
                                    <tr>
                                        <td
                                            style="
                      font-size: 14px;
                      width: 80%;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                    ">
                                        </td>
                                        <td
                                            style="
                      font-size: 14px;
                      line-height: 18px;
                      width: 20%;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding-left: 10px;
                    ">
                                            Total Cost of Issue: {{ formatIndianCurrency($total_cost, 2) ?? '' }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                style="padding-top: 20px">
                                <tbody>
                                    <tr>
                                        <td valign="middle"
                                            style="
                      font-size: 14px;
                      width: 33%;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                    ">
                                            <span style="display: flex">
                                                <span>Signature of <br />
                                                    Stock Holder</span>
                                                <span style="padding-left: 200px">Signature of <br />
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    Consignee</span></span>

                                            <br />
                                            / Project Officer <br />
                                            *Strike out whichever
                                            <span style="text-decoration: underline">
                                                not applicable<br />
                                                **Applicable in case of Trial Stores Gate Pass <br />
                                                ***Two copies duly receipted to be forwarded to
                                                consignor</span>
                                        </td>
                                        <td valign="top"
                                            style="
                      font-size: 14px;
                      width: 33%;
                      line-height: 18px;

                      padding: 10px 30px 30px 30px;
                      color: #000;
                      text-align: left;
                      padding-left: 10px;
                      border: 1px solid #000;
                      height: 120px;
                    ">
                                            1. Items charged off from respective ledger. <br />
                                            2. Loan register action taken for loan issue items. <br />
                                            3. Approval accorded by CFA.
                                            <br /><br /><br /><br /><br /><br /><br />

                                            <span style="text-align: right; display: block">O/IC Ledger Section</span>
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
@endforeach
