<!DOCTYPE html>
<html lang="en">
<title>RCI</title>
<meta charset="utf-8" />

<body style="background: #fff">
    <div>
        <img src="https://excellis.co.in/rci//public/storage/logo/mJzAtluGFNXqKGhAfsw0riQ8ijlyvS29v56TAP2y.png"
            alt="App Logo" style="max-width: 50px;">
    </div>
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
                      border: 1px solid #000;
                    ">
                                    Bills on Hand as on 17/01/2024
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
                                    height: 5px;
                                ">
                                    Sr No
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
                                    height: 5px;
                                ">
                                    PC No
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
                                    height: 5px;
                                ">
                                    ADV No
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
                                    height: 5px;
                                ">
                                    ADV Date
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
                                    height: 5px;
                                ">
                                    ADV Amount
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
                                    height: 5px;
                                ">
                                    Sett. Vr No
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
                                    height: 5px;
                                ">
                                    Sett. Date
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
                                    height: 5px;
                                ">
                                    Sett. Amt
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($settleBills)
                                @foreach ($settleBills as $index => $settleBill)
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
                                            border: 1px solid #000;
                                            height: 5px;
                                        ">
                                            {{ $index + 1 }}
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
                                            height: 5px;
                                        ">
                                            {{ $settleBill->advanceFund->pc_no }}
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
                                            border: 1px solid #000;
                                            height: 5px;
                                        ">
                                            {{ $settleBill->adv_no }}
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
                                            height: 5px;
                                        ">
                                            {{ \Carbon\Carbon::parse($settleBill->adv_date)->format('d/m/Y') }}
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
                                            border: 1px solid #000;
                                            height: 5px;
                                        ">
                                            {{ $settleBill->adv_amount }}
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
                                            height: 5px;
                                        ">
                                            {{ $settleBill->var_no }}
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
                                            height: 5px;
                                        ">
                                            {{ \Carbon\Carbon::parse($settleBill->var_date)->format('d/m/Y') }}
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
                                            border: 1px solid #000;
                                            height: 5px;
                                        ">
                                            {{ $settleBill->bill_amount }}
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>

                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>
