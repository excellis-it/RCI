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
            <img src="{{ public_path('storage/' . $logo->logo) }}" style="max-width: 50px; padding-bottom: 5px" />
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
              padding: 0px 0px !important;
              margin: 0px 0px !important;
              text-transform: uppercase;

            ">
                                        CENTER FOR HIGHENERGY SYSTEMS & SCIENCES (CHESS) <br />
                                        RCI CAMPUS, HYDERABAD - 500 069 <br />

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
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    ">
                                        Bills on Hand as on {{ $report_date }}
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
