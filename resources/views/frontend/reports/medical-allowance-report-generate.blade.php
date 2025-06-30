<html lang="en">
<title>RCI Main</title>
<meta charset="utf-8" />
<style>
    .page-break {
        page-break-before: always;
    }
</style>

<body style="background: #fff">

    @php
    $all_grand_total = 0;
    @endphp
    @foreach ($medicalData as $chunkKey => $item)
       <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff"
        style="border-radius: 0px; margin: 0 auto; text-align: center">
        <tbody>
            <tr>
                <td style="padding: 0 0px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                            <tr>
                                <td style="text-align: center">
                                    <img src="{{ public_path('storage/' . $logo->logo) }}" alt="Logo"
                                        style="width: 100px; height: auto; text-align: center;">
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
                                <td style="
                font-size: 14px;
                line-height: 14px;
                font-weight: normal;
                color: #000;
                text-align: left;
                padding: 0px 5px 0px 5px !important;
                margin-top: 50px !important;
              ">
                                    To,
                                </td>
                                <td style="
                font-size: 14px;
                line-height: 14px;
                font-weight: normal;
                color: #000;
                text-align: right;
                padding: 5px 5px 0px 5px!important;
                margin-top: 50px !important;
              ">
                                    Date: {{$reported_date ?? ''}}
                                </td>
                            </tr>
                            <tr>
                                <td style="
                font-size: 14px;
                line-height: 14px;
                font-weight: normal;
                color: #000;
                text-align: left;
                padding: 5px 5px 0px 5px !important;
              ">
                                    The CDA HYDERABAD,
                                </td>
                            </tr>
                            <tr>
                                <td style="
                font-size: 14px;
                line-height: 14px;
                font-weight: normal;
                color: #000;
                text-align: left;
                padding: 5px 5px 0px 5px !important;
              ">
                                    HYDERABAD
                                </td>
                            </tr>


                            <tr>
                                <td style="
                font-size: 14px;
                line-height: 14px;
                font-weight: normal;
                color: #000;
                text-align: center;
                padding: 20px 5px 0px 5px!important;
                margin-top: 20px !important;
                height: 50px;
              ">
                                    Sub :<strong><u>REIMBURSEMENT OF MEDICAL EXPENSES IN R/O NG/CG/CG</u></strong>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table style="width: 100%;">
                        <tbody>
                            <tr>
                                <td colspan="9" style="
                    font-size: 14px;
                    line-height: 24px;
                    font-weight: 400;
                    color: #000;
                    text-align: justify;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                  ">
                                    Medical claims in respect of the following<strong> CGHS/CS(MA) beneficiary</strong>
                                    is/are forwarded
                                    herewith for audit and early payment.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>

            <tr>
                <td style="padding: 0 0px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <thead>
                            <tr>
                                <th style="
                      font-size: 14px;
                      line-height: 20px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      white-space: nowrap;
                    ">
                                    S. No.
                                </th>
                                <th style="
                      font-size: 14px;
                      line-height: 20px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                    ">
                                    Bill No.<br> Date & Type
                                </th>
                                <th style="
                      font-size: 14px;
                      line-height: 20px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                    ">
                                    Employee Name, Code Rank, (GPF/PRAN NO.) & BANK A/C No.
                                </th>
                                <th style="
                      font-size: 14px;
                      line-height: 20px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                    ">
                                    Traetment For
                                </th>
                                <th style="
                      font-size: 14px;
                      line-height: 20px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                    ">
                                    Amount Claimed (Rs.)
                                </th>
                                <th style="
                      font-size: 14px;
                      line-height: 20px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                    ">
                                    Tot.Adv. Amt.given (Rs.)
                                </th>
                                <th style="
                      font-size: 14px;
                      line-height: 20px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                    ">
                                    Net Amount Claimed (Rs.)
                                </th>
                                <th style="
                      font-size: 14px;
                      line-height: 20px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                    ">
                                    Amount Passed (Rs.)
                                </th>
                                <th style="
                      font-size: 14px;
                      line-height: 20px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      border-right: 1px solid #000;
                    ">
                                    Amount Disallowed (Rs.)
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $net_claimed = 0;
                            @endphp


                            @foreach ($item as $key => $medical)
                            @php
                            $net_claimed += round(($medical->amount_claimed ?? 0) + ($medical->total_adv_amount_given ??
                            0));
                            @endphp
                            <tr>
                                <td style="
                font-size: 14px;
                line-height: 24px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-top: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                                    {{$key + 1}}
                                </td>
                                <td style="
                font-size: 14px;
                line-height: 24px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-top: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                                   <b>{{$medical->bill_no ?? ''}}</b>  <br>
                                    {{$medical->bill_date ? date('d-M-Y', strtotime($medical->bill_date)) : ''}}, <b>
                                        {{$medical->type ?? ''}}</b>
                                       <span style="white-space: nowrap">{{$medical->type ?? ''}}
                                    NO.:{{$medical->type_number ?? ''}}</span>
                                </td>
                                <td style="
                font-size: 14px;
                line-height: 24px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-top: 1px solid #000;
                border-bottom: 1px solid #000;

              ">
                                    <b style="white-space: nowrap;">{{$medical->member->name ?? ''}},</b> <br>
                                    {{$medical->member->emp_id ?? ''}},
                                    {{$medical->member->desigs->designation ?? ''}}, ({{ $medical->member->gpf_number ?? $medical->member->pran_number ?? '' }}
)
                                    {{$medical->member->bank_account ?? ''}}

                                </td>
                                <td style="
                font-size: 14px;
                line-height: 24px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-top: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                                    {{$medical->treatment_for ?? ''}}
                                </td>
                                <td style="
                font-size: 14px;
                line-height: 24px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-top: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                                    {{$medical->amount_claimed ?? ''}}
                                </td>
                                <td style="
                font-size: 14px;
                line-height: 24px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-top: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                                    {{$medical->total_adv_amount_given ?? ''}}
                                </td>
                                <td style="
                font-size: 14px;
                line-height: 24px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-top: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                                    {{ round(($medical->amount_claimed ?? 0) + ($medical->total_adv_amount_given ?? 0))
                                    }}

                                </td>
                                <td style="
                font-size: 14px;
                line-height: 24px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-top: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                                    {{$medical->amount_passed ?? ''}}
                                </td>

                                <td style="
                font-size: 14px;
                line-height: 24px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-top: 1px solid #000;
                border-left: 1px solid #000;
                border-right: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                                    {{$medical->amount_disallowed ?? ''}}
                                </td>
                            </tr>
                            @endforeach



                        </tbody>
                    </table>
                </td>
            </tr>

            <tr>
                <td style="
            font-size: 14px;
            line-height: 14px;
            font-weight: normal;
            color: #000;
            text-align: center;
            padding: 20px 5px 0px 5px!important;
            margin-top: 20px !important;
            /* height: 50px; */
            ">
                    <strong>Total Net Amt Claimed : {{$net_claimed}}</strong>
                </td>

            </tr>

            <tr>
                <td>
                    <table style="width: 100%;">
                        <tbody>
                            <tr>
                                <td style="
                    font-size: 14px;
                    line-height: 20px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 10px 5px !important;
                    margin: 0px 0px !important;
                    vertical-align: top;

                  ">
                                    2.
                                </td>
                                <td style="
                    font-size: 14px;
                    line-height: 20px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 10px 5px !important;
                    margin: 0px 0px !important;
                    vertical-align: top;
                  ">
                                    It is confirmed that Funds allocated 'UNDER MINOR HEAD 102, MEDICAL TREATMENT' are
                                    available. It is
                                    rquested to admit claims in audit at an early date. The details of disallowances if
                                    any, may also be
                                    intimated for information.
                                </td>
                            </tr>

                            <tr>
                                <td style="
                    font-size: 14px;
                    line-height: 20px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 10px 5px !important;
                    margin: 0px 0px !important;
                    vertical-align: top;
                  ">
                                    3.
                                </td>
                                <td style="
                    font-size: 14px;
                    line-height: 20px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 10px 5px !important;
                    margin: 0px 0px !important;
                    vertical-align: top;
                  ">
                                    The payment may please be issued in favour of individual's account.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding: 0 0px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tr>
                            <td colspan="9" style="
                font-size: 20px;
                line-height: 30px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 50px 5px 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
              ">
                                Encl : Original Bills
                            </td>
                            <td colspan="9" style="
                font-size: 20px;
                line-height: 30px;
                font-weight: 400;
                color: #000;
                text-align: right;
                padding: 50px 5px 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
              ">
                                {{$senior_account_manager_name ?? ''}}<br>
                                For Director
                            </td>
                        </tr>
            </tr>
    </table>
    </tbody>
    </table>
     <div class="page-break"></div>
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff"
        style="border-radius: 0px; margin: 0 auto; text-align: center">
        <tbody>
            <tr>
                <td style="padding: 0 0px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                            <tr>
                                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: normal;
                color: #000;
                text-align: center;
                padding: 0px 5px 0px 5px !important;
                margin-top: 50px !important;
              ">
                                    UNIT CODE: 330000110
                                </td>
                            </tr>
                            <tr>
                                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: normal;
                color: #000;
                text-align: left;
                padding: 0px 5px 0px 5px !important;
                margin-top: 50px !important;
              ">
                                    No.CHESS/FIN/MED/{{$financial_year ?? ''}}<br>Dated: {{$reported_date}}
                                </td>
                            </tr>

                            <tr>
                                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 50px;

              ">
                                    <u>CONTINGENT BILL</u>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table style="width: 100%;">
                        <tbody>
                            <tr>
                                <td style="
                    font-size: 14px;
                    line-height: 18px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px 0px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                  ">
                                    Amount of Allotment_________________________________________
                                </td>
                                <td style="
                    font-size: 14px;
                    line-height: 18px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px 0px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                  ">
                                    Rs.{{$net_claimed}}
                                </td>
                            </tr>
                            <tr>
                                <td style="
                    font-size: 14px;
                    line-height: 18px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    display: flex;
                  ">
                                    Amount Extended and for which bills have been submitted for payment
                                    ____________________
                                </td>
                                <td style="
                    font-size: 14px;
                    line-height: 18px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                  ">
                                    Rs.
                                </td>
                            </tr>
                            <tr>
                                <td style="
                    font-size: 14px;
                    line-height: 18px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    display: flex;
                  ">
                                    Balance of allotment excluding the amount of this bill________________________
                                <td style="
                    font-size: 14px;
                    line-height: 18px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                  ">

                                </td>
                            </tr>
                            <tr>
                                <td style="
                    font-size: 14px;
                    line-height: 18px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    display: flex;
                  ">
                                    Expenditure on account of <strong>&nbsp; Medical Reibursement in r/o CGO/NGO
                                        OFFICER/STAFF</strong>
                                </td>
                                <td style="
                    font-size: 14px;
                    line-height: 18px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                  ">

                                </td>
                            </tr>
                            <tr>
                                <td style="
                    font-size: 14px;
                    line-height: 18px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 50px;
                  ">
                                    <p style="flex-shrink: 0;">(i) Authority No.: S.14025/24/2023-EHS dated 15-01-2024
                                    </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>

            <tr>
                <td style="padding: 0 0px;">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <thead>
                            <tr>
                                <th style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                    ">
                                    Sr.No.
                                </th>
                                <th style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                    ">
                                    Done
                                </th>
                                <th style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                    ">
                                    Details of Experience
                                </th>
                                <th style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                    ">
                                    Nature of Quantity
                                </th>
                                <th colspan="2" style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      border-right: 1px solid #000;
                    ">
                                    Amount
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-top: 1px solid #000;
                vertical-align: top;
              ">

                                </td>

                                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-top: 1px solid #000;
              ">

                                </td>
                                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-top: 1px solid #000;
              ">

                                </td>
                                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-top: 1px solid #000;
              ">

                                </td>
                                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-top: 1px solid #000;
                vertical-align: top;
              ">
                                    Rs.
                                </td>
                                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-right: 1px solid #000;
                border-top: 1px solid #000;

              ">
                                    P
                                </td>
                            </tr>
                            <tr>
                                <td style="
                font-size: 16px;
                line-height: 20px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-top: 1px solid #000;
                border-bottom: 1px solid #000;
                vertical-align: top;
              ">
                                    01.
                                </td>

                                <td style="
                font-size: 16px;
                line-height: 20px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-top: 1px solid #000;
                border-bottom: 1px solid #000;
              ">

                                </td>
                                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-top: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                                    Amount Claimed on account of Medical reimbursement in respect of following CHO/NGO Officer/Staff of CHESS for the medical treatment with prior permission / under emergency.<br>


                                     @foreach ($item as $key => $medical)
                                    <strong>{{$medical->member->name ?? ''}}. {{$medical->member->desigs->designation ?? ''}}, Rs.  {{ round(($medical->amount_claimed ?? 0) + ($medical->total_adv_amount_given ?? 0))
                                    }}/-<br></strong>
                                    @endforeach



                                    <br><br>The Payment may please be issued in favour of individual's account.
                                </td>
                                <td style="
                font-size: 16px;
                line-height: 24px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-top: 1px solid #000;
                border-bottom: 1px solid #000;
              ">

                                </td>
                                <td style="
                font-size: 16px;
                line-height: 24px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-top: 1px solid #000;
                border-bottom: 1px solid #000;
                vertical-align: top;
              ">
                                    {{$net_claimed}}
                                </td>
                                <td style="
                font-size: 16px;
                line-height: 24px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-right: 1px solid #000;
                border-top: 1px solid #000;
                border-bottom: 1px solid #000;
              ">

                                </td>
                            </tr>
                            <tr>
                                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-bottom: 1px solid #000;
                vertical-align: top;
              ">

                                </td>

                                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-bottom: 1px solid #000;
              ">

                                </td>
                                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                                    TOTAL
                                </td>
                                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                                </td>
                                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-bottom: 1px solid #000;
                vertical-align: top;
              ">
                                    {{$net_claimed}}
                                </td>
                                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-right: 1px solid #000;
                border-bottom: 1px solid #000;
              ">

                                </td>
                            </tr>
                            <tr>
                                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-bottom: 1px solid #000;
                vertical-align: top;
              ">

                                </td>

                                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-bottom: 1px solid #000;
              ">

                                </td>
                                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                                    DEDUCT
                                </td>
                                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                                </td>
                                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-bottom: 1px solid #000;
                vertical-align: top;
              ">

                                </td>
                                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-right: 1px solid #000;
                border-bottom: 1px solid #000;
              ">

                                </td>
                            </tr>
                            <tr>
                                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-bottom: 1px solid #000;
                vertical-align: top;
              ">

                                </td>

                                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-bottom: 1px solid #000;
              ">

                                </td>
                                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                                    Advance Recieved on ...(Date)
                                </td>
                                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                                </td>
                                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-bottom: 1px solid #000;
                vertical-align: top;
              ">

                                </td>
                                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-right: 1px solid #000;
                border-bottom: 1px solid #000;
              ">

                                </td>
                            </tr>
                            <tr>
                                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-bottom: 1px solid #000;
                vertical-align: top;
              ">

                                </td>

                                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-bottom: 1px solid #000;
              ">

                                </td>
                                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                                    Form
                                </td>
                                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                                </td>
                                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-bottom: 1px solid #000;
                vertical-align: top;
              ">

                                </td>
                                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-right: 1px solid #000;
                border-bottom: 1px solid #000;
              ">

                                </td>
                            </tr>
                            <tr>

                                <td colspan="6" style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-bottom: 1px solid #000;
                border-right: 1px solid #000;
              ">
                                    Net Amount Due (in words) <strong> Rupees {{ ucwords(str_replace('-', ' ',(\NumberFormatter::create('en_IN', \NumberFormatter::SPELLOUT)->format($net_claimed)))) }} Only</strong>
                                </td>


                            </tr>


                        </tbody>
                    </table>
                </td>
            </tr>


            <tr>
                <td style="padding: 0 0px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tr>
                            <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 10px 5px 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                vertical-align: top;
              ">
                                (I) Certified that the above charges have been necessarily incuured in the interest of
                                the state that the rates charged art the lowest obtainable and that all receipts of sum
                                of Rs. 25 and under, except as regards payment made in the M.E.S to contractors on
                                running accounts, have been so defaced or mutilated that they can not be used again and
                                that i have personally checked the progressive total in the bill with that in the
                                contigent registers and found it to agree.
                            </td>
                            <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 10px 5px 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
              ">

                            </td>
                        </tr>
                        <tr>
                            <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 0px 5px 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                vertical-align: top;
              ">
                                (II) Certified that the telegram was sent on state service and that cash payment was
                                unavoidable.
                            </td>
                            <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 0px 5px 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
              ">

                            </td>
                        </tr>
                        <tr>
                            <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 0px 5px 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                vertical-align: top;
              ">
                                (III) Certified that payment of subsistance allowance was in the interest of service and
                                that the rejected recruits for whom the allowance has been claimed were rejected either
                                medically or enrolling officer.
                            </td>
                            <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 0px 5px 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
              ">

                            </td>
                        </tr>




                        <tr>
                            <td colspan="9" style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 20px 5px 0px 5px !important;
                margin: 0px 0px !important;
                height: 0px;
              ">
                                Note : "Under Rs. ____________________________" should be Written across the bill in red
                                ink in prominent place near to and abover the total amount of the bill. The amount shold
                                be the next multiple of then rupees exceeding the amount of the bill.
                            </td>
                        </tr>


                        <tr>
                            <td style="padding: 0 0px">
                                <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                                    <tr>
                                        <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 20px 5px 0px 5px !important;
                margin: 0px 0px !important;
                vertical-align: top;
              ">
                                            Station: CHEES <BR> Date:
                                        </td>
                                        <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align:center;
                padding: 20px 5px 0px 5px !important;
                margin: 0px 0px !important;
                vertical-align: top;
              ">
                                            Countersinged
                                        </td>
                                        <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: right;
                padding: 20px 5px 0px 5px !important;
                margin: 0px 0px !important;
                vertical-align: top;
              ">
                                            Recieved Payment
                                        </td>
                                    </tr>
                                </table>
                            </td>

                        <tr>
                            <td colspan="6" style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 5px 5px 0px 5px !important;
                margin: 0px 0px !important;
                vertical-align: top;
              ">
                                {{$senior_account_manager_name}}<br>
                                ACCOUNTS OFFICER (DEPUTATION)
                            </td>
                        </tr>
            </tr>
    </table>
    </tbody>
    </table>
    <div class="page-break"></div>

    <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="border-radius: 0px; margin: 0 auto; text-align: center">
    <tbody>
            <tr>
        <td style="padding: 0 0px">
          <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
            <tbody>
                <tr>
                    <td width="">
                          <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                            <tbody>
                              <tr>
                              <td style="
                                font-size: 14px;
                                line-height:20px;
                                font-weight: 400;
                                color: #000;
                                text-align: left;
                                padding: 0px 5px !important;
                                margin: 0px 0px !important;
                                height: 0px;

                              ">
                              (When payment is made by inclusive bill ) in pay _________________________
                                                                                      IRLA(s)
                            </td>
                              </tr>
                              <tr>
                              <td style="
                                font-size: 14px;
                                line-height:20px;
                                font-weight: 400;
                                color: #000;
                                text-align: left;
                                padding: 0px 5px !important;
                                margin: 0px 0px !important;
                                height: 0px;

                              ">
                              ____________________________________
                            </td>
                              </tr>

                              <tr>
                              <td style="
                                font-size: 14px;
                                line-height:20px;
                                font-weight: 400;
                                color: #000;
                                text-align: left;
                                padding: 0px 5px !important;
                                margin: 0px 0px !important;
                                height: 0px;

                              ">
                              By inclusion in the pay bill/
                                </td>
                              </tr>
                              <tr>
                              <td style="
                                font-size: 14px;
                                line-height:20px;
                                font-weight: 400;
                                color: #000;
                                text-align: left;
                                padding: 0px 5px !important;
                                margin: 0px 0px !important;
                                height: 0px;

                              ">
                              IRLA(s)_______________________
                              </td>
                              </tr>
                              <tr>

                                <td style="
                                font-size: 14px;
                                line-height:20px;
                                font-weight: 400;
                                color: #000;
                                text-align: left;
                                padding: 0px 5px !important;
                                margin: 0px 0px !important;
                                height: 0px;

                              ">
                              _______________________
                                </td>
                              </tr>
                              <tr>
                                <td style="
                                font-size: 14px;
                                line-height:20px;
                                font-weight: 400;
                                color: #000;
                                text-align: left;
                                padding: 0px 5px !important;
                                margin: 0px 0px !important;
                                height: 0px;

                              ">
                              ______________________
                                </td>
                              </tr>

                              <tr>
                              <td style="
                                font-size: 14px;
                                line-height:20px;
                                font-weight: 400;
                                color: #000;
                                text-align: left;
                                padding: 0px 5px !important;
                                margin: 0px 0px !important;
                                height: 0px;

                              ">
                              In Invoice of ___________________
                                </td>
                              </tr>
                              <tr>
                              <td style="
                                font-size: 14px;
                                line-height:20px;
                                font-weight: 400;
                                color: #000;
                                text-align: left;
                                padding: 0px 5px !important;
                                margin: 0px 0px !important;
                                height: 0px;

                              ">
                               ____________________
                                </td>
                              </tr>
                              <tr>
                              <td style="
                                font-size: 14px;
                                line-height:20px;
                                font-weight: 400;
                                color: #000;
                                text-align: left;
                                padding: 0px 5px !important;
                                margin: 0px 0px !important;
                                height: 0px;

                              ">
                               ____________________
                                </td>
                              </tr>

                              <tr>
                              <td style="
                                font-size: 14px;
                                line-height:20px;
                                font-weight: 400;
                                color: #000;
                                text-align: left;
                                padding: 0px 5px !important;
                                margin: 0px 0px !important;
                                height: 0px;

                              ">
                              For the Month of ________________
                                </td>
                              </tr>

                              <tr>
                              <td style="
                                font-size: 14px;
                                line-height:20px;
                                font-weight: 400;
                                color: #000;
                                text-align: left;
                                padding: 0px 5px !important;
                                margin: 0px 0px !important;
                                height: 0px;

                              ">
                              Unit Accll________________
                               </td>
                               <td style="
                                font-size: 14px;
                                line-height:20px;
                                font-weight: 400;
                                color: #000;
                                text-align: left;
                                padding: 0px 5px !important;
                                margin: 0px 0px !important;
                                height: 0px;

                              ">
                               </td>
                              </tr>
                              <tr>
                              <td></td>
                                <td style="
                                font-size: 14px;
                                line-height:20px;
                                font-weight: 400;
                                color: #000;
                                text-align: left;
                                padding: 0px 5px !important;
                                margin: 0px 0px !important;
                                height: 0px;

                              ">
                                </td>
                              </tr>
                              <tr>
                              <td style="
                                font-size: 14px;
                                line-height:20px;
                                font-weight: 400;
                                color: #000;
                                text-align: left;
                                padding: 0px 5px !important;
                                margin: 0px 0px !important;
                                height: 0px;

                              ">
                              Asst Supdt________________
                                </td>
                                <td style="
                                font-size: 14px;
                                line-height:20px;
                                font-weight: 400;
                                color: #000;
                                text-align: left;
                                padding: 0px 5px !important;
                                margin: 0px 0px !important;
                                height: 0px;

                              ">
                                </td>
                              </tr>
                        </tbody>
                      </table>
                    </td>

                    <td width="">
                      <table width="100%" border="0" cellpadding="0" cellspacing="10" align="center">
                        <tbody>
                        <tr>
                          <td style="
                            font-size: 20px;
                            line-height:24px;
                            font-weight: 400;
                            color: #000;
                            text-align: left;
                            padding: 0px 5px !important;
                            margin: 0px 0px !important;
                            height: 350px;
                            border: 1px solid #000;
                          ">

                            </td>
                          </tr>

                        </tbody>
                      </table>
                    </td>

                    <td width="">
                          <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                            <tbody>
                              <tr>
                              <td style="
                                font-size: 14px;
                                line-height:20px;
                                font-weight: 400;
                                color: #000;
                                text-align: left;
                                padding: 0px 5px !important;
                                margin: 0px 0px !important;
                                height: 0px;

                              ">
                            GNT Charges DV No.
                            </td>
                              </tr>
                              <tr>
                              <td style="
                                font-size: 14px;
                                line-height:20px;
                                font-weight: 400;
                                color: #000;
                                text-align: left;
                                padding: 0px 5px !important;
                                margin: 0px 0px !important;
                                height: 0px;

                              ">

                            </td>
                            <td style="
                                font-size: 14px;
                                line-height:20px;
                                font-weight: 400;
                                color: #000;
                                text-align: left;
                                padding: 0px 5px !important;
                                margin: 0px 0px !important;
                                height: 0px;

                              ">
                              for_____________
                            </td>
                              </tr>
                              <tr>
                              <td style="
                                font-size: 14px;
                                line-height:20px;
                                font-weight: 400;
                                color: #000;
                                text-align: left;
                                padding: 0px 5px !important;
                                margin: 0px 0px !important;
                                height: 0px;

                              ">

                            </td>
                            <td style="
                                font-size: 14px;
                                line-height:20px;
                                font-weight: 400;
                                color: #000;
                                text-align: left;
                                padding: 0px 5px !important;
                                margin: 0px 0px !important;
                                height: 0px;

                              ">
                              for_____________
                            </td>
                              </tr>

                              <tr>
                              <td style="
                                font-size: 14px;
                                line-height:20px;
                                font-weight: 400;
                                color: #000;
                                text-align: left;
                                padding: 0px 5px !important;
                                margin: 0px 0px !important;
                                height: 0px;

                              ">
                              (When a chque to be issued)
                              Passed for Rs ________________(Rupees_____________) on payment as under:
                                </td>
                              </tr>
                              <tr>
                              <td style="
                                font-size: 14px;
                                line-height:20px;
                                font-weight: 400;
                                color: #000;
                                text-align: left;
                                padding: 0px 5px !important;
                                margin: 0px 0px !important;
                                height: 0px;

                              ">

                                </td>
                                <td style="
                                font-size: 14px;
                                line-height:20px;
                                font-weight: 400;
                                color: #000;
                                text-align: left;
                                padding: 0px 5px !important;
                                margin: 0px 0px !important;
                                height: 0px;

                              ">

                                </td>
                              </tr>
                              <tr>
                                <td style="
                                font-size: 14px;
                                line-height:20px;
                                font-weight: 400;
                                color: #000;
                                text-align: left;
                                padding: 0px 5px !important;
                                margin: 0px 0px !important;
                                height: 0px;

                              ">

                                </td>
                              </tr>

                              <tr>
                              <td style="
                                font-size: 14px;
                                line-height:20px;
                                font-weight: 400;
                                color: #000;
                                text-align: left;
                                padding: 0px 5px !important;
                                margin: 0px 0px !important;
                                height: 0px;

                              ">

                                </td>
                              </tr>
                              <tr>
                              <td style="
                                font-size: 14px;
                                line-height:20px;
                                font-weight: 400;
                                color: #000;
                                text-align: left;
                                padding: 10px 5px !important;
                                margin: 0px 0px !important;
                                height: 0px;

                              ">
                               Voucher No_______________
                                </td>
                              </tr>


                        </tbody>
                            </table>


                          <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                                  <thead>
                                    <tr>
                                      <th style="
                                            font-size: 14px;
                                            line-height: 18px;
                                            font-weight: 600;
                                            color: #000;
                                            text-align: center;
                                            padding: 0px 5px !important;
                                            margin: 0px 0px !important;
                                            border-top: 1px solid #000;
                                            border-left: 1px solid #000;
                                          ">
                                       A.G's Code No
                                      </th>
                                      <th style="
                                            font-size: 14px;
                                            line-height: 18px;
                                            font-weight: 600;
                                            color: #000;
                                            text-align: center;
                                            padding: 0px 5px !important;
                                            margin: 0px 0px !important;
                                            border-top: 1px solid #000;
                                            border-left: 1px solid #000;
                                          ">
                                        Treasury
                                      </th>
                                      <th style="
                                            font-size: 14px;
                                            line-height: 18px;
                                            font-weight: 600;
                                            color: #000;
                                            text-align: center;
                                            padding: 0px 5px !important;
                                            margin: 0px 0px !important;
                                            border-top: 1px solid #000;
                                            border-left: 1px solid #000;
                                          ">
                                        Name of Payee
                                      </th>
                                      <th style="
                                            font-size: 14px;
                                            line-height: 18px;
                                            font-weight: 600;
                                            color: #000;
                                            text-align: center;
                                            padding: 0px 5px !important;
                                            margin: 0px 0px !important;
                                            border-top: 1px solid #000;
                                            border-left: 1px solid #000;
                                          ">
                                        Amount of Cheque
                                      </th>
                                      <th style="
                                            font-size: 14px;
                                            line-height: 18px;
                                            font-weight: 600;
                                            color: #000;
                                            text-align: center;
                                            padding: 0px 5px !important;
                                            margin: 0px 0px !important;
                                            border-top: 1px solid #000;
                                            border-left: 1px solid #000;
                                          ">
                                        Date fo Cheque
                                      </th>
                                      <th style="
                                            font-size: 14px;
                                            line-height: 18px;
                                            font-weight: 600;
                                            color: #000;
                                            text-align: center;
                                            padding: 0px 5px !important;
                                            margin: 0px 0px !important;
                                            border-top: 1px solid #000;
                                            border-left: 1px solid #000;
                                          ">
                                        Initials of Supdts 'D' Section
                                      </th>

                                      <th style="
                                            font-size: 14px;
                                            line-height: 18px;
                                            font-weight: 600;
                                            color: #000;
                                            text-align: center;
                                            padding: 0px 5px !important;
                                            margin: 0px 0px !important;
                                            border-top: 1px solid #000;
                                            border-left: 1px solid #000;
                                            border-right: 1px solid #000;
                                          ">
                                        Initials of O.i/c 'D' Section
                                      </th>

                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td style="
                                      font-size: 14px;
                                            line-height: 18px;
                                      font-weight: 400;
                                      color: #000;
                                      text-align: left;
                                      padding: 0px 5px !important;
                                      margin: 0px 0px !important;
                                      height: 20px;
                                      border-left: 1px solid #000;
                                      border-top: 1px solid #000;
                                      border-bottom: 1px solid #000;
                                    ">

                                      </td>
                                                      <td style="
                                      font-size: 14px;
                                            line-height: 18px;
                                      font-weight: 400;
                                      color: #000;
                                      text-align: left;
                                      padding: 0px 5px !important;
                                      margin: 0px 0px !important;
                                      height: 20px;
                                      border-left: 1px solid #000;
                                      border-top: 1px solid #000;
                                      border-bottom: 1px solid #000;
                                    ">

                                      </td>
                                                      <td style="
                                      font-size: 14px;
                                            line-height: 18px;
                                      font-weight: 400;
                                      color: #000;
                                      text-align: left;
                                      padding: 0px 5px !important;
                                      margin: 0px 0px !important;
                                      height: 20px;
                                      border-left: 1px solid #000;
                                      border-top: 1px solid #000;
                                      border-bottom: 1px solid #000;
                                    ">

                                      </td>
                                                      <td style="
                                      font-size: 14px;
                                            line-height: 18px;
                                      font-weight: 400;
                                      color: #000;
                                      text-align: left;
                                      padding: 0px 5px !important;
                                      margin: 0px 0px !important;
                                      height: 20px;
                                      border-left: 1px solid #000;
                                      border-top: 1px solid #000;
                                      border-bottom: 1px solid #000;
                                    ">

                                      </td>
                                                      <td style="
                                      font-size: 14px;
                                            line-height: 18px;
                                      font-weight: 400;
                                      color: #000;
                                      text-align: left;
                                      padding: 0px 5px !important;
                                      margin: 0px 0px !important;
                                      height: 20px;
                                      border-left: 1px solid #000;
                                      border-top: 1px solid #000;
                                      border-bottom: 1px solid #000;
                                    ">

                                      </td>
                                                      <td style="
                                      font-size: 14px;
                                            line-height: 18px;
                                      font-weight: 400;
                                      color: #000;
                                      text-align: left;
                                      padding: 0px 5px !important;
                                      margin: 0px 0px !important;
                                      height: 20px;
                                      border-left: 1px solid #000;
                                      border-top: 1px solid #000;
                                      border-bottom: 1px solid #000;
                                    ">

                                      </td>
                                                      <td style="
                                      font-size: 14px;
                                            line-height: 18px;
                                      font-weight: 400;
                                      color: #000;
                                      text-align: left;
                                      padding: 0px 5px !important;
                                      margin: 0px 0px !important;
                                      height: 20px;
                                      border-left: 1px solid #000;
                                      border-top: 1px solid #000;
                                      border-bottom: 1px solid #000;
                                      border-right: 1px solid #000;
                                    ">

                                    </td>
                                    </tr>

                                  </tbody>
                          </table>

                          <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                            <tbody>
                              <tr>
                              <td style="
                                font-size: 14px;
                                line-height:20px;
                                font-weight: 400;
                                color: #000;
                                text-align: left;
                                padding: 0px 5px !important;
                                margin: 0px 0px !important;
                                height: 0px;

                              ">
                              Auditor.
                            </td>
                                                          <td style="
                                font-size: 14px;
                                line-height:20px;
                                font-weight: 400;
                                color: #000;
                                text-align: left;
                                padding: 10px 5px !important;
                                margin: 0px 0px !important;
                                height: 20px;

                              ">
                              Superintendent.
                            </td>
                                                          <td style="
                                font-size: 14px;
                                line-height:20px;
                                font-weight: 400;
                                color: #000;
                                text-align: left;
                                padding: 10px 5px !important;
                                margin: 0px 0px !important;
                                height: 20px;

                              ">
                              ______________
                            </td>
                              </tr>
                              <tr>
                              <td style="
                                font-size: 14px;
                                line-height:20px;
                                font-weight: 400;
                                color: #000;
                                text-align: left;
                                padding: 0px 5px !important;
                                margin: 0px 0px !important;
                                height: 0px;

                              ">

                            </td>
                                                          <td style="
                                font-size: 14px;
                                line-height:20px;
                                font-weight: 400;
                                color: #000;
                                text-align: left;
                                padding: 0px 5px !important;
                                margin: 0px 0px !important;
                                height: 0px;

                              ">

                            </td>
                                                          <td style="
                                font-size: 14px;
                                line-height:20px;
                                font-weight: 400;
                                color: #000;
                                text-align: left;
                                padding: 0px 5px !important;
                                margin: 0px 0px !important;
                                height: 0px;

                              ">
                              ______________
                            </td>
                              </tr>
                              <tr>
                              <td style="
                                font-size: 14px;
                                line-height:20px;
                                font-weight: 400;
                                color: #000;
                                text-align: left;
                                padding: 0px 5px !important;
                                margin: 0px 0px !important;
                                height: 0px;

                              ">

                            </td>
                                                          <td style="
                                font-size: 14px;
                                line-height:20px;
                                font-weight: 400;
                                color: #000;
                                text-align: left;
                                padding: 0px 5px !important;
                                margin: 0px 0px !important;
                                height: 0px;

                              ">

                            </td>
                                                          <td style="
                                font-size: 14px;
                                line-height:20px;
                                font-weight: 400;
                                color: #000;
                                text-align: left;
                                padding: 0px 5px !important;
                                margin: 0px 0px !important;
                                height: 0px;

                              ">
                              ______________
                            </td>
                              </tr>


                        </tbody>
                            </table>
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
              <td style="
                font-size: 20px;
                line-height:24px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 50px;

              ">
              Classification of Reciept and Charges
                </td>
              </tr>

            </tbody>
          </table>
        </td>
      </tr>
      <tr>
          <td>
            <table style="width: 100%;">
              <tbody>
                <tr>
                  <td style="
                    font-size: 14px;
                    line-height: 18px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 50px;
                  ">
                   Month ........................ C.D.A ........................Section ............................Class of Vr..........................No......................
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>

        <tr>
        <td style="padding: 0 0px;">
          <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
            <tbody>
              <tr>
                    <td rowspan="3" style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      border-bottom: 1px solid #000;
                      vertical-align: top;
                    ">
                  Classification Code
                </td>
                <td colspan="4" style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                    ">
                  RECEPT
                </td>
                <td rowspan="3" style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      border-bottom: 1px solid #000;
                      vertical-align: top;
                    ">
                  Classification Code
                </td>
                    <td colspan="4" style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      border-right: 1px solid #000;
                    ">
                  CHARGES
                </td>

              </tr>
              <tr>

                <td colspan="2" style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-top: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                 R (1)
                </td>
                <td colspan="2" style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-top: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                 MR (2)
                </td>

                <td colspan="2" style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-top: 1px solid #000;
                vertical-align: top;
                border-bottom: 1px solid #000;
              ">
                  C (3)
                </td>
                <td colspan="2" style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-top: 1px solid #000;
                border-bottom: 1px solid #000;
                border-right: 1px solid #000;
              ">
                 C (3)
                </td>
              </tr>
              <tr>

                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                 Rs.
                </td>
                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                 P
                </td>
                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                  Rs.
                </td>
                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                vertical-align: top;
                border-bottom: 1px solid #000;
              ">
                P
                </td>
                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                /* border-top: 1px solid #000; */
                border-bottom: 1px solid #000;
                /* border-right: 1px solid #000; */
              ">
               Rs.
                </td>
                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                /* border-top: 1px solid #000; */
                border-bottom: 1px solid #000;
                /* border-right: 1px solid #000; */
              ">
                 P
                </td>
                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                /* border-top: 1px solid #000; */
                border-bottom: 1px solid #000;
                /* border-right: 1px solid #000; */
              ">
                 Rs.
                </td>
                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                /* border-top: 1px solid #000; */
                border-bottom: 1px solid #000;
                border-right: 1px solid #000;
              ">
                 P
                </td>
              </tr>

              <tr>

                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-bottom: 1px solid #000;
                height: 150px;
              ">

                </td>
                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-bottom: 1px solid #000;
                height: 150px;
              ">

                </td>
                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-bottom: 1px solid #000;
                height: 150px;
              ">

                </td>
                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-bottom: 1px solid #000;
                height: 150px;
              ">

                </td>
                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-bottom: 1px solid #000;
                height: 150px;
              ">

                </td>
                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                vertical-align: top;
                border-bottom: 1px solid #000;
                height: 150px;
              ">

                </td>
                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                /* border-top: 1px solid #000; */
                border-bottom: 1px solid #000;
                /* border-right: 1px solid #000; */
                height: 150px;
              ">

                </td>
                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                /* border-top: 1px solid #000; */
                border-bottom: 1px solid #000;
                /* border-right: 1px solid #000; */
                height: 150px;
              ">

                </td>
                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                /* border-top: 1px solid #000; */
                border-bottom: 1px solid #000;
                /* border-right: 1px solid #000; */
                height: 150px;
              ">

                </td>
                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                /* border-top: 1px solid #000; */
                border-bottom: 1px solid #000;
                border-right: 1px solid #000;
                height: 150px;
              ">

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
                  <td style="
                    font-size: 20px;
                    line-height: 24px;
                    font-weight: 400;
                    color: #000;
                    text-align: center;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 50px;

                  ">
                  INSTRUCTIONS
                    </td>
                  </tr>

                </tbody>
              </table>
            </td>
          </tr>
          <tr>
              <td style="padding: 0 0px">
                <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                  <tbody><tr>
                      <td style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 10px 5px 0px 5px !important;
                      margin: 0px 0px !important;
                      height: 20px;
                      vertical-align: top;
                    ">
                      1.
                      </td>
                    <td style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 10px 5px 0px 5px !important;
                      margin: 0px 0px !important;
                      height: 20px;
                    ">
                     All alterations must be attested. Original receipts should be invariably quoted and all prescribed certificates or documnets audited in support of the claim.
                      </td>
                  </tr>
                              <tr>
                      <td style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px 0px 5px !important;
                      margin: 0px 0px !important;
                      height: 20px;
                      vertical-align: top;
                    ">
                      2.
                      </td>
                    <td style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px 0px 5px !important;
                      margin: 0px 0px !important;
                      height: 20px;
                    ">
                      The number and date of the order autorizing the expenditure should be invariably quoted and all prescribed certificates or documnets submitted in support of the claim. moriginal receipts (translated when necessary) for all payments should be attached, but idf the amount is Rs.25 or less and is not receipt for payment mad in the M.E.S to cotractors on running accounts, the certificate on the previous page will suffice.
                      </td>
                  </tr>
                    <tr>
                      <td style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px 0px 5px !important;
                      margin: 0px 0px !important;
                      height: 20px;
                      vertical-align: top;
                    ">
                      3.
                      </td>
                    <td style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px 0px 5px !important;
                      margin: 0px 0px !important;
                      height: 20px;
                    ">
                      In contingent bills for the purchase or the repair of the articles of ordinance supply and for purchase of petty supplies locally, the autority for the local puchase or repair and the sanction price current of the article or of the labour and material, or if this be not procurable the certificate on the previous page that the rates charged are the lowest obtainable must be signed or quoted if a standing order, local purchase bills must also certify that any articles requiring account in equipment ledgers have been brought on charge.
                      </td>
                  </tr>
                    <tr>
                      <td style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px 0px 5px !important;
                      margin: 0px 0px !important;
                      height: 20px;
                      vertical-align: top;
                    ">
                      4.
                      </td>
                    <td style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px 0px 5px !important;
                      margin: 0px 0px !important;
                      height: 20px;
                    ">
                      In claims for rail fares of recruits, their names and dates of enrollment should be stated.
                      </td>
                  </tr>
                                <tr>
                      <td style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px 0px 5px !important;
                      margin: 0px 0px !important;
                      height: 20px;
                      vertical-align: top;
                    ">
                      5.
                      </td>
                    <td style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px 0px 5px !important;
                      margin: 0px 0px !important;
                      height: 20px;
                    ">
                      Railway fare claims for men proceeding on fulouch should be duly supported by I.A.F.T-1792. complete in all respects [ MGIPTC -279 ARMY -GIPTC - (M.313) -8-7-60-1,45,000]
                      </td>
                  </tr>

        </tbody></table>
    </td></tr></tbody>
  </table>
  <div class="page-break"></div>
  <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="border-radius: 0px; margin: 0 auto; text-align: center">
    <tbody>
      <tr>
        <td style="padding: 0 0px">
          <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
            <tbody>
            <!-- <tr>
            <td>
                <img src="IMG/DRDO-logo.png" alt="Logo" style="width: 100px; height: auto;">
            </td>
            </tr> -->
            </tbody>
          </table>
        </td>
      </tr>
      <tr>
        <td style="padding: 0 0px">
          <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
            <tbody>
              <tr>
                <td style="
                font-size: 16px;
                line-height: 14px;
                font-weight: normal;
                color: #000;
                text-align: left;
                padding: 0px 5px 0px 5px !important;
                margin-top: 50px !important;
              ">
                  No CHESS/FIN/MED/{{$financial_year ?? ''}}
                </td>
                <td style="
                font-size: 16px;
                line-height: 14px;
                font-weight: normal;
                color: #000;
                text-align: right;
                padding: 5px 5px 0px 5px!important;
                margin-top: 50px !important;
              ">
                 <strong>DATED:. </strong>: {{$reported_date}}
                </td>
              </tr>

            <tr>
              <td colspan="9" style="
                font-size: 20px;
                line-height: 24px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 100px;

              ">
              <u>SANCTION FOR MEDICAL REIMBURSEMENT</u>
                </td>
              </tr>

            </tbody>
          </table>
        </td>
      </tr>
      <tr>
          <td>
            <table style="width: 100%;">
              <tbody>
                <tr>
                  <td colspan="9" style="
                    font-size: 16px;
                    line-height: 20px;
                    font-weight: 400;
                    color: #000;
                    text-align: justify;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 50px;
                    text-indent: 50px;
                    text-align: justify;
                  ">
                   Sanction of the competent authority for Rs<strong>{{$net_claimed ? formatIndianCurrency($net_claimed) : 0}}/-</strong>  (Rupees {{ ucwords(str_replace('-', ' ',(\NumberFormatter::create('en_IN', \NumberFormatter::SPELLOUT)->format($net_claimed)))) }} Only) is hereby conveyed / accorded in accordance with the provisions contained in Mininstry of Defence. Department of Defence Research and Development Organization, New Delhi Letter No. DRDO/RD/Pers-10/1161/92/D(R&amp;D) dated 07/01/93 and Ministry of Health and Family Welfare OM No. S.14025/24/2023-EHS dated 15/01/2024 read in conjunction with Director, CHESS, CHESS Letter No dated for paymnet of medical reimbursement to the following individuals of CHESS as shown below:-
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>

        <tr>
        <td style="padding: 0 0px">
          <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
            <thead>
              <tr>
                <th style="
                      font-size: 16px;
                      line-height: 24px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                    ">
                  Sr. No.
                </th>
                <th style="
                      font-size: 16px;
                      line-height: 24px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                    ">
                  Emp Code
                </th>
                <th style="
                      font-size: 16px;
                      line-height: 24px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                    ">
                  GPF/PRAN No.
                </th>
                <th style="
                      font-size: 16px;
                      line-height: 24px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                    ">
                  Employee Name &amp; Rank
                </th>
                <th style="
                      font-size: 16px;
                      line-height: 24px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                    ">
                  Patient Name Shri / Smt
                </th>
                <th style="
                      font-size: 16px;
                      line-height: 24px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                    ">
                 Relation
                </th>
                <th style="
                      font-size: 16px;
                      line-height: 24px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      border-right: 1px solid #000;
                    ">
                  Amount (Rs.)
                </th>

              </tr>
            </thead>
            <tbody>


                            @foreach ($item as $key_new => $medical)
              <tr>
                <td style="
                font-size: 16px;
                line-height: 24px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-top: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                 {{$key_new + 1}}
                </td>

                <td style="
                font-size: 16px;
                line-height: 24px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-top: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                  {{$medical->member->emp_id ?? ''}}
                </td>
                <td style="
                font-size: 16px;
                line-height: 24px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-top: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                  {{ $medical->member->gpf_number ?? $medical->member->pran_number ?? '' }}

                </td>
                                <td style="
                font-size: 16px;
                line-height: 24px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-top: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                    {{$medical->member->name ?? ''}} ,  {{$medical->member->desigs->designation ?? ''}}
                </td>
                                <td style="
                font-size: 16px;
                line-height: 24px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-top: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                  {{$medical->patient_name ?? ''}}
                </td>
                <td style="
                font-size: 16px;
                line-height: 24px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-top: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                  {{$medical->treatment_for ?? ''}}
                </td>

                <td style="
                font-size: 16px;
                line-height: 24px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-top: 1px solid #000;
                border-left: 1px solid #000;
                border-right: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
              {{$medical->amount_claimed ?? ''}}
                </td>
              </tr>
              @endforeach

            </tbody>
          </table>
        </td>
      </tr>

        <tr>
            <td style="
            font-size: 16px;
            line-height: 14px;
            font-weight: normal;
            color: #000;
            text-align: right;
            padding: 20px 5px 0px 5px!important;
            margin-top: 20px !important;
            /* height: 50px; */
            ">
            <strong>Total : {{$net_claimed}}</strong>
            </td>

        </tr>


<tr>
        <td style="padding: 0 0px">
          <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                          <tbody><tr>
              <td colspan="9" style="
                font-size: 20px;
                line-height: 30px;
                font-weight: 400;
                color: #000;
                text-align: right;
                padding: 50px 5px 0px 5px !important;
                margin: 0px 0px !important;
                height: 100px;
              ">
                C.F.A
                </td>
              </tr>
              <tr>
                <td colspan="9" style="
                font-size: 16px;
                line-height: 24px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 50px 5px 0px 5px !important;
                margin: 0px 0px !important;
                height: 100px;
              ">
                Center For High Energy Systems and Science CHESS
                </td>
              </tr>
                            <tr>
                <td colspan="9" style="
                font-size: 16px;
                line-height: 24px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 5px 5px 0px 5px !important;
                margin: 0px 0px !important;

              ">
                To
                </td>
              </tr>
                            <tr>
                <td colspan="9" style="
                font-size: 16px;
                line-height: 24px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 5px 5px 0px 5px !important;
                margin: 0px 0px !important;

              ">
                CDA HYDERABAD
                </td>
              </tr>
            <tr>
                <td colspan="9" style="
                font-size: 16px;
                line-height: 24px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 5px 5px 0px 5px !important;
                margin: 0px 0px !important;

              ">
                HYDERABAD
                </td>
              </tr>

 </tbody></table>
    </td></tr></tbody>
  </table>
    <div class="page-break"></div>
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="border-radius: 0px; margin: 0 auto; text-align: center">
    <tbody>
      <tr>
        <td style="padding: 0 0px">
          <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
            <tbody>
            <tr>
              <td style="
                font-size: 16px;
                line-height: 14px;
                font-weight: normal;
                color: #000;
                text-align: center;
                padding: 20px 5px 0px 5px!important;
                margin-top: 20px !important;
              ">
                <strong><u>NOTING SHEET</u></strong>
                </td>
            </tr>
                        <tr>
              <td style="
                font-size: 16px;
                line-height: 14px;
                font-weight: normal;
                color: #000;
                text-align: center;
                padding: 20px 5px 0px 5px!important;
                margin-top: 20px !important;
              ">
                <!-- Toplist No. 20250250021 -->
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
                <td style="
                font-size: 16px;
                line-height: 14px;
                font-weight: normal;
                color: #000;
                text-align: left;
                padding: 0px 5px 0px 5px !important;
                margin-top: 50px !important;
                height: 50px;
              ">
                  No.:CHESS/FIN/MED/25-26
                </td>
                <td style="
                font-size: 16px;
                line-height: 14px;
                font-weight: normal;
                color: #000;
                text-align: right;
                padding: 5px 5px 0px 5px!important;
                margin-top: 50px !important;
                height: 50px;
              ">
                 <strong> </strong>  Date: 28/04/2025
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
      <tr>
          <td>
            <table style="width: 100%;">
              <tbody>
                <tr>
                  <td colspan="9" style="
                    font-size: 16px;
                    line-height: 24px;
                    font-weight: 400;
                    color: #000;
                    text-align: justify;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                  ">
                   Placed opposite one sanction letter for remibursement medical claim for Rs <strong>{{$net_claimed ? formatIndianCurrency($net_claimed) : 0}}/-</strong>  (Rupees {{ ucwords(str_replace('-', ' ',(\NumberFormatter::create('en_IN', \NumberFormatter::SPELLOUT)->format($net_claimed)))) }} Only)  pertaining to following {{($item->count())}} claims.
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>

        <tr>
        <td style="padding: 0 0px">
          <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
            <thead>
              <tr>
                <th style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      vertical-align: top;
                    ">
                  S. No.
                </th>
                <th style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      vertical-align: top;
                    ">
                    <span style="white-space: nowrap;">Employee Name,</span>

                   Rank &amp; Emp Code
                </th>
                <th style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      vertical-align: top;
                    ">
                 <span style="white-space: nowrap;"> Patient, Bill Date &amp;</span> CGHS Card No of Patient
                </th>
                <th style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      vertical-align: top;
                    ">
                  Name of the Hospital
                </th>
                <th style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      vertical-align: top;
                    ">
                   Bill No &amp; Bill Date
                </th>
                <th style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      vertical-align: top;
                    ">
                  Amount of Sanction (Rs.)
                </th>
                <th style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      border-right: 1px solid #000;
                      vertical-align: top;
                    ">
                  Payable To
                </th>

              </tr>
            </thead>
            <tbody>


                            @foreach ($item as $key_last => $medical)
              <tr>
                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-top: 1px solid #000;
                border-bottom: 1px solid #000;
                vertical-align: top;
              ">
                  {{$key_last}}
                </td>

                <td style="
                font-size: 14px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-top: 1px solid #000;
                border-bottom: 1px solid #000;
                vertical-align: top;
              ">
                  {{$medical->member->name ?? ''}},  {{$medical->member->desigs->designation ?? ''}},  {{$medical->member->emp_id ?? ''}}
                </td>
                <td style="
                      font-size: 14px;
                      line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-top: 1px solid #000;
                border-bottom: 1px solid #000;
                vertical-align: top;
              ">
                  {{$medical->treatment_for ?? ''}},
                      {{$medical->bill_date ? date('d-M-Y', strtotime($medical->bill_date)) : ''}},
                  {{$medical->type_number ?? ''}}
                </td>
                                <td style="
                      font-size: 14px;
                      line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-top: 1px solid #000;
                border-bottom: 1px solid #000;
                width: 150px;
                vertical-align: top;
              ">
                    {{$medical->name_of_hospital ?? ''}}
                </td>
                                <td style="
                      font-size: 14px;
                      line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-top: 1px solid #000;
                border-bottom: 1px solid #000;
                vertical-align: top;
              ">
                  {{$medical->bill_no ?? ''}},   {{$medical->bill_date ? date('d-M-Y', strtotime($medical->bill_date)) : ''}}
                </td>
                <td style="
                      font-size: 14px;
                      line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-top: 1px solid #000;
                border-bottom: 1px solid #000;
                vertical-align: top;
              ">
                  {{$medical->amount_claimed ?? ''}}.
                </td>

                <td style="
                      font-size: 14px;
                      line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-top: 1px solid #000;
                border-left: 1px solid #000;
                border-right: 1px solid #000;
                border-bottom: 1px solid #000;
                                vertical-align: top;
              ">
              Individual
                </td>
              </tr>
             @endforeach


            </tbody>
          </table>
        </td>
      </tr>

        <tr>
            <td style="
                      font-size: 14px;
                      line-height: 18px;
            font-weight: normal;
            color: #000;
            text-align: right;
            padding: 20px 5px 0px 5px!important;
            margin-top: 20px !important;
            /* height: 50px; */
            ">
            <strong>Total Net Amt Claimed : {{$net_claimed}}</strong>
            </td>

        </tr>

        <tr>
          <td>
            <table style="width: 100%;">
              <tbody>
                <tr>
                  <td style="
                      font-size: 14px;
                      line-height: 18px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 10px 5px !important;
                    margin: 0px 0px !important;
                    vertical-align: top;

                  ">
                    CFA may kindly accord sanction.
                  </td>
                </tr>

              </tbody>
            </table>
          </td>
        </tr>
<tr>
        <td style="padding: 0 0px">
          <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
              <tbody><tr>
                <td colspan="9" style="
                font-size: 16px;
                line-height: 24px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 50px 5px 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
              ">
                Sr. ACCOUNT OFFICER
                </td>
              <td colspan="9" style="
                font-size: 16px;
                line-height: 24px;
                font-weight: 400;
                color: #000;
                text-align: right;
                padding: 50px 5px 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
              ">
                SECTION INCHARGE
                </td>
              </tr>
            <tr>
              <td colspan="9" style="
                font-size: 16px;
                line-height: 24px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 50px 5px 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
              ">
                CRA
                </td>
              </tr>

 </tbody></table>
    </td></tr></tbody>
  </table>
    @endforeach

</body>

</html>
