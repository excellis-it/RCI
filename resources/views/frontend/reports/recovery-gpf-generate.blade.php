@php
    use App\Helpers\Helper;
@endphp
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
                                        ({{ Helper::numberToWords($total_amount) }})
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

<div style="page-break-before: always;"></div>

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
                                        RECOVERY SCHEDULE OF CGEGIS IN R/O GPF STAFF FOR THE MONTH OF
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
                                        CGE AMOUNT
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
                                    $total_amount_cgegis = 0;
                                    $total_arrear_amount_cgegis = 0;

                                @endphp
                                @foreach ($all_members_info as $key => $memberInfo)
                                    @php
                                        $total_amount_cgegis += $memberInfo['details']['member_debit']['cgegis'] ?? 0;
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
                                            {{ $memberInfo['details']['member_debit']['cgegis'] ?? 0 }}
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
                                        {{ $total_amount_cgegis }}
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
                                        {{ $total_amount_cgegis }}
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
                                        {{ $total_amount_cgegis }}
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
                                        ({{ Helper::numberToWords($total_amount_cgegis) }})
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

<div style="page-break-before: always;"></div>


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
                                        RECOVERY SCHEDULE OF GPF SUBSCRIPTION IN RIO GPF STAFF FOR THE MONTH OF
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
                      text-align: left;
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
                      text-align: left;
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
                      text-align: left;
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
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                      border-top: 1px solid #000;
                      background: #cdcdcd;
                    ">
                                        RANK
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
                                        BASIC PAY
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
                                        A/C NO
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
                                        SUBS
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
                                        REFUND
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
                                        ARRS
                                    </th>
                                </tr>
                            </thead>
                            <tbody>


                                @php
                                    $total_amount_gpf_sub = 0;
                                    $total_amount_gpf_refund = 0;

                                @endphp
                                @foreach ($all_members_info as $key => $memberInfo)
                                    @php
                                        $total_amount_gpf_sub += $memberInfo['details']['member_debit']['gpa_sub'] ?? 0;
                                        $total_amount_gpf_refund +=
                                            $memberInfo['details']['member_debit']['gpf_adv'] ?? 0;
                                    @endphp

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
                                            MTS
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
                                            {{ $memberInfo['details']['member_debit']['basic'] ?? 0 }}
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
                                            {{ $memberInfo['details']['member_core_info']['bank_acc_no'] ?? 0 }}
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
                                            {{ $memberInfo['details']['member_debit']['gpa_sub'] ?? 0 }}
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
                                            {{ $memberInfo['details']['member_debit']['gpf_adv'] ?? 0 }}
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
                                            0
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
                text-align: right;
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
                                        {{ $total_amount_gpf_sub }}
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
                                        {{ $total_amount_gpf_refund }}
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
                                        GRAND SUMMARY OF GPF SUBSCRIPTION SUBSCRIPTION
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 0 0px">
                        <table width="65%" border="0" cellpadding="0" cellspacing="0" align="left">
                            <thead>
                                <tr>
                                    <th
                                        style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;
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
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      background: #cdcdcd;
                    ">
                                        Amount Of Subscription
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
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      background: #cdcdcd;
                    ">
                                        Refund of Withdrawal
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
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      background: #cdcdcd;
                    ">
                                        GPF ARRS
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
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      border-right: 1px solid #000;
                      background: #cdcdcd;
                    ">
                                        TOTAL AMOUNT
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
                                        {{ $total_amount_gpf_sub }}
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
                                        {{ $total_amount_gpf_refund }}
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
                                        0
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
                                        {{ $total_amount_gpf_sub + $total_amount_gpf_refund }}
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
                                        {{ $total_amount_gpf_sub }}
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
                                        {{ $total_amount_gpf_refund }}
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
                                        0
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
                                        {{ $total_amount_gpf_sub + $total_amount_gpf_refund }}
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
                                        ({{ Helper::numberToWords($total_amount_gpf_sub + $total_amount_gpf_refund) }})
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
                                        CHESS,
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

<div style="page-break-before: always;"></div>


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
                                        RECOVERY SCHEDULE OF HBA ADV IN R/O GPF OFFICER FOR THE MONTH OF
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
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
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
                                        ADVANCE
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
                                        HBA ADV REC
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
                                        INST NO/TO INT
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
                                        APPR INT
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
                                        BALANCE
                                    </th>
                                </tr>
                            </thead>
                            <tbody>



                                @php
                                    // $total_amount_hba_adv_rec = 0;
                                    // $total_amount_hba_adv_inst = 0;
                                    // $total_amount_hba_adv_appr = 0;
                                @endphp
                                @foreach ($all_members_info as $key => $memberInfo)
                                    @php
                                        // $total_amount_hba_adv_rec +=
                                        //     $memberInfo['details']['member_debit']['hba_adv_rec'] ?? 0;
                                        // $total_amount_hba_adv_inst +=
                                        //     $memberInfo['details']['member_debit']['hba_adv_inst'] ?? 0;
                                        // $total_amount_hba_adv_appr +=
                                        //     $memberInfo['details']['member_debit']['hba_adv_appr'] ?? 0;
                                    @endphp



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
                                            {{ $memberInfo['member_data']['desigs']['designation'] }}
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
                                            {{ '' }}
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
                                            {{ $memberInfo['details']['member_debit']['hba'] ?? 0 }}
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
                                            {{ $memberInfo['details']['member_debit']['hba_adv_rec'] ?? 0 }}
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
                                            0/0
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
                                            0
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
                                            0
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
                                        0
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
                                        GRAND SUMMARY OF HBA ADV SUBSCRIPTION
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
                      border-right: 1px solid #000;
                      background: #cdcdcd;
                    ">
                                        TOTAL AMOUNT
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
                text-align: left;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-top: 1px solid #000;
                border-left: 1px solid #000;
                border-right: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                                        0
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
                text-align: left;
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
                                        <u>(0)</u>
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

<div style="page-break-before: always;"></div>

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
                                        RECOVERY SCHEDULE OF HBA INTEREST IN R/O GPF OFFICER FOR THE MONTH OF
                                        JANUARY-2025
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
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
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
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                      border-top: 1px solid #000;
                      background: #cdcdcd;
                    ">
                                        TOTAL<br>INTREST
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
                                        HBA <br>INTEREST <br>REC
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
                                        INST NO/TO <br>INT
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
                                        BALANCE
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
                                        1
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
                                        Mr. VEERENSRA KUMAR
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
                                        2004AB1123
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
                                        Sc E
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
                                        1605686
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
                                        479329
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
                                        7990
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
                                        3/60
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
                                        455359
                                    </td>
                                </tr>
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
                text-align: right;
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
                                        7990
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
                text-align: right;
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
                                        <u>GRAND SUMMARY OF HBA INTEREST SUBSCRIPTION</u>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 0 0px">
                        <table width="45%" border="0" cellpadding="0" cellspacing="0" align="center">
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
                      border-right: 1px solid #000;
                      background: #cdcdcd;
                    ">
                                        TOTAL AMOUNT
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
                text-align: left;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-top: 1px solid #000;
                border-left: 1px solid #000;
                border-right: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                                        7990
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
                text-align: left;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-right: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                                        7990
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
                                        <u>(Rupees Seven Thousand Nine Hundred Ninety Only)</u>
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
                                        DATE:17-1-2025
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

<div style="page-break-before: always;"></div>

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
                                        RECOVERY SCHEDULE OF INCOME TAX IN R/O GPF STAFF FOR THE MONTH OF JANUARY-2025
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
                                        DESIGNATION
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
                                        PAN No
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
                                        IT REC
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
                                        EDN CESS / HEALTH 4%
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
                                        TOTAL IT
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
                                        1
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
                                        J CHALAPATHI RAMAIYA
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
                                        MTS
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
                                        1358151
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
                                        AQWPR7968J
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
                                        4135
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
                                        165
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
                                        4300
                                    </td>
                                </tr>
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
                                        4135
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
                                        165
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
                                        4300
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
                                        GRAND SUMMARY OF INCOME TAX
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
                                        IT RCE
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
                                        EDN CESS / HEALTH 4%
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
                                        Total IT
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
                                        4135
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
                                        165
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
                                        4300
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
                                        4135
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
                                        165
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
                                        4300
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
                                        (Rupees Four Thousand Three Hundred Only)
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
                                        DATE:17-1-2025
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

<div style="page-break-before: always;"></div>

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
                                        RECOVERY SCHEDULE OF MISC DEBIT I IN R/O GPF OFFICER FOR THE MONTH OF
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
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
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
                      border-right: 1px solid #000;
                      background: #cdcdcd;
                    ">
                                        AMOUNT
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @php
                                    $total_amount_misc1 = 0;

                                @endphp
                                @foreach ($all_members_info as $key => $memberInfo)
                                    @php
                                        $total_amount_misc1 += $memberInfo['details']['member_debit']['misc1'] ?? 0;
                                    @endphp

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
                border-right: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                                            {{ $memberInfo['details']['member_debit']['misc1'] ?? 0 }}
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
                border-right: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                                        {{ $total_amount_misc1 }}
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
                                        GRAND SUMMARY OF MISC DEBIT I SUBSCRIPTION
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 0 0px">
                        <table width="45%" border="0" cellpadding="0" cellspacing="0" align="center">
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
                      border-right: 1px solid #000;
                      background: #cdcdcd;
                    ">
                                        TOTAL AMOUNT
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
                border-top: 1px solid #000;
                border-left: 1px solid #000;
                border-right: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                                        {{ $total_amount_misc1 }}
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
                border-right: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                                        {{ $total_amount_misc1 }}
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
                                        <u>({{ Helper::numberToWords($total_amount_misc1) }})</u>
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

<div style="page-break-before: always;"></div>

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
                      text-decoration: underline;
                    ">
                                        RECOVERY SCHEDULE OF QUARTER CHARGES IN R/O GPF OFFICER FOR THE MONTH OF
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
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      border-bottom: 1px solid #000;
                      background: #cdcdcd;
                    ">
                                        NO
                                    </th>
                                    <th
                                        style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      border-bottom: 1px solid #000;
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
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      border-bottom: 1px solid #000;
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
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      border-bottom: 1px solid #000;
                      background: #cdcdcd;
                    ">
                                        RANK
                                    </th>
                                    <th
                                        style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                      border-top: 1px solid #000;
                      border-bottom: 1px solid #000;
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
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                      border-top: 1px solid #000;
                      border-bottom: 1px solid #000;
                      background: #cdcdcd;
                    ">
                                        QTR<br> TYPE
                                    </th>
                                    <th
                                        style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                      border-top: 1px solid #000;
                      border-bottom: 1px solid #000;
                      background: #cdcdcd;
                    ">
                                        QTR NO
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
                      border-bottom: 1px solid #000;
                      background: #cdcdcd;
                    ">
                                        LICN
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
                      border-bottom: 1px solid #000;
                      background: #cdcdcd;
                    ">
                                        ELECT
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
                      border-bottom: 1px solid #000;
                      background: #cdcdcd;
                    ">
                                        WATER
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
                      border-bottom: 1px solid #000;
                      background: #cdcdcd;
                    ">
                                        FURN
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
                      border-bottom: 1px solid #000;
                      background: #cdcdcd;
                    ">
                                        MISC
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
                      border-bottom: 1px solid #000;
                      background: #cdcdcd;
                    ">
                                        TOTAL<br>RENT
                                    </th>
                                </tr>
                            </thead>
                            <tbody>


                                @php
                                    $total_amount_rent = 0;
                                    $total_amount_licn = 0;
                                    $total_amount_elect = 0;
                                    $total_amount_water = 0;
                                    $total_amount_furn = 0;
                                    $total_amount_misc1 = 0;
                                    $total_amount_rent = 0;
                                @endphp
                                @foreach ($all_members_info as $key => $memberInfo)
                                    @php
                                        $total_amount_licn += 0;
                                        $total_amount_elect += $memberInfo['details']['member_debit']['elec'] ?? 0;
                                        $total_amount_water += $memberInfo['details']['member_debit']['water'] ?? 0;
                                        $total_amount_furn += $memberInfo['details']['member_debit']['furn'] ?? 0;
                                        $total_amount_misc1 += $memberInfo['details']['member_debit']['misc1'] ?? 0;
                                        $total_amount_rent +=
                                            ($memberInfo['details']['member_debit']['elec'] ?? 0) +
                                            ($memberInfo['details']['member_debit']['water'] ?? 0) +
                                            ($memberInfo['details']['member_debit']['furn'] ?? 0) +
                                            ($memberInfo['details']['member_debit']['misc1'] ?? 0);
                                    @endphp



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
                text-align: left;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
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
                text-align: left;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                                            {{ $memberInfo['member_data']['quater_no'] }}
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
                                            0
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
                                            {{ $memberInfo['details']['member_debit']['elec'] ?? 0 }}
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
                                            {{ $memberInfo['details']['member_debit']['water'] ?? 0 }}
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
                                            {{ $memberInfo['details']['member_debit']['furn'] ?? 0 }}
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
                                            {{ $memberInfo['details']['member_debit']['misc1'] ?? 0 }}
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
                                            {{ ($memberInfo['details']['member_debit']['elec'] ?? 0) +
                                                ($memberInfo['details']['member_debit']['water'] ?? 0) +
                                                ($memberInfo['details']['member_debit']['furn'] ?? 0) +
                                                ($memberInfo['details']['member_debit']['misc1'] ?? 0) }}
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
                                        Total -
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
                                        {{ 0 }}
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
                                        {{ $total_amount_elect }}
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
                                        {{ $total_amount_water }}
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
                                        {{ $total_amount_furn }}
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
                                        {{ $total_amount_misc1 }}
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
                                        {{ $total_amount_rent }}
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="13"
                                        style="
                font-size: 15px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                text-decoration: underline;
              ">
                                        GRAND SUMMARY OF HBA ADV SUBSCRIPTION
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
                      text-align: left;
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
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      background: #cdcdcd;
                    ">
                                        LICN
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
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      background: #cdcdcd;
                    ">
                                        ELECT
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
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      background: #cdcdcd;
                    ">
                                        WATER
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
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      background: #cdcdcd;
                    ">
                                        FURN
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
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      background: #cdcdcd;
                    ">
                                        MISC
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
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      border-right: 1px solid #000;
                      background: #cdcdcd;
                    ">
                                        TOTAL RENT
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
                                        {{ 0 }}
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
                                        {{ $total_amount_elect }}
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
                                        {{ $total_amount_water }}
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
                                        {{ $total_amount_furn }}
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
                                        {{ $total_amount_misc1 }}
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
                                        {{ $total_amount_rent }}
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
                                        0
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
                                        {{ $total_amount_elect }}
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
                                        {{ $total_amount_water }}
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
                                        {{ $total_amount_furn }}
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
                                        {{ $total_amount_misc1 }}
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
                                        {{ $total_amount_rent }}
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
                                        <u>({{ Helper::numberToWords($total_amount_rent) }})</u>
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
