<!DOCTYPE html>
<html lang="en">
  <title>RCI</title>
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
    @foreach ($bagPurseData as $chunkKey => $member_purse_allowances)
    <table
      width="100%"
      border="0"
      cellpadding="0"
      cellspacing="0"
      bgcolor="#ffffff"
      style="border-radius: 0px; margin: 0 auto"
    >
      <tbody>
        <tr>
          <td style="padding: 0 0px">
            <table
              width="100%"
              border="0"
              cellpadding="0"
              cellspacing="0"
              align="center"
            >
              <tbody>
                  <tr>

                                    <td colspan="8"
                                        style="text-align: center; border-left:0px;border-right:0px; ">
                                        <img style="width: 50px; height: 50px; margin: 0 auto; padding: 8px 5px; border:1px solid #ffffff;border-right:0px;border-left:0px;"
                                            border="0" src="{{ public_path('storage/' . $logo->logo) }}"
                                            alt="" />

                                    </td>

                                    <td
                                        style="
                        font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px; border-right: none !important;border-left:0px;">
                                        <span style="text-transform: uppercase; border-bottom: 1px solid #000;">Page
                                            NO. {{ $chunkKey + 1 }}</span>
                                    </td>
                                </tr>
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

                    "
                  >
                    Details of reimbursement of expendenture for perches of
                    Briefcase, official Bag / Ladies for official use  - {{ $financial_year }}
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <tr>
          <td style="height: 20px"></td>
        </tr>
        <tr>
          <td style="padding: 0 0px">
            <table
              width="100%"
              border="0"
              cellpadding="0"
              cellspacing="0"
              align="center"
            >
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
                      border: 1px solid #000;
                      text-transform: uppercase;
                    "
                  >
                    SN.
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
                      border: 1px solid #000;
                      text-transform: uppercase;
                    "
                  >
                    Name
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
                      border: 1px solid #000;
                      text-transform: uppercase;
                    "
                  >
                    GPF/NPS No.
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
                      border: 1px solid #000;
                      text-transform: uppercase;
                    "
                  >
                    Designation
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
                      border: 1px solid #000;
                      text-transform: uppercase;
                    "
                  >
                    Pay Matrix Level
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
                      border: 1px solid #000;
                      text-transform: uppercase;
                    "
                  >
                    Entittled Amount
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
                      border: 1px solid #000;
                      text-transform: uppercase;
                    "
                  >
                    Bill Amount
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
                      border: 1px solid #000;
                      text-transform: uppercase;
                    "
                  >
                    Net Amount to Disbursed
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
                      border: 1px solid #000;
                      text-transform: uppercase;
                    "
                  >
                    Remarks
                  </th>
                </tr>
              </thead>
              <tbody>
                  @php
                                    $count_member = 0;
                                    $grand_total = 0;
                                @endphp
                @foreach($member_purse_allowances as $chunk_data)

                  @foreach ($chunk_data as $key => $member_purse_allowance)
                  @php
                    $total =
                                                floatval($member_purse_allowance->net_amount ?? 0) ;
                      $grand_total += $total;
                                        $all_grand_total += $total;
                  @endphp
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
                      height: 10px;
                    "
                  >
                    {{ $count_member +1 }}
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
                      height: 10px;
                    "
                  >{{$member_purse_allowance->member->name ?? ''}}</td>
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
                      height: 10px;
                    "
                  >{{ $member_purse_allowance->member->pran_number ?? $member_purse_allowance->member->gpf_number ?? '' }}</td>
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
                      height: 10px;
                    "
                  >  {{ $member_purse_allowance->member->desigs->designation ?? '' }}</td>
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
                      height: 10px;
                    "
                  >{{$member_purse_allowance->payLevels->value ?? ''}}</td>
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
                      height: 10px;
                    "
                  >{{ $member_purse_allowance->entitle_amount ?? 0}}</td>
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
                      height: 10px;
                    "
                  >{{ $member_purse_allowance->bill_amount ?? 0}}</td>
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
                      height: 10px;
                    "
                  >{{ $member_purse_allowance->net_amount ?? 0}}</td>
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
                      height: 10px;
                    "
                  >{{ $member_purse_allowance->remarks ?? ''}}</td>
                </tr>

                @endforeach
                  @php
                                        $count_member++;
                                    @endphp
                @endforeach
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
                      border: 1px solid #000;
                    ">


                                    </td>
                                    <td colspan="6"
                                        style="

                      font-size: 12px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;

                    ">
                                        <b>GRAND TOTAL : (Rupees
                                            {{ ucwords(str_replace('-', ' ', \NumberFormatter::create('en_IN', \NumberFormatter::SPELLOUT)->format($grand_total))) }}
                                            Only) </b>
                                    </td>

                                    <td
                                        style="
                      font-size: 12px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;

                    ">
                                        {{ $grand_total }}

                                    </td>
                                    <td
                                        style="
                      font-size: 12px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;

                    ">
                                    </td>


                                </tr>

              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>
        <div class="page-break"></div>
      @endforeach
      <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff"
  style="border-radius: 0px; margin: 0 auto; text-align: center">
  <tbody>
    <tr>
      <td style="padding: 0 0px">
        <img src="{{ public_path('storage/' . $logo->logo) }}" alt="Logo" style="width: 100px; height: auto;">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
          <tbody>
            <tr>





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
                font-weight: bold;
                color: #000;
                text-align: left;
                padding: 0px 5px 0px 5px !important;
                margin-top: 50px !important;
              ">
                To,
              </td>
              <td style="
                font-size: 16px;
                line-height: 14px;
                font-weight: bold;
                color: #000;
                text-align: right;
                padding: 5px 5px 0px 5px!important;
                margin-top: 50px !important;
              ">
                Date: {{date('d/m/Y')}}
              </td>
            </tr>
            <tr>
              <td style="
                font-size: 16px;
                line-height: 14px;
                font-weight: bold;
                color: #000;
                text-align: left;
                padding: 5px 5px 0px 5px !important;
              ">
                The PCDA (R&amp;D),
              </td>
            </tr>
            <tr>
              <td style="
                font-size: 16px;
                line-height: 14px;
                font-weight: bold;
                color: #000;
                text-align: left;
                padding: 5px 5px 0px 5px !important;
              ">
                Kanchanbagh,
              </td>
            </tr>
            <tr>
              <td style="
                font-size: 16px;
                line-height: 14px;
                font-weight: bold;
                color: #000;
                text-align: left;
                padding: 5px 5px 0px 5px !important;
              ">
                Hyderabad.
              </td>
            </tr>






            <tr>
              <td style="
                font-size: 16px;
                line-height: 14px;
                font-weight: bold;
                color: #000;
                text-align: center;
                padding: 20px 5px 0px 5px!important;
                margin-top: 20px !important;
                height: 50px;
              ">
                Sub: Reimbursement of Office Bags
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
                    text-indent: 50px;
                  ">
                Please find enclosed the following Misc Bill along with supporting documents for audit payment please.
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
                S No
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
                Bill No
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
                Date
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
                Amount
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="
                font-size: 16px;
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
                1
              </td>
              <td style="
                font-size: 16px;
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
                CHESS/FIN/MISC/BAGS/{{$financial_year ?? ''}}/
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
                {{date('d/m/Y')}}
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
                {{ $grand_total }}/-
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
                    font-size: 16px;
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
                    font-size: 16px;
                    line-height: 20px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 10px 5px !important;
                    margin: 0px 0px !important;
                    vertical-align: top;
                  ">
                Expenditure on account of the above may please be debited to Major Head-2080, Minor Head-800 Code
                Head-858/01 of CHESS for the Financial year {{$financial_year ?? ''}}.
              </td>
            </tr>

            <tr>
              <td style="
                    font-size: 16px;
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
                    font-size: 16px;
                    line-height: 20px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 10px 5px !important;
                    margin: 0px 0px !important;
                    vertical-align: top;
                  ">
                Cheque may please be issued in favour of <strong>Director CHESS</strong> by crediting into PF A/C 32924542255 under
                intimation to Director, CHESS.
              </td>
            </tr>
            <tr>
              <td style="
                    font-size: 16px;
                    line-height: 20px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 10px 5px !important;
                    margin: 0px 0px !important;
                    vertical-align: top;
                  ">
                4.
              </td>
              <td style="
                    font-size: 16px;
                    line-height: 20px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 10px 5px !important;
                    margin: 0px 0px !important;
                    vertical-align: top;
                  ">
                It is requested to audit the bill and pass the amount at the earliest pls.
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
                Encl : As above
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
                ({{$senior_account_manager_name}})<br>
                Sr. Accounts Officer <br>
                For Director, CHESS
              </td>
            </tr>

          </tbody>
        </table>
      </td>
    </tr>
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
              <td colspan="9" style="
                font-size: 25px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
              ">
                SANCTION ORDER
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
                font-weight: bold;
                color: #000;
                text-align: left;
                padding: 20px 5px 0px 5px !important;
                margin-top: 50px !important;
                height: 100px;

              ">
                  NO.CHESS/FIN/MISC/BAGS/{{$financial_year ?? ''}}/
                </td>
                <td style="
                font-size: 16px;
                line-height: 14px;
                font-weight: bold;
                color: #000;
                text-align: right;
                padding: 20px 5px 0px 5px!important;
                margin-top: 50px !important;
                height: 100px;
              ">
                 Date: {{date('d/m/Y')}}
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
                    text-indent: 50px;
                  ">
                   Sanction is here by accorded for Rs.<strong>{{$all_grand_total ? formatIndianCurrency($all_grand_total) : 0}}/-</strong>  (Rupees {{ ucwords(str_replace('-', ' ',(\NumberFormatter::create('en_IN', \NumberFormatter::SPELLOUT)->format($all_grand_total)))) }} Only) towards reimbursement of expenditure incurred for purchase of Brief case/ Official Bag/ Ladies Purse in respect of Three Officers/Staff as per appendix A.

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
                  <td style="
                    font-size: 16px;
                    line-height: 20px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 20px 5px !important;
                    margin: 0px 0px !important;
                    vertical-align: top;

                  ">
                    2.
                  </td>
                  <td style="
                    font-size: 16px;
                    line-height: 20px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 20px 5px !important;
                    margin: 0px 0px !important;
                    vertical-align: top;
                  ">
                  The Expenditure is debitable to Major Head-2080 Minor Head-800, Sub Head: Misc for the Financial Year
                 {{$financial_year ?? ''}}.
                  </td>
                </tr>

                <tr>
                  <td style="
                    font-size: 16px;
                    line-height: 20px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 20px 5px !important;
                    margin: 0px 0px !important;
                    vertical-align: top;
                  ">
                    3.
                  </td>
                  <td style="
                    font-size: 16px;
                    line-height: 20px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 20px 5px !important;
                    margin: 0px 0px !important;
                    vertical-align: top;
                  ">
                    Authority: HQrs. Letter No. DRDO/DMS/04/4576/M/01/1720/DR&D, dated 28.08.2017
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>

              <tr>
              <td colspan="9" style="
                font-size: 20px;
                line-height: 30px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 50px 5px 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
              ">
                SANCTIONED/NOT SANCTIONED
                </td>
              </tr>


                            <tr>
              <td colspan="9" style="
                font-size: 20px;
                line-height: 30px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 50px 5px 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
              ">
                ({{$director_name ?? '-'}})<br />DS & Director
                </td>
              </tr>



 <tr>
                <td style="
                font-size: 16px;
                line-height: 20px;
                font-weight: normal;
                color: #000;
                text-align: left;
                padding: 50px 5px !important;
                margin-top: 50px !important;
                height: 100px;

              ">
                  NO.CHESS/FIN/MISC/Tele@/{{$financial_year ?? ''}}<br />Government of India<br />
Ministry of Defence<br />
CENTER FOR HIGH ENERGY SYSTEMS & SCIENCES(CHESS)<br />
RCI, HYDRABAD-500 069
                </td>
                <td style="
                font-size: 16px;
                line-height: 14px;
                font-weight: bold;
                color: #000;
                text-align: right;
                padding: 50px 5px !important;
                margin-top: 50px !important;
                height: 100px;
              ">

                </td>

              </tr>


    </tbody>
  </table>
  <div class="page-break">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff"
    style="border-radius: 0px; margin: 0 auto; text-align: center">
    <tbody>
      <tr>
        <td style="padding: 0 0px">
          <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
            <tbody>
            <tr>
              <td colspan="9">
                {{-- <img src="" alt="Logo" style="width: 100px; height: auto;"> --}}
                </td>
              </tr>
              <tr>
              <td colspan="9" style="
                font-size: 25px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                text-decoration: underline;
              ">
                NOTE
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
                font-weight: bold;
                color: #000;
                text-align: left;
                padding: 20px 5px 0px 5px !important;
                margin-top: 50px !important;
                height: 50px;

              ">
                  NO.CHESS/FIN/MISC/BAGS/{{$financial_year ?? ''}}/
                </td>
                <td style="
                font-size: 16px;
                line-height: 14px;
                font-weight: bold;
                color: #000;
                text-align: right;
                padding: 20px 5px 0px 5px!important;
                margin-top: 50px !important;
                height: 50px;
              ">
                 Date: {{date('d/m/Y')}}
                </td>

              </tr>
              <tr>
                <td style="
                font-size: 16px;
                line-height: 14px;
                font-weight: bold;
                color: #000;
                text-align: center;
                padding: 20px 5px 0px 5px!important;
                margin-top: 20px !important;
                height: 50px;
              ">
                Sub: Reimbursement of Brief Case/Official Bags/Ladies Purses
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
                    text-indent: 50px;
                  ">
                   Placed opposite is a sanction order for<strong> {{$all_grand_total ? formatIndianCurrency($all_grand_total) : 0}}/-</strong>  (Rupees {{ ucwords(str_replace('-', ' ',(\NumberFormatter::create('en_IN', \NumberFormatter::SPELLOUT)->format($all_grand_total)))) }} Only) towards reimbursement of Brief Case/Official Bags/Ladies Purses in respect of Three Officers/Staffs as per appendix ‘A’.
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
                    font-size: 16px;
                    line-height: 20px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 10px 5px !important;
                    margin: 0px 0px !important;
                    vertical-align: top;

                  ">
                    1.
                  </td>
                  <td style="
                    font-size: 16px;
                    line-height: 20px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 10px 5px !important;
                    margin: 0px 0px !important;
                    vertical-align: top;
                  ">
                    Director is requested to sign the sanction order please.
                  </td>
                </tr>

                <tr>
                  <td style="
                    font-size: 16px;
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
                    font-size: 16px;
                    line-height: 20px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 10px 5px !important;
                    margin: 0px 0px !important;
                    vertical-align: top;
                  ">
                    Put up for Director’s Signature.
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>

              <tr>
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
                ({{$senior_account_manager_name ?? '-'}})<br>
                Sr. Accounts Officer Gde-I
                </td>
              </tr>


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
                DCMM
                </td>
              </tr>
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
               Associate Director
                </td>
              </tr>

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
                Director
                </td>
              </tr>





    </tbody>
  </table>
  </div>
  </body>
</html>
