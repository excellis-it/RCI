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
              font-size: 10px;
              line-height: 14px;
              font-weight: 600;
              color: #000;
              text-align: center;
              padding: 0px 5px !important;
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
                                        Outstanding Bills as on {{ $report_date }}
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
                      text-align: center;
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
                      text-align: center;
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
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                        Project
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
                                        ADV No
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
                                        ADV Date
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
                                        ADV Amt
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
                                        Outstand Amt
                                    </td>
                                </tr>
                            </thead>
                            <tbody>

                                @if ($advanceFunds)
                                    @foreach ($advanceFunds as $index => $advanceFund)
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
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                                {{ $advanceFund->pc_no }}
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
                                                {{ $advanceFund->project->name }}
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
                                                {{ $advanceFund->adv_no }}
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
                                                {{ $advanceFund->adv_date }}
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
                                                {{ $advanceFund->adv_amount }}
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
                                                {{ $advanceFund->outstand_amount }}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif


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
                height: 5px;
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
                border: 1px solid #000;
                height: 5px;
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
                border: 1px solid #000;
                height: 5px;
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
                border: 1px solid #000;
                height: 5px;
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
                border: 1px solid #000;
                height: 5px;
                text-transform: uppercase;
              ">
                                        TOTAL
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
                                        {{ $totalAmount }}
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
                                        {{ $totalOutStandAmount }}
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
