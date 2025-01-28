<!DOCTYPE html>
<html lang="en">
    <title>RCI</title>
    <meta charset="utf-8" />

    <body style="background: #fff">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff"
            style="border-radius: 0px; margin: 0 auto; text-align: center">
            <tbody>
                <tr>
                    <td style="padding: 0 0px">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                            <tbody>
                                <tr>
                                    <td
                                        style="
                      font-size: 18px;
                      line-height: 14px;
                      font-weight: 500;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                        RECOVERY SCHEDULE OF CGEG IN R/O GPF STAFF FOR THE MONTH OF
                                        {{ $month_name }}-{{ $year }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td style="padding: 10px 0px">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                            <tbody>
                                <tr>
                                    <td
                                        style="
                      font-size: 15px;
                      line-height: 18px;
                      font-weight: 500;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                        Page No: 1
                                    </td>
                                    <td
                                        style="
                      font-size: 15px;
                      line-height: 18px;
                      font-weight: 400;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                        CHESS,CHESS
                                    </td>
                                    <td
                                        style="
                      font-size: 15px;
                      line-height: 18px;
                      font-weight: 400;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                        UNIT CODE: 330000110
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
                                    <th
                                        style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      background: #cdcdcd;
                    ">
                                        SRNO
                                    </th>
                                    <th
                                        style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      background: #cdcdcd;
                    ">
                                        EMP NAME
                                    </th>
                                    <th
                                        style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      background: #cdcdcd;
                    ">
                                        EMP CODE
                                    </th>
                                    <th
                                        style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                      border-top: 1px solid #000;
                      background: #cdcdcd;
                    ">
                                        GPF. NO
                                    </th>
                                    <th
                                        style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                      border-top: 1px solid #000;
                      background: #cdcdcd;
                    ">
                                        DESIGNATION
                                    </th>
                                    <th
                                        style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                      border-top: 1px solid #000;
                      background: #cdcdcd;
                    ">
                                        CGHS AMOUNT
                                    </th>
                                    <th
                                        style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                      border-top: 1px solid #000;
                      border-right: 1px solid #000;
                      background: #cdcdcd;
                    ">
                                        CGE ARR AMOUNT
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total_amount = 0;
                                    $total_arrear_amount = 0;

                                @endphp
                                @foreach ($all_members_info as $key => $memberInfo)
                                    @php
                                        $total_amount += $memberInfo['details']['member_debit']['cghs'] ?? 0;
                                    @endphp
                                    {{-- <h3>Member ID: {{ $memberInfo['member_data']['id'] }}</h3> --}}


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
                height: 20px;
                border-left: 1px solid #000;
                border-top: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                                            {{ $key + 1 }}
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
                height: 20px;
                border-left: 1px solid #000;
                border-top: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                                            {{ $memberInfo['member_data']['name'] }}
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
                height: 20px;
                border-left: 1px solid #000;
                border-top: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                                            {{ $memberInfo['member_data']['emp_id'] }}
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
                height: 20px;
                border-top: 1px solid #000;
                border-left: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                                            {{ '' }}
                                        </td>
                                        <td
                                            style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: LEFT;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-top: 1px solid #000;
                border-left: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                                            {{ $memberInfo['member_data']['desigs']['designation'] }}
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
                height: 20px;
                border-top: 1px solid #000;
                border-left: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                                            {{ $memberInfo['details']['member_debit']['cghs'] ?? 0 }}
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
                height: 20px;
                border-top: 1px solid #000;
                border-left: 1px solid #000;
                border-right: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                                            {{ 0 }}
                                        </td>
                                    </tr>
                                @endforeach


                                <tr>
                                    <td
                                        style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-bottom: 1px solid #000;
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
                height: 20px;
                border-left: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                                        Page Summary-1
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
                height: 20px;
                border-left: 1px solid #000;
                border-bottom: 1px solid #000;
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
                height: 20px;
                border-left: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                                    </td>
                                    <td
                                        style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: LEFT;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                                        Total
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
                height: 20px;
                border-left: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                                        {{ $total_amount }}
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
                height: 20px;
                border-left: 1px solid #000;
                border-right: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                                        {{ 0 }}
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="9"
                                        style="
                font-size: 15px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
              ">
                                        GRAND SUMMARY OF GPF SUBSCRIPTION
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 0 0px">
                        <table width="65%" border="0" cellpadding="0" cellspacing="0" align="center">
                            <thead>
                                <tr>
                                    <th
                                        style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      background: #cdcdcd;
                    ">
                                        PAGE SUMMARY
                                    </th>
                                    <th
                                        style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      background: #cdcdcd;
                    ">
                                        TOTAL AMOUNT
                                    </th>
                                    <th
                                        style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      border-right: 1px solid #000;
                      background: #cdcdcd;
                    ">
                                        TOTAL ARREAR AMOUNT
                                    </th>
                                </tr>
                            </thead>
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
                height: 20px;
                border-left: 1px solid #000;
                border-top: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                                        Page Summary-1
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
                height: 20px;
                border-left: 1px solid #000;
                border-top: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                                        {{ $total_amount }}
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
                height: 20px;
                border-top: 1px solid #000;
                border-left: 1px solid #000;
                border-right: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                                        {{ $total_arrear_amount }}
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
                height: 20px;
                border-left: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                                        GRAND SUMMARY
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
                height: 20px;
                border-left: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                                        {{ $total_amount }}
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
                height: 20px;
                border-left: 1px solid #000;
                border-right: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                                        0
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
                                    <td colspan="9"
                                        style="
                    font-size: 15px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: center;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                  ">
                                        (Rupees Two Hundred Fifty Only)
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="9"
                                        style="
                    font-size: 15px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: LEFT;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                  ">
                                        Certified that total amount of these schedule tallies with the amount deducted
                                        from pay bill
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="
          height: 50px;
        ">
                    </td>
                </tr>
                <tr>
                    <td>
                        <table style="width: 100%;">
                            <tbody>
                                <tr>
                                    <td
                                        style="
                    font-size: 16px;
                    line-height: 20px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    width: 70%;
                  ">
                                        CHESS,<br>
                                        CHESS
                                        <br>
                                        DATE: {{ date('d-m-Y') }}
                                    </td>
                                    <td
                                        style="
                    font-size: 16px;
                    line-height: 20px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                  ">
                                        D. MADHU SUDAN REDDY
                                        <br>
                                        ACCOUNTS OFFICER
                                        <br>
                                        For Director
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
