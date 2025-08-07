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
        page-break-before: always;
    }

    /* table {
            width: 100%;
            border-collapse: collapse;
        } */

    td {
        padding: 5px;
        font-size: 14px;
        line-height: 20px;
    }
</style>

<body style="background: #fff">
    <center>
        <img src="{{ public_path('storage/' . $logo->logo) }}" style="max-width: 50px;padding-bottom: 5px">
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

                                    line-height: 14px;
                                    font-weight: 600;
                                    color: #000;
                                    text-align: left;

                                    margin: 0px 0px !important;
                                    text-transform: uppercase;

                                  ">
                                    DR.
                                </td>
                                <td
                                    style="

                                    line-height: 14px;
                                    font-weight: 600;
                                    color: #000;
                                    text-align: right;

                                    margin: 0px 0px !important;
                                    text-transform: uppercase;

                                  ">
                                    {{ $print_date ?? '' }}

                                </td>
                            </tr>
                        </tbody>
                    </table>


                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                            <tr>
                                <td
                                    style="

              line-height: 14px;
              font-weight: 600;
              color: #000;
              text-align: center;

              margin: 0px 0px !important;
              text-transform: uppercase;

            ">
                                    CENTER FOR HIGHENERGY SYSTEMS & SCIENCES (CHESS) <br />
                                    RCI CAMPUS, HYDERABAD - 500 069 <br />
                                    IMPREST (A/c No {{ $setting->public_bank_ac }}) Account as on
                                    {{ $report_date ?? '' }}
                                    <br />
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

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                </td>
                                <td
                                    style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                </td>
                                <td colspan="2"
                                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;

                      margin: 0px 0px !important;
                      text-transform: uppercase;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    RECEIPTS
                                </td>
                                <td
                                    style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    Cheque
                                </td>
                                <td
                                    style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    Voucher
                                </td>
                                <td
                                    style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    Cash
                                </td>
                                <td
                                    style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    Bank
                                </td>
                                <td rowspan="2"
                                    style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    Initials
                                    of the
                                    Officer
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    Date
                                </td>
                                <td
                                    style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    SLNo
                                </td>
                                <td
                                    style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    From Whom
                                </td>
                                <td
                                    style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    On what A/c
                                </td>
                                <td
                                    style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    Number
                                </td>
                                <td
                                    style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    Number
                                </td>
                                <td
                                    style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    Rs.
                                </td>
                                <td
                                    style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    Rs.
                                </td>
                            </tr>





                            <tr>
                                <td
                                    style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">

                                    @php
                                        // Check if $report_date is in dd/mm/yy format
                                        if (preg_match('/^\d{2}\/\d{2}\/\d{2}$/', $report_date)) {
                                            $date_parts = explode('/', $report_date);
                                            $day = $date_parts[0];
                                            $month = $date_parts[1];
                                            $year = '20' . $date_parts[2]; // Assuming year is 20xx
                                            echo $day . '-' . $month . '-' . $year; // Indian format: dd-mm-yyyy
                                        } else {
                                            // Try to convert any valid date string to dd-mm-yyyy
                                            echo $report_date ? date('d-m-Y', strtotime($report_date)) : '';
                                        }
                                    @endphp

                                </td>

                                <td
                                    style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                </td>
                                <td
                                    style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;

                      margin: 0px 0px !important;
                      text-transform: uppercase;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                </td>
                                <td
                                    style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    Opening Balance
                                </td>
                                <td
                                    style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">

                                </td>
                                <td
                                    style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                </td>
                                <td
                                    style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    {{ isset($book1_data['opening_blanace_cash_in_hand']) && $book1_data['opening_blanace_cash_in_hand'] ? formatIndianCurrency($book1_data['opening_blanace_cash_in_hand'], 2) : 0 }}
                                </td>
                                <td
                                    style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    {{ isset($book1_data['opening_blanace_cash_in_bank']) && $book1_data['opening_blanace_cash_in_bank'] ? formatIndianCurrency($book1_data['opening_blanace_cash_in_bank'], 2) : 0 }}
                                </td>
                                <td
                                    style="

                line-height: 14px;
                font-weight: 600;
                color: #000;
                text-align: center;

                margin: 0px 0px !important;
                border: 1px solid #000;
                height: 5px;
              ">
                                </td>
                            </tr>


                            @if ($book1_data['cash_withdraws'])
                                @foreach ($book1_data['cash_withdraws'] as $index => $cash_withdraw)
                                    <tr>
                                        <td
                                            style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                            {{ $cash_withdraw->vr_date ? \Carbon\Carbon::parse($cash_withdraw->vr_date)->format('d-m-Y') : '' }}

                                        </td>
                                        <td
                                            style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                            {{ $index + 1 }}
                                        </td>
                                        <td
                                            style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;

                      margin: 0px 0px !important;
                      text-transform: uppercase;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                            CASH WITHDRAWAL
                                        </td>
                                        <td
                                            style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">

                                        </td>
                                        <td
                                            style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                            {{ $cash_withdraw->chq_no }}
                                        </td>
                                        <td
                                            style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                            {{ $cash_withdraw->vr_no ?? '' }}
                                        </td>
                                        <td
                                            style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                            {{ $cash_withdraw->amount ? formatIndianCurrency($cash_withdraw->amount, 2) : 0 }}
                                        </td>
                                        <td
                                            style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">

                                        </td>
                                        <td
                                            style="

                line-height: 14px;
                font-weight: 600;
                color: #000;
                text-align: center;

                margin: 0px 0px !important;
                border: 1px solid #000;
                height: 5px;
              ">
                                        </td>
                                    </tr>
                                @endforeach
                            @endif



                            @if ($book1_data['cash_receipts'])
                                @foreach ($book1_data['cash_receipts'] as $index => $cash_receipt)
                                    <tr>
                                        <td
                                            style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                            {{ $cash_receipt->rct_vr_date ? \Carbon\Carbon::parse($cash_receipt->rct_vr_date)->format('d-m-Y') : '' }}

                                        </td>
                                        <td
                                            style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                            {{ $index + 1 }}
                                        </td>
                                        <td
                                            style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                            By DV No. {{ $cash_receipt->dv_no ?? '' }} of DV Date
                                            {{ $cash_receipt->dv_date ? \Carbon\Carbon::parse($cash_receipt->dv_date)->format('d-m-Y') : '' }}

                                        </td>
                                        <td
                                            style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                            Repayment Of Bill No. {{ $cash_receipt->cdaBill->cda_bill_no ?? '' }}
                                        </td>
                                        <td
                                            style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                            {{ $cash_receipt->dv_no ?? '' }}

                                        </td>
                                        <td
                                            style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                            {{ $cash_receipt->rct_vr_no ?? '' }}

                                        </td>
                                        <td
                                            style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">

                                        </td>
                                        <td
                                            style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                            {{ $cash_receipt->rct_vr_amount ? formatIndianCurrency($cash_receipt->rct_vr_amount, 2) : 0 }}
                                        </td>
                                        <td
                                            style="

                line-height: 14px;
                font-weight: 600;
                color: #000;
                text-align: center;

                margin: 0px 0px !important;
                border: 1px solid #000;
                height: 5px;
              ">

                                        </td>
                                    </tr>
                                @endforeach
                            @endif


                            <tr>
                                <td colspan="6"
                                    style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    Total Amount
                                </td>
                                <td
                                    style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    {{ $book1_data['totalCashInHandBalance'] ? formatIndianCurrency($book1_data['totalCashInHandBalance'], 2) : 0 }}
                                </td>
                                <td
                                    style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    {{ $book1_data['totalCashInBankBalance'] ? formatIndianCurrency($book1_data['totalCashInBankBalance'], 2) : 0 }}
                                </td>
                                <td
                                    style="

                line-height: 14px;
                font-weight: 600;
                color: #000;
                text-align: center;

                margin: 0px 0px !important;
                border: 1px solid #000;
                height: 5px;
              ">
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


<div class="page-break"></div>





<!DOCTYPE html>
<html lang="en">
<title>RCI</title>
<meta charset="utf-8" />

<body style="background: #fff">
    <center>
        <img src="{{ public_path('storage/' . $logo->logo) }}" style="max-width: 50px;padding-bottom: 5px">
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

                                    line-height: 14px;
                                    font-weight: 600;
                                    color: #000;
                                    text-align: left;

                                    margin: 0px 0px !important;
                                    text-transform: uppercase;

                                  ">
                                    CR.
                                </td>
                                <td
                                    style="

                                    line-height: 14px;
                                    font-weight: 600;
                                    color: #000;
                                    text-align: right;

                                    margin: 0px 0px !important;
                                    text-transform: uppercase;

                                  ">
                                    {{ $print_date ?? '' }}

                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                            <tr>
                                <td
                                    style="

              line-height: 14px;
              font-weight: 600;
              color: #000;
              text-align: center;

              margin: 0px 0px !important;
              text-transform: uppercase;

            ">
                                    CENTER FOR HIGHENERGY SYSTEMS & SCIENCES (CHESS) <br />
                                    RCI CAMPUS, HYDERABAD - 500 069 <br />
                                    IMPREST (A/c No {{ $setting->public_bank_ac }}) Account as on
                                    {{ $report_date ?? '' }}
                                    <br />
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

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                </td>
                                <td
                                    style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                </td>
                                <td colspan="2"
                                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;

                      margin: 0px 0px !important;
                      text-transform: uppercase;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    PAYMENTS
                                </td>
                                <td
                                    style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    Cheque
                                </td>
                                <td
                                    style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    Voucher
                                </td>
                                <td
                                    style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    Cash
                                </td>
                                <td
                                    style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    Bank
                                </td>
                                <td rowspan="2"
                                    style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    Initials
                                    of the
                                    Officer
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    Date
                                </td>
                                <td
                                    style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    SLNo
                                </td>
                                <td
                                    style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    To Whom
                                </td>
                                <td
                                    style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    On what A/c
                                </td>
                                <td
                                    style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    Number
                                </td>
                                <td
                                    style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    Number
                                </td>
                                <td
                                    style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    Rs.
                                </td>
                                <td
                                    style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    Rs.
                                </td>
                            </tr>




                            @if ($book1_data['cash_withdraws'])
                                @foreach ($book1_data['cash_withdraws'] as $index => $cash_withdraw)
                                    <tr>
                                        <td
                                            style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                            {{ $cash_withdraw->vr_date ? \Carbon\Carbon::parse($cash_withdraw->vr_date)->format('d-m-Y') : '' }}

                                        </td>
                                        <td
                                            style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                            {{ $index + 1 }}
                                        </td>
                                        <td
                                            style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;

                      margin: 0px 0px !important;
                      text-transform: uppercase;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                            CASH WITHDRAWAL
                                        </td>
                                        <td
                                            style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">

                                        </td>
                                        <td
                                            style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                            {{ $cash_withdraw->chq_no }}
                                        </td>
                                        <td
                                            style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                            {{ $cash_withdraw->vr_no ?? '' }}
                                        </td>
                                        <td
                                            style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">

                                        </td>
                                        <td
                                            style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                            {{ formatIndianCurrency($cash_withdraw->amount, 2) }}
                                        </td>
                                        <td
                                            style="

                line-height: 14px;
                font-weight: 600;
                color: #000;
                text-align: center;

                margin: 0px 0px !important;
                border: 1px solid #000;
                height: 5px;
              ">
                                        </td>
                                    </tr>
                                @endforeach
                            @endif



                            @if ($book2_data['cda_bills'])
                                @foreach ($book2_data['cda_bills'] as $index => $cda_bill)
                                    <tr>
                                        <td
                                            style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                            {{ $cda_bill->cda_bill_date ? \Carbon\Carbon::parse($cda_bill->cda_bill_date)->format('d-m-Y') : '' }}

                                        </td>
                                        <td
                                            style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                            {{ $index + 1 }}
                                        </td>
                                        <td
                                            style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;

                      margin: 0px 0px !important;
                      text-transform: uppercase;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                            {{ $cda_bill->member->name ?? '' }},
                                            {{ $cda_bill->member->desigs->designation ?? '' }}
                                        </td>
                                        <td
                                            style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                            {{ 'MISC' }}
                                        </td>

                                        <td
                                            style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                            {{ $cda_bill->chq_no ?? '' }}

                                        </td>
                                        <td
                                            style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                            {{ $cda_bill->bill_voucher_no ?? '' }}

                                        </td>
                                        <td
                                            style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                            {{ formatIndianCurrency($cda_bill->bill_amount, 2) }}
                                        </td>
                                        <td
                                            style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">

                                        </td>
                                        <td
                                            style="

                line-height: 14px;
                font-weight: 600;
                color: #000;
                text-align: center;

                margin: 0px 0px !important;
                border: 1px solid #000;
                height: 5px;
              ">
                                        </td>
                                    </tr>
                                @endforeach
                            @endif


                            <tr>
                                <td colspan="6"
                                    style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    Total Payments
                                </td>
                                <td
                                    style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    {{ formatIndianCurrency($book2_data['totalPaymentsForTheDay'], 2) ?? 0 }}
                                </td>
                                <td
                                    style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    {{ formatIndianCurrency($book2_data['totalPaymentsForTheDayBank'], 2) ?? 0 }}
                                </td>
                                <td
                                    style="

                line-height: 14px;
                font-weight: 600;
                color: #000;
                text-align: center;

                margin: 0px 0px !important;
                border: 1px solid #000;
                height: 5px;
              ">
                                </td>
                            </tr>



                            <tr>
                                <td colspan="6"
                                    style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    Closing Balance
                                </td>
                                <td
                                    style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    {{ formatIndianCurrency($book2_data['closing_balance_cash_in_hand'], 2) ?? 0 }}
                                </td>
                                <td
                                    style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    {{ formatIndianCurrency($book2_data['closing_balance_cash_in_bank'], 2) ?? 0 }}
                                </td>
                                <td
                                    style="

                line-height: 14px;
                font-weight: 600;
                color: #000;
                text-align: center;

                margin: 0px 0px !important;
                border: 1px solid #000;
                height: 5px;
              ">
                                </td>
                            </tr>


                            <tr>
                                <td colspan="6"
                                    style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    Grand Total
                                </td>
                                <td
                                    style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">

                                    @php
                                        $grand_total_cash =
                                            ($book2_data['closing_balance_cash_in_hand'] ?? 0) +
                                            ($book2_data['totalPaymentsForTheDay'] ?? 0);
                                    @endphp
                                    {{-- @dd($book2_data['closing_balance_cash_in_hand'], $book2_data['totalPaymentsForTheDay'], $grand_total_cash) --}}
                                    {{-- {{ formatIndianCurrency($book2_data['grand_total_cash_in_hand'], 2) ?? 0 }} --}}
                                    {{ formatIndianCurrency($grand_total_cash, 2) ?? 0 }}
                                </td>
                                <td
                                    style="

                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">

                                    @php
                                        $total_credit_bank =
                                            ($book2_data['totalPaymentsForTheDayBank'] ?? 0) +
                                            ($book2_data['closing_balance_cash_in_bank'] ?? 0);
                                    @endphp
                                    {{-- {{ formatIndianCurrency($book2_data['grand_total_cash_in_bank'], 2) ?? 0 }} --}}
                                    {{ formatIndianCurrency($total_credit_bank, 2) ?? 0 }}
                                </td>
                                <td
                                    style="

                line-height: 14px;
                font-weight: 600;
                color: #000;
                text-align: center;

                margin: 0px 0px !important;
                border: 1px solid #000;
                height: 5px;
              ">
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






<div class="page-break"></div>

<!DOCTYPE html>
<html lang="en">
<title>RCI</title>
<meta charset="utf-8" />

<body style="background: #fff">
    <center>
        <img src="{{ public_path('storage/' . $logo->logo) }}" style="max-width: 50px;padding-bottom: 5px">
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

                                    line-height: 14px;
                                    font-weight: 600;
                                    color: #000;
                                    text-align: left;

                                    margin: 0px 0px !important;
                                    text-transform: uppercase;

                                  ">

                                </td>
                                <td
                                    style="

                                    line-height: 14px;
                                    font-weight: 600;
                                    color: #000;
                                    text-align: right;

                                    margin: 0px 0px !important;
                                    text-transform: uppercase;

                                  ">
                                    {{ $print_date ?? '' }}

                                </td>
                            </tr>
                        </tbody>
                    </table>


                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                            <tr>
                                <td
                                    style="

              line-height: 14px;
              font-weight: 600;
              color: #000;
              text-align: center;

              margin: 0px 0px !important;
              text-transform: uppercase;

            ">
                                    CENTER FOR HIGHENERGY SYSTEMS & SCIENCES (CHESS) <br />
                                    RCI CAMPUS, HYDERABAD - 500 069 <br />
                                    BALANCE SHEET OF IMPREST ACCOUNT AS ON DATE {{ $report_date ?? '' }}
                                    <br />
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
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    Sl.No
                                </td>
                                <td
                                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    Particulars
                                </td>

                                <td
                                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 400;
                      color: #000;
                      text-align: right;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    Amount (Rs.)
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    1
                                </td>
                                <td
                                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    CASH IN HAND
                                </td>

                                <td
                                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    {{ formatIndianCurrency($book3_data['cash_in_hand'], 2) ?? 0 }}
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    2
                                </td>
                                <td
                                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    CASH IN BANK
                                </td>

                                <td
                                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    {{ formatIndianCurrency($book3_data['cash_in_bank'], 2) ?? 0 }}
                                </td>
                            </tr>




                            <tr>
                                <td
                                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    3
                                </td>
                                <td
                                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    BILLS SUBMITTED TO CDA
                                </td>

                                <td
                                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    {{ formatIndianCurrency($book3_data['bills_submitted_to_cda'], 2) ?? 0 }}
                                </td>
                            </tr>

                            <tr>
                                <td
                                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    4
                                </td>
                                <td
                                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    BILLS ON HAND
                                </td>

                                <td
                                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    {{ formatIndianCurrency($book3_data['bills_on_hand'], 2) ?? 0 }}
                                </td>
                            </tr>

                            <tr>
                                <td
                                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    5
                                </td>
                                <td
                                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    ADVANCE SLIPS
                                </td>

                                <td
                                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    {{ formatIndianCurrency($book3_data['advance_slips'], 2) ?? 0 }}
                                </td>
                            </tr>


                            <tr>
                                <td
                                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">

                                </td>
                                <td
                                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    TOTAL
                                </td>

                                <td
                                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;

                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                    {{ formatIndianCurrency($book3_data['all_totals'], 2) ?? 0 }}

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
