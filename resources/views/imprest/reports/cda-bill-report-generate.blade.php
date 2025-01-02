<!DOCTYPE html>
<html lang="en">
<title>RCI</title>
<meta charset="utf-8" />

<body style="background: #fff">
    <center>
        <img src="{{ public_path('storage/' . $logo->logo) }}" style="max-width: 50px;">
    </center>
    <br>
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
                                    Bills at CDA as on {{ $report_date ?? '' }}
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
                                    Project
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
                                    ADV Amt
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
                                    CRV No
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
                                    Firm Name
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
                                    CDA Bill No
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
                                    CDA Bill Date
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
                                    CDA Bill Amt
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($cdaReceipts)
                                @foreach ($cdaReceipts as $key => $cdaReceipt)
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
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                            {{ $cdaReceipt->pc_no ?? '' }}
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
                                            {{ $cdaReceipt->project ?? '' }}
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
                                            {{ $cdaReceipt->adv_no ?? '' }}
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
                                            {{ $cdaReceipt->adv_date ?? '' }}
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
                                            {{ $cdaReceipt->adv_amount ?? '' }}
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
                                            {{ $cdaReceipt->settle_vr_no ?? '' }}

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
                                            {{ $cdaReceipt->settle_vr_date ?? '' }}
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
                                            {{ $cdaReceipt->settle_amount ?? '' }}
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
                                            {{ $cdaReceipt->settle_vr_no ?? '' }}
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
                                            {{ $cdaReceipt->settle_firm ?? '' }}
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
                                            {{ $cdaReceipt->cda_bill_no ?? '' }}
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
                                            {{ $cdaReceipt->cda_bill_date ?? '' }}
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
                                            {{ $cdaReceipt->cda_bill_amount ?? '' }}

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
                      text-align: right;
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
                      text-align: left;
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
                      text-align: left;
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
                      text-align: right;
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
                      text-align: left;
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
                      text-align: right;
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
          text-align: left;
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
                text-align: right;
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
                text-align: right;
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
                text-align: right;
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
                text-align: right;
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
                text-align: left;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                border: 1px solid #000;
                height: 5px;
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
                border: 1px solid #000;
                height: 5px;
              ">
                                    {{ $totalAmount ?? 0 }}

                                </td>
                            </tr>

                        </tbody>
                    </table>
</body>

</html>
