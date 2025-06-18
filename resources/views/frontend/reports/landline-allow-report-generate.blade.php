{{-- <!DOCTYPE html> --}}
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
    @foreach ($landlineData as $chunkKey => $chunk)
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff"
            style="border-radius: 0px; margin: 0 auto; text-align: center">
            <tbody>

                <tr>
                    <td style="padding: 0 0px">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                            <tbody>
                                <tr>

                                    <td colspan="11"
                                        style="text-align: center; border-left:0px;border-right:0px; ">
                                        <img style="width: 50px; height: 50px; margin: 0 auto; padding: 8px 5px; border:1px solid #ffffff;border-right:0px;border-left:0px;"
                                            border="0" src="{{ public_path('storage/' . $logo->logo) }}"
                                            alt="" />

                                    </td>

                                    <td colspan=""
                                        style="
                        font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px; border-right: none !important;border-left:0px;">
                                        <span style="text-transform: uppercase; border-bottom: 1px solid #000;">Page
                                            NO. {{ $chunkKey + 1 }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        style="
                      width: 50px;
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                      border: 1px solid #000;
                    ">
                                    </td>
                                    <td colspan="11"
                                        style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                      border: 1px solid #000;
                    ">
                                        CLAIM TOWARDS REIMBURSEMENT OF LANDLINE/MOBILE/BROAD-BAND
                                        BILLS OF SCIENTISTS OF CHESS, HYDERABAD - {{ $financial_year }}
                                    </td>
                                </tr>
                                <tr>
                                    <td rowspan="2"
                                        style="
                      font-size: 12px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                      border: 1px solid #000;
                    ">
                                        S.No.
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
                      text-transform: uppercase;
                      border: 1px solid #000;
                    ">
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
                      text-transform: uppercase;
                      border: 1px solid #000;
                    ">
                                    </td>
                                    <td colspan="4"
                                        style="
                      font-size: 12px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                      border: 1px solid #000;
                    ">
                                        Paid Amount Including Tax
                                    </td>
                                    {{-- <td colspan="2"
                                        style="
                      font-size: 12px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                      border: 1px solid #000;
                    ">
                                        Including Tax
                                    </td> --}}
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
                      border: 1px solid #000;
                    ">
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
                      text-transform: uppercase;
                      border: 1px solid #000;
                    ">
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
                      text-transform: uppercase;
                      border: 1px solid #000;
                    ">
                                    </td>
                                    <td colspan="2"
                                        style="
                      font-size: 12px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                      border: 1px solid #000;
                    ">
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
                      border: 1px solid #000;
                    ">
                                        Name & Designation Shril Smt/Ms.
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
                                        Month
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
                                        Landline
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
                                        Mobile
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
                                        Broad band*
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
                                        Total Amount
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
                                        Entitlement
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
                                        Amount Claimed
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
                                        Total Amount
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
                                        Landline Number
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
                                        Mobile Number
                                    </td>
                                </tr>
                                @php
                                    $count_member = 0;
                                    $grand_total = 0;
                                @endphp
                                @foreach ($chunk as $memberGroup)
                                    @php
                                        $total = 0;
                                        foreach ($memberGroup as $key => $record_check) {
                                            $total +=
                                                floatval($record_check->landline_amount ?? 0) +
                                                floatval($record_check->mobile_amount ?? 0) +
                                                floatval($record_check->broadband_amount ?? 0);
                                        }
                                        $grand_total += $total;
                                        $all_grand_total += $total;
                                    @endphp
                                    @foreach ($memberGroup as $key => $record)
                                        {{-- @dd($record) --}}
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
                                                @if ($key == 0)
                                                    {{ $count_member + 1 }}
                                                @endif

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
                                                @if ($key == 0)
                                                    {{ $record->member->name ?? '' }} (
                                                    {{ $record->member->desigs->designation ?? '' }})
                                                @endif
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

                                                {{ $record->month ? date('F', mktime(0, 0, 0, $record->month, 10)) : '' }}-{{ $record->year }}
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
                                                {{ $record->landline_amount ?? '0.00' }}
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
                                                {{ $record->mobile_amount ?? '0.00' }}
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
                                                {{ $record->broadband_amount ?? '0.00' }}
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
                                                {{ number_format(
                                                    floatval($record->landline_amount ?? 0) +
                                                        floatval($record->mobile_amount ?? 0) +
                                                        floatval($record->broadband_amount ?? 0),
                                                    2,
                                                ) }}

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
                                                {{ $record->entitle_amount ?? '0.00' }}
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
                                                {{ number_format(
                                                    floatval($record->landline_amount ?? 0) +
                                                        floatval($record->mobile_amount ?? 0) +
                                                        floatval($record->broadband_amount ?? 0),
                                                    2,
                                                ) }}

                                            </td>
                                            @if ($key == 0)
                                                <td rowspan="{{ count($memberGroup) }}"
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
                                                    {{ $total }}
                                                </td>
                                            @endif
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
                                                {{-- @dd($record->member) --}}
                                                @if ($key == 0)
                                                    {{ $record->member->memberPersonalInfo->landline_no ?? '' }}
                                                @endif
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
                                                @if ($key == 0)
                                                    {{ $record->member->memberPersonalInfo->mobile_no ?? '' }}
                                                @endif
                                            </td>
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
                                    <td colspan="8"
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
                  NO.CHESS/FIN/MISCC/Tele@/{{$financial_year ?? ''}},
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
                 Date: {{date('M, Y')}}
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
                   In exercise of the powers vested vide Si.no.5.1 of schedule of Financial Powers delegated to Director's of Laboratories Issued under Government
 of India, Ministry of Defence Lr. No. <strong>DRDO/DFMM/PL/83226/M/01/1976/D(R&D)dATED:18/12/2019,</strong>
sanction is hereby conveyed for Rs.<strong>{{$all_grand_total ? number_format($all_grand_total) : 0}}/-</strong>  (Rupees {{ ucwords(str_replace('-', ' ',(\NumberFormatter::create('en_IN', \NumberFormatter::SPELLOUT)->format($all_grand_total)))) }} Only) towards reimbursement of Telephone
call charges of Residential Telephone/ Mobile Phone/ Broad band/ Mobile Date / Data card in respect of
the officers as per Annexure -1
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
                    The Expenditure is Debitable to <strong>Major Head 2080, Minor Head - 800, Sub Head 858/01</strong> Miscellaneousfor the Financial Year {{$financial_year ?? ''}}.
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
                    Authority: F.No. 24(3)/E Card/2018, Dated 26<sup>th</sup> March 20218
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
                SANCTIONED /NOT SANCTIONED
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
</body>

</html>
