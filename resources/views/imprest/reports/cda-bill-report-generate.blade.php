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
          font-size: 18px;
                  line-height: 20px;
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
                      font-size: 16px;
                              line-height: 20px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                       border-bottom: 1px solid #ffffff;
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
                      font-size: 14px;
                              line-height: 20px;
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
                      font-size: 14px;
                              line-height: 20px;
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
                      font-size: 14px;
                              line-height: 20px;
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
                      font-size: 14px;
                              line-height: 20px;
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
                      font-size: 14px;
                              line-height: 20px;
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
                      font-size: 14px;
                              line-height: 20px;
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
                font-size: 14px;
                        line-height: 20px;
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
          font-size: 14px;
                  line-height: 20px;
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
          font-size: 14px;
                  line-height: 20px;
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
          font-size: 14px;
                  line-height: 20px;
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
          font-size: 14px;
                  line-height: 20px;
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
          font-size: 14px;
                  line-height: 20px;
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
          font-size: 14px;
                  line-height: 20px;
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
          font-size: 14px;
                  line-height: 20px;
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
                      font-size: 14px;
                              line-height: 20px;
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
                      font-size: 14px;
                              line-height: 20px;
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
                      font-size: 14px;
                              line-height: 20px;
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
                      font-size: 14px;
                              line-height: 20px;
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
                      font-size: 14px;
                              line-height: 20px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">

                                            {{ $cdaReceipt->adv_date ? \Carbon\Carbon::parse($cdaReceipt->adv_date)->format('d-m-Y') : '' }}
                                        </td>
                                        <td
                                            style="
                      font-size: 14px;
                              line-height: 20px;
                      font-weight: 400;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                                            {{ formatIndianCurrency($cdaReceipt->adv_amount ?? 0, 2) ?? '' }}
                                        </td>
                                        <td
                                            style="
                font-size: 14px;
                        line-height: 20px;
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
          font-size: 14px;
                  line-height: 20px;
          font-weight: 400;
          color: #000;
          text-align: left;
          padding: 0px 5px !important;
          margin: 0px 0px !important;
          border: 1px solid #000;
          height: 5px;
        ">

         {{ $cdaReceipt->settle_vr_date ? date('d-m-Y', strtotime($cdaReceipt->settle_vr_date)) : '' }}
                                        </td>
                                        <td
                                            style="
                font-size: 14px;
                        line-height: 20px;
                font-weight: 400;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                border: 1px solid #000;
                height: 5px;
              ">
                                            {{formatIndianCurrency( $cdaReceipt->settle_amount ?? 0, 2) ?? '' }}
                                        </td>
                                        <td
                                            style="
                font-size: 14px;
                        line-height: 20px;
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
                font-size: 14px;
                        line-height: 20px;
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
                font-size: 14px;
                        line-height: 20px;
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
                font-size: 14px;
                        line-height: 20px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                border: 1px solid #000;
                height: 5px;
              ">
                 {{ $cdaReceipt->cda_bill_date ? date('d-m-Y', strtotime($cdaReceipt->cda_bill_date)) : '' }}
                                        </td>
                                        <td
                                            style="
                font-size: 14px;
                        line-height: 20px;
                font-weight: 400;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                border: 1px solid #000;
                height: 5px;
              ">
                                            {{ formatIndianCurrency($cdaReceipt->cda_bill_amount ?? 0 , 2)  }}

                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                            <tr>
                                <td
                                    style="
                      font-size: 14px;
                              line-height: 20px;
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
                      font-size: 14px;
                              line-height: 20px;
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
                      font-size: 14px;
                              line-height: 20px;
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
                      font-size: 14px;
                              line-height: 20px;
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
                      font-size: 14px;
                              line-height: 20px;
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
                      font-size: 14px;
                              line-height: 20px;
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
                font-size: 14px;
                        line-height: 20px;
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
          font-size: 14px;
                  line-height: 20px;
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
                font-size: 14px;
                        line-height: 20px;
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
                font-size: 14px;
                        line-height: 20px;
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
                font-size: 14px;
                        line-height: 20px;
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
                font-size: 14px;
                        line-height: 20px;
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
                font-size: 14px;
                        line-height: 20px;
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
                font-size: 14px;
                        line-height: 20px;
                font-weight: 400;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                border: 1px solid #000;
                height: 5px;
              ">
                                    {{ formatIndianCurrency($totalAmount ?? 0, 2) }}

                                </td>
                            </tr>

                        </tbody>
                    </table>
</body>

</html>
