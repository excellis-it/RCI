<!DOCTYPE html>
<html lang="en">
    <title>RCI - Inventory Items Report</title>
    <meta charset="utf-8" />
    <style>
        @page {
            margin: 10px;
            padding: 10px;
        }
    </style>

    <body style="background: #fff">
        <center>
            <img src="{{ public_path('storage/' . $logo->logo) }}" style="max-width: 50px;">
        </center>
        <br>
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
                                        CENTER FOR HIGH ENERGY SYSTEMS & SCIENCES<br>
                                        RCI CAMPUS, HYDERABAD - 500 069 <br />
                                        <br>
                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        style="
                      font-size: 12px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                        Annual Stock Verification Report For {{ date('Y-m-d', strtotime($startDate)) }}
                                        to {{ date('Y-m-d', strtotime($endDate)) }}
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
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                        Page No: 1
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
                height: 20px;
                border-top: 1px solid #000;
                border-left: 1px solid #000;
              ">
                                        Inv No <b>{{ $inventory->number }}</b>
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
                ">
                                        INV Holder Name <b>{{ $inventory->member->name ?? 'N/A' }}</b>
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
                  border-right: 1px solid #000;
                ">
                                        Division <b>{{ $inventory->group->name ?? 'N/A' }}</b>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                            <thead>
                                <tr>
                                    <th
                                        style="
                      font-size: 10px;
                      vertical-align: top;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      border-bottom: 1px solid #000;
                    ">
                                        Sl.No
                                    </th>
                                    <th
                                        style="
                      font-size: 10px;
                      vertical-align: top;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      border-bottom: 1px solid #000;
                    ">
                                        LVP
                                    </th>
                                    <th
                                        style="
                      font-size: 10px;
                      vertical-align: top;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      border-bottom: 1px solid #000;
                    ">
                                        Description
                                    </th>
                                    <th
                                        style="
                      font-size: 10px;
                      vertical-align: top;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      border-bottom: 1px solid #000;
                    ">
                                        NC/C
                                    </th>
                                    <th
                                        style="
                      font-size: 10px;
                      vertical-align: top;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                      border-top: 1px solid #000;
                      border-bottom: 1px solid #000;
                    ">
                                        UOM
                                    </th>
                                    <th
                                        style="
                      font-size: 10px;
                      vertical-align: top;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                      border-top: 1px solid #000;
                      border-bottom: 1px solid #000;
                    ">
                                        Rate
                                    </th>
                                    <th
                                        style="
                      font-size: 10px;
                      vertical-align: top;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                      border-top: 1px solid #000;
                      border-bottom: 1px solid #000;
                    ">
                                        Qty
                                    </th>
                                    <th
                                        style="
                      font-size: 10px;
                      vertical-align: top;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                      border-top: 1px solid #000;
                      border-bottom: 1px solid #000;
                    ">
                                        Value
                                    </th>
                                    <th
                                        style="
                      font-size: 10px;
                      vertical-align: top;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                      border-top: 1px solid #000;
                      border-bottom: 1px solid #000;
                    ">
                                        Vr.Details
                                    </th>
                                    <th
                                        style="
                      font-size: 10px;
                      vertical-align: top;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                      border-top: 1px solid #000;
                      border-right: 1px solid #000;
                      border-bottom: 1px solid #000;
                    ">
                                        Remarks
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($inventoryItems as $item)
                                    <tr>
                                        <td
                                            style="
                font-size: 10px;
                vertical-align: top;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
              ">
                                            {{ $item['sl_no'] }}
                                        </td>
                                        <td
                                            style="
                font-size: 10px;
                vertical-align: top;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
              ">
                                            {{ $item['lvp'] }}
                                        </td>
                                        <td
                                            style="
                font-size: 10px;
                vertical-align: top;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
              ">
                                            {{ $item['description'] }}
                                        </td>
                                        <td
                                            style="
                font-size: 10px;
                vertical-align: top;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
              ">
                                            {{ $item['nc_c'] }}
                                        </td>
                                        <td
                                            style="
                font-size: 10px;
                vertical-align: top;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
              ">
                                            {{ $item['uom'] }}
                                        </td>
                                        <td
                                            style="
                font-size: 10px;
                vertical-align: top;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
              ">
                                            {{ number_format($item['rate'], 2) }}
                                        </td>
                                        <td
                                            style="
                font-size: 10px;
                vertical-align: top;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
              ">
                                            {{ $item['qty'] }}
                                        </td>
                                        <td
                                            style="
                font-size: 10px;
                vertical-align: top;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
              ">
                                            {{ number_format($item['value'], 2) }}
                                        </td>
                                        <td
                                            style="
                font-size: 10px;
                vertical-align: top;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
              ">
                                            {{ $item['vr_details'] }}
                                        </td>
                                        <td
                                            style="
                font-size: 10px;
                vertical-align: top;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-right: 1px solid #000;
              ">
                                            {{ $item['remarks'] }}
                                        </td>
                                    </tr>
                                @endforeach

                                @if (count($inventoryItems) == 0)
                                    <tr>
                                        <td colspan="10"
                                            style="text-align: center; border-left: 1px solid #000; border-right: 1px solid #000; padding: 10px;">
                                            No inventory items found
                                        </td>
                                    </tr>
                                @endif

                                <tr>
                                    <td colspan="7"
                                        style="
                font-size: 10px;
                vertical-align: top;
                line-height: 14px;
                font-weight: 600;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-top: 1px solid #000;
              ">
                                        Total Value:
                                    </td>
                                    <td
                                        style="
                font-size: 10px;
                vertical-align: top;
                line-height: 14px;
                font-weight: 600;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-top: 1px solid #000;
              ">
                                        {{ number_format($totalValue, 2) }}
                                    </td>
                                    <td colspan="2"
                                        style="
                font-size: 10px;
                vertical-align: top;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-right: 1px solid #000;
                border-top: 1px solid #000;
              ">

                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="10"
                                        style="
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                border-left: 1px solid #000;
                border-right: 1px solid #000;
                border-top: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
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
                                        INVENTORY CHECKING OFFICER
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
                                        INVENTORY HOLDER
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
