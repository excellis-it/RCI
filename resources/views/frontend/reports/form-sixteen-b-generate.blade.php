
<!doctype html>
<html lang="en">
<title>RCI</title>
<meta charset="utf-8" />
<style>
    @page {
        margin: 10px;
        padding: 10px;
    }
     .page-break {
        page-break-before: always;
    }
</style>
<body style="background: #fff;">
     @foreach ($membersWithPayDetails as $customer_key => $item)
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff"
        style="border-radius: 0px; margin: 0 auto; text-align: center;">
        <tbody>
            <tr>
                <td style="padding:0 0px">
                    <table width="100%" border="" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                            <tr>
                                <td colspan="3"
                                    style="font-size: 14px; line-height: 18px; font-weight: 600; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border: 1px solid #000;">
                                    Form 16 (Part B)
                                    <span style="font-size: 12px; line-height: 14px; font-weight: 400; text-transform: lowercase;">[see rule 31 (1) (a)]</span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3"
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: 1px solid #000;">
                                   Certificate u/s 203 of the Income Tax Act, 1961 for TDS on Salary
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: 1px solid #000;">
                                    Name and Address of the Employer<br>
                                    <span style="font-weight: 400;">Director: CHESS, Vigyanakancha, Hyd-69</span>
                                </td>
                                <td colspan="2"
                                    style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: 1px solid #000;">
                                    Name and Designation of the Employee<br>
                                    <span style="font-weight: 400;">{{ $item->name?? '' }}, {{ $item->desigs->designation ?? '' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border: 1px solid #000;">
                                    Tan No:
                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000; border-right: none; border-top: 1px solid #000; border-bottom: 1px solid #000;">
                                    Pan <span style="font-weight: 400;">{{ $item->pan_no ?? '' }}</span>
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-right: 1px solid #000; border-left: none;
                                border-top: 1px solid #000; border-bottom: 1px solid #000;">
                                    Emp Id  <span style="font-weight: 400;">{{ $item->emp_id ?? '' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000; border-right: none; border-top: 1px solid #000; border-bottom: 1px solid #000;">
                                    Pan No:
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border-left: 1px solid #000;  border-right: none;
                                border-top: 1px solid #000;border-bottom: 1px solid #000;">
                                    Period<br>
                                    {{ $reportYear ?? '' }}
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;  border-right: 1px solid #000;
                                border-top: 1px solid #000; border-bottom: 1px solid #000;">
                                    Assessment Year<br>
                                    {{ $assessment_year ?? '' }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
               @php
                            //    dd($item['payDetails']);
                                // Initialize all credit fields to zero
                                $totalCredit = [
                                    'basic'     => 0, 'g_pay'     => 0, 's_pay'    => 0,
                                    'e_pay'     => 0, 'npsc'     => 0, 'add_incr'  => 0, 'var_incr' => 0,  'upsc_10' => 0,
                                    'da'        => 0, 'hra'       => 0, 'tpt'      => 0, 'da_tpt' => 0,
                                    'dis_alw'   => 0, 'misc'      => 0, 'ot'       => 0,
                                    'total'     => 0,
                                ];

                                // Initialize all debit fields to zero
                                $totalDebit = [
                                    'gpf'       => 0, 'nps'       => 0, 'cgegis'   => 0,  'ups' => 0,
                                    'cghs'      => 0, 'p_tax'      => 0, 'hba'      => 0,
                                    'pli'       => 0, 'lic'       => 0, 'eol'      => 0,
                                    'hdfc'      => 0, 'misc1'     => 0, 'i_tax'    => 0,
                                    'policy'    => 0, // if you have a policy total
                                ];
                                @endphp

                            @foreach ($item['payDetails'] as $key => $data)
                            @php
                                $formattedMonth = \Carbon\Carbon::createFromDate($data->year, $data->month, 1)->format('M-Y');
                                 // Loop once and accumulate

                                    // credit fields
                                    $totalCredit['basic']    += $data['basic']    ?? 0;
                                    $totalCredit['g_pay']    += $data['g_pay']    ?? 0;
                                    $totalCredit['s_pay']    += $data['s_pay']    ?? 0;
                                    $totalCredit['e_pay']    += $data['e_pay']    ?? 0;
                                      $totalCredit['npsc']    += $data['npsc']    ?? 0;
                                       $totalCredit['upsc_10'] += $data['upsc_10'] ?? 0;
                                    $totalCredit['add_incr'] += $data['add_incr'] ?? 0;
                                    $totalCredit['var_incr'] += $data['var_incr'] ?? 0;
                                    $totalCredit['da']       += $data['da']       ?? 0;
                                      $totalCredit['da_tpt']       += $data['da_tpt']       ?? 0;

                                    $totalCredit['hra']      += $data['hra']      ?? 0;
                                    $totalCredit['tpt']      += $data['tpt']      ?? 0;
                                    $totalCredit['dis_alw']  += $data['dis_alw']  ?? 0;
                                    $totalCredit['misc']     += $data['misc']     ?? 0;
                                    $totalCredit['ot']       += $data['ot']       ?? 0;

                                  $npsc = 0;
                                        $upsc_10 = 0;
                                        if ($item->memberCategory->fund_type == 'NPS') {
                                            $npsc = $data['npsc'] ?? 0;
                                        } elseif ($item->memberCategory->fund_type == 'UPS') {
                                            $upsc_10 = $data['upsc_10'] ?? 0;
                                        }

                                    $total_credit =
                                        ($data['basic']    ?? 0) +
                                        ($data['g_pay']    ?? 0) +
                                        ($data['s_pay']    ?? 0) +
                                        ($data['e_pay']    ?? 0) +
                                         $npsc +
                                            $upsc_10 +
                                        ($data['add_incr'] ?? 0) +
                                        ($data['var_incr'] ?? 0) +
                                        ($data['da']       ?? 0) +
                                          ($data['da_tpt']       ?? 0) +

                                        ($data['hra']      ?? 0) +
                                        ($data['tpt']      ?? 0) +
                                        ($data['dis_alw']  ?? 0) +
                                        ($data['misc']     ?? 0) +
                                        ($data['ot']       ?? 0);


                                    $totalCredit['total']    += $total_credit ?? 0;

                                    // debit fields (choose correct key for GPF vs NPS)
                                   if ($item->memberCategory->fund_type == 'NPS') {
                                            $totalDebit['nps'] += $data['nps'] ?? 0;
                                        } elseif ($item->memberCategory->fund_type == 'UPS') {
                                            $totalDebit['ups'] += $data['ups_10_per_rec'] ?? 0;
                                        } else {
                                            $totalDebit['gpf'] += $data['gpf'] ?? 0;
                                        }
                                    $totalDebit['cgegis'] += $data['cgeis'] ?? 0;
                                    $totalDebit['cghs']   += $data['cghs']   ?? 0;
                                    $totalDebit['p_tax']   += $data['p_tax']   ?? 0;
                                    $totalDebit['hba']    += $data['hba']    ?? 0;
                                    $totalDebit['pli']    += $data['pli']    ?? 0;
                                    $totalDebit['lic']    += $data['lic']    ?? 0;
                                    $totalDebit['eol']    += $data['eol']    ?? 0;
                                    $totalDebit['hdfc']   += $data['hdfc']   ?? 0;
                                    $totalDebit['misc1']  += $data['d_misc'] ?? 0;
                                    $totalDebit['i_tax']  += $data['i_tax']  ?? 0;
                                    // policy if needed:
                                    // $totalDebit['policy'] += $data['some_policy_key'] ?? 0;


                            @endphp
                            @endforeach
                            @php
                                      $arrear_total = 0;
                                        $total_update_allowance = 0;
                                    foreach ($item['arrears'] as $key => $arrear) {
                                        if ($arrear['name'] == 'Update Allw') {
                                                $total_update_allowance +=$arrear['amt'];
                                            }
                                        $arrear_total += $arrear['amt'];
                                    }

                                    $final_total =  round(($totalCredit['total'] ?? 0) + ($arrear_total ?? 0));

                                    $prerequisite172 = 0;
                                    $profits_in_lieu = 0;
                                    $tpt =0;
                                    $hra =0;
                                    $amt10a =0;
                                    $amt10b =0;
                                    $total_from_other_employer = 0;
                            @endphp
            <tr>
                <td style="padding:0 0px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                            <tr>
                                <td
                                    style="font-size: 14px; line-height: 18px; font-weight: 600; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border: none">
                                    Details of salary paid and any other income and tax deducted
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            @if (isset($item['savings']['it_rules']) && $item['savings']['it_rules'] == 1)
             <tr>
                <td style="padding:0 0px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: 1px solid #000; border-bottom: none; width: 50px;">
                                    1.
                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none; border-top: 1px solid #000; border-bottom: none;">
                                    Gross salary
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: 1px solid #000; border-bottom: none;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: 1px solid #000; border-bottom: none;">
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: 1px solid #000; border-bottom: none;">
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    (a) Salary as per pros ision contained in section 17(1)
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                   {{ $final_total ?? 0 }}
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    (b) Value of perquisites under section 17(2) (as per Form No.12BA. wherever applicable
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                     {{  $prerequisite172 ?? 0 }}
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    (c) Profits in lieu of salar■ under section 17(3) (as per Form No.12BA. wherever applicable


                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                    {{  $profits_in_lieu ?? 0 }}
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    (d) Total
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">

                                </td>

                                @php $gross_salary = ($final_total ?? 0) + $prerequisite172 ?? 0 + $profits_in_lieu ?? 0; @endphp
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                   {{ $final_total ?? 0 }}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    (e) Reported total amount of salary received from other employers
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                    {{ $total_from_other_employer ?? 0}}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                    2.
                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none; border-top: none; border-bottom: none;">
                                  Less: Allowances to the Extent Exempt Under Section 10
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    (a) Travel concession or assistance under section 10(5)/ Transport allowance (TPT)
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                    {{ 0 }}
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    (b) House Rent Allowance under section 10(13A)
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                    {{  0 }}
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    (c)	Professional Update Allowance
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                    {{0 }}
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    (d)	u/s 10(A), 10(B)
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                    {{ 0 }}
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    (e) Any Other exemption u/s 10
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                    {{ 0 }}
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                  border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                @php $total_exemption_10 =0; @endphp
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    (f) Total amount of exemption u/s 10
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                    {{ $total_exemption_10  ?? 0}}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                    3.
                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    Total Amount of Salary received from current employer [1(d) — 2(f)]
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">

                                </td>
                                @php
                                    $salary_current_employer = $gross_salary - $total_exemption_10;
                                @endphp
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                    {{ $salary_current_employer }}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                    4.
                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    Less: Deductions Under Section 16
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    (a)	Standard Deduction u/s 16(ia)
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                    @if (isset($item['savings']['it_rules']) && $item['savings']['it_rules'] == 1)
                                                   @php
                                                        $standard_deduction =75000;
                                                    @endphp
                                                    @else
                                                       @php
                                                        $standard_deduction = 50000;
                                                    @endphp

                                                @endif
                                                {{$standard_deduction}}
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  (b)Entertainment Allowance u/s 16(ii)
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                    {{  0}}
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    (c) Tax on Employment u/s l6(iii) (Profession Tax)
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                   {{  0}}
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                </td>
                            </tr>
                            <tr>
                                @php $total_deduction_16 = $standard_deduction  + (  0); @endphp
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                    5.
                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    Total Amount of Deductions Under Section 16 4|(a) to (c)]
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                   {{ $total_deduction_16 ?? 0 }}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                    6.
                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                   Income Chargeable Under the Head Salaries (3+1(e)-5)
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">

                                </td>
                                @php $income_chargeable = ($salary_current_employer + $total_from_other_employer) - $total_deduction_16; @endphp
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                    {{ $income_chargeable ?? 0 }}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                    7.
                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    Add: Any other income reported by the employee as per section 192 (2B)
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                   (a) Income ( or admissible loss) from House Property reported and Ofered for TDS
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">



                                  0
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                   (b) Income Under the Head Other Sources Offered for TDS
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">

                                   @php
                                        $total_income_other_sources = 0;
                                    @endphp
                                   {{ $total_income_other_sources ?? 0 }}
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                @php $total_from_other_employer = 0 + $total_income_other_sources; @endphp
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                    8.
                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                   Total Amount of Other Income Reported by the Employee (7(a) + 7(b))
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                   {{ $total_from_other_employer ?? 0}}
                                </td>
                            </tr>
                            <tr>
                                @php $gross_total_income = $income_chargeable + $total_from_other_employer; @endphp
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                    9.
                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                   Gross Total Income (6+ 8)
                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                  {{ $gross_total_income ?? 0}}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                    10.
                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    Deductions: Under Chapter VI-A
                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none; text-transform: uppercase;">
                                    Gross
                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">
                                    quilifying
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                    Deductable
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none; text-transform: uppercase;">
                                    Amount
                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">
                                    Amount
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                    Amount
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                   a) Contribution to Life Insurance Premium / Provident Fund etc u/s 80C
                                </td>
                               @php

                                       $total_80c_savings = 0;

                                    $eligible_80c_savings = min($total_80c_savings, 150000);
                                @endphp
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                 {{  $total_80c_savings ?? 0 }}

                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    b) Contributions to Certain Pension Funds u/s 80CCC
                                </td>
                                {{-- @php
                                    $total_80ccc = 0;
                                    foreach($member_it_exemption as $it_exemption)
                                    {
                                        if (preg_match('/\b80\s*c{3}\b/i', $it_exemption['section']))
                                        {
                                            $total_80ccc += $it_exemption['member_deduction'] ?? 0;
                                        }
                                    }
                                @endphp --}}
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  {{  $total_80ccc ?? 0 }}
                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  c) Contribution by Tax Payer to Pension Scheme u/s 80CCD(1)
                                </td>

                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    {{ 0 }}
                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                   d) Total Deduction u/s 80C, 80 CCC & 80 CCD(1)
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">

                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                {{-- @php $total_80c_deduction = $total_80c ?? 0 + $total_80ccc ?? 0 + $total_80ccd1 ?? 0; @endphp --}}
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                     {{ $eligible_80c_savings ?? 0 }}
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                   e) Amount Paid/Deposited u/s 80 CCD(IB)
                                </td>
                                {{-- @php
                                    $total_80ccd1b = 0;
                                    foreach($member_it_exemption as $it_exemption)
                                    {
                                        if (preg_match('/\b80\s*c{2}d\(1\)\b/i', $it_exemption['section']))
                                        {
                                            $total_80ccd1b += $it_exemption['member_deduction'] ?? 0;
                                        }
                                    }
                                @endphp --}}
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                 {{  0 }}
                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                {{  0 }}
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    f) Contribution by Employer to Pension Scheme u/s 80CCD(2)
                                </td>
                                @php
                                    $total_80ccd2 = 0;

                                @endphp
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  {{  $total_80ccd2 ?? 0 }}
                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                   {{  $total_80ccd2 ?? 0 }}
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  g) Health lnsurance Premia / Medical Insurance - u/s 80D
                                </td>

                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                               0

                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                   0
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                   h) Interest on Higher Education Loan - 80E
                                </td>
                                {{-- @php
                                    $total_80e = 0;
                                    foreach($member_it_exemption as $it_exemption)
                                    {
                                        if (preg_match('/\b80\s*e\b/i', $it_exemption['section']))
                                        {
                                            $total_80e += $it_exemption['member_deduction'] ?? 0;
                                        }
                                    }
                                @endphp --}}
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                     0
                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                 0
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                   i) Donations to Certen Funds / Charitable Institutions u/s 80G
                                </td>

                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                            0
                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                  0
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                   j) Interest on Deposits in savings Account u/s 8OTTA
                                </td>

                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                               0
                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                  0
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  k) Amount Deductable Under Any Other Provisions of Chapter VI-A
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">

                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                &nbsp;  &nbsp; i) Expenditure on Medical Treatment - u/s 80DDB
                                </td>


                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                0
                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                       0
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                &nbsp;  &nbsp; ii) Self/ Dependent Physically Handicapped - u/s 80DD
                                </td>


                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                0
                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                 0
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                &nbsp;  &nbsp; iii)  u/s 8ODDB
                                </td>


                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  0
                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                           0
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                &nbsp;  &nbsp; iv)  u/s 8OCCG
                                </td>

                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                               0
                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                   0
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>

                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                &nbsp;  I) Total Amount Deductable Under Any Other Provisions of Chapter VI-A
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">

                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                  0
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                {{-- @php
                                    $total_deduction = ($total_80c ?? 0 + $total_80ccc ?? 0 + $total_80ccd ?? 0 + $total_80cce ?? 0 + $total_80d ?? 0 + $total_80e ?? 0 + $total_80g ?? 0 + $total_80tta ?? 0 + $total_80ddb ?? 0 + $total_80dd ?? 0 + $total_80ccg ?? 0 + $other_deduction_via ?? 0) - $total_80c_deduction ?? 0; @endphp --}}
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                  11.
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  Aggregate of Deductable Amount under Chapter VI-A [10(a) to 10(I)]
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">

                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">

                                </td>
                                @php


                                    $total_deduction = 0;
                                    // dd( $eligible_80c_savings, $nsdl, $nsdl, $total_80ccd2, $medical_amount, $edu_loan_int, $donation, $deposit, $total);
                                @endphp


                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                   {{ $total_deduction ?? 0}}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                  12.
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  Total Taxable Income (9-11)
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">

                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">

                                </td>
                                @php
                                    $total_taxable_income = $gross_total_income - $total_deduction;
                                @endphp
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                  {{ $total_taxable_income ?? 0 }}
                                </td>
                            </tr>

                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                  13.
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  Tax on Total Income
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">

                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">

                                </td>
                                @php
                                 $taxable_income_rounded = round($total_taxable_income, -1);

                                            $income = (float) $taxable_income_rounded;
                                            $tax = 0;
                                            $surcharge = 0;

                                            if (isset($item['savings']['it_rules']) && $item['savings']['it_rules'] == 1) {
                                                // ✅ NEW REGIME
                                                if ($income <= 300000) {
                                                    $tax = 0;
                                                } elseif ($income <= 700000) {
                                                    $tax = ($income - 300000) * 0.05;
                                                } elseif ($income <= 1000000) {
                                                    $tax = 20000 + ($income - 700000) * 0.10;
                                                } elseif ($income <= 1200000) {
                                                    $tax = 50000 + ($income - 1000000) * 0.15;
                                                } elseif ($income <= 1500000) {
                                                    $tax = 80000 + ($income - 1200000) * 0.20;
                                                } else {
                                                    $tax = 140000 + ($income - 1500000) * 0.30;
                                                }

                                                // ✅ SURCHARGE - New Regime
                                                if ($income > 20000000) {
                                                    $surcharge = $tax * 0.25;
                                                } elseif ($income > 10000000) {
                                                    $surcharge = $tax * 0.15;
                                                } elseif ($income > 5000000) {
                                                    $surcharge = $tax * 0.10;
                                                }

                                            } else {
                                                // ✅ OLD REGIME
                                                if ($income <= 250000) {
                                                    $tax = 0;
                                                } elseif ($income <= 500000) {
                                                    $tax = ($income - 250000) * 0.05;
                                                } elseif ($income <= 1000000) {
                                                    $tax = 12500 + ($income - 500000) * 0.20;
                                                } else {
                                                    $tax = 112500 + ($income - 1000000) * 0.30;
                                                }

                                                // ✅ SURCHARGE - Old Regime
                                                if ($income > 50000000) {
                                                    $surcharge = $tax * 0.37;
                                                    } elseif ($income > 20000000) {
                                                        $surcharge = $tax * 0.25;
                                                    } elseif ($income > 10000000) {
                                                        $surcharge = $tax * 0.15;
                                                    } elseif ($income > 5000000) {
                                                        $surcharge = $tax * 0.10;
                                                    }
                                                }

                                                $total_income_tax_without_ecess = round($tax + $surcharge);
                                            @endphp
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                   {{ round($tax ?? 0)}}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                  14.
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  Rebate u/s 87A , if Applicable
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">

                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">

                                </td>
                                @php
                                    $total_87a = 0;

                                @endphp
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                   {{ $total_87a ?? 0}}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                  15.
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  Surcharge, Wherever Applicable
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">

                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                   {{ $surcharge ?? 0}}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                  16.
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  Health and Education Cess
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">

                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">

                                </td>
                                @php
                                    $cess = round($total_income_tax_without_ecess * 0.04);
                                    $total_tax_with_cess = $total_income_tax_without_ecess + $cess;
                                @endphp
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                  {{ $cess ??0  }}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                  17.
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  Tax Payable [ 13 + 15 + 16 - 14 ]
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">

                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">

                                </td>
                                @php
                                    $total_tax_payable = round(($tax + $surcharge + $cess) - $total_87a);
                                @endphp
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                   {{ $total_tax_payable ?? 0}}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                  18.
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  Less: Relief u/s 89 (Attach details)
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">

                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">

                                </td>

                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                   {{ 0}}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                  19.
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  TDS
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">

                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">

                                </td>

                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                     {{  $totalDebit['i_tax'] ?? 0}}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: 1px solid #000; width: 50px;">
                                  20.
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: 1px solid #000;">
                                  Net Tax Payable / Refundable (17-(18+19))
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: 1px solid #000;">

                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: 1px solid #000; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: 1px solid #000; text-transform: uppercase;">

                                </td>
                                @php
                                    $net_tax_payable = $total_tax_payable - ((0) + ( $totalDebit['i_tax'] ?? 0));
                                @endphp
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-bottom: 1px solid #000;">
                                   {{ $net_tax_payable ?? 0 }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            @else
             <tr>
                <td style="padding:0 0px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: 1px solid #000; border-bottom: none; width: 50px;">
                                    1.
                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none; border-top: 1px solid #000; border-bottom: none;">
                                    Gross salary
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: 1px solid #000; border-bottom: none;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: 1px solid #000; border-bottom: none;">
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: 1px solid #000; border-bottom: none;">
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    (a) Salary as per pros ision contained in section 17(1)
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                   {{ $final_total ?? 0 }}
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    (b) Value of perquisites under section 17(2) (as per Form No.12BA. wherever applicable
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                     {{  $prerequisite172 ?? 0 }}
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    (c) Profits in lieu of salar■ under section 17(3) (as per Form No.12BA. wherever applicable


                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                    {{  $profits_in_lieu ?? 0 }}
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    (d) Total
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">

                                </td>

                                @php $gross_salary = ($final_total ?? 0) + $prerequisite172 ?? 0 + $profits_in_lieu ?? 0; @endphp
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                   {{ $final_total ?? 0 }}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    (e) Reported total amount of salary received from other employers
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                    {{ $total_from_other_employer ?? 0}}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                    2.
                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none; border-top: none; border-bottom: none;">
                                  Less: Allowances to the Extent Exempt Under Section 10
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    (a) Travel concession or assistance under section 10(5)/ Transport allowance (TPT)
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                    {{  $tpt }}
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    (b) House Rent Allowance under section 10(13A)
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                    {{  $hra }}
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    (c)	Professional Update Allowance
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                    {{ $total_update_allowance ?? 0 }}
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    (d)	u/s 10(A), 10(B)
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                    {{ $amt10a + $amt10b }}
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    (e) Any Other exemption u/s 10
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                    {{ $item['savings']['cea']  ?? 0 }}
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                  border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                @php $total_exemption_10 =
                                    $tpt +
                                    $hra +
                                    $total_update_allowance +
                                    $amt10a + $amt10b +
                                    ($item['savings']['cea']  ?? 0) @endphp
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    (f) Total amount of exemption u/s 10
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                    {{ $total_exemption_10  ?? 0}}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                    3.
                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    Total Amount of Salary received from current employer [1(d) — 2(f)]
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">

                                </td>
                                @php
                                    $salary_current_employer = $gross_salary - $total_exemption_10;
                                @endphp
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                    {{ $salary_current_employer }}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                    4.
                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    Less: Deductions Under Section 16
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    (a)	Standard Deduction u/s 16(ia)
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                    @if (isset($item['savings']['it_rules']) && $item['savings']['it_rules'] == 1)
                                                   @php
                                                        $standard_deduction =75000;
                                                    @endphp
                                                    @else
                                                       @php
                                                        $standard_deduction = 50000;
                                                    @endphp

                                                @endif
                                                {{$standard_deduction}}
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  (b)Entertainment Allowance u/s 16(ii)
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                    {{  0}}
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    (c) Tax on Employment u/s l6(iii) (Profession Tax)
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                   {{ $totalDebit['p_tax'] ?? 0}}
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                </td>
                            </tr>
                            <tr>
                                @php $total_deduction_16 = $standard_deduction  + ( $totalDebit['p_tax'] ?? 0); @endphp
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                    5.
                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    Total Amount of Deductions Under Section 16 4|(a) to (c)]
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                   {{ $total_deduction_16 ?? 0 }}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                    6.
                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                   Income Chargeable Under the Head Salaries (3+1(e)-5)
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">

                                </td>
                                @php $income_chargeable = ($salary_current_employer + $total_from_other_employer) - $total_deduction_16; @endphp
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                    {{ $income_chargeable ?? 0 }}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                    7.
                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    Add: Any other income reported by the employee as per section 192 (2B)
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                   (a) Income ( or admissible loss) from House Property reported and Ofered for TDS
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">



                                    @php
                                          $hba_loan = ($item['savings']['hba_int']  ?? 0);
                                            $hba_int_80ee = $item['savings']['hba_int_80ee'] ?? 0;
                                            $hba_int = ($hba_int_80ee > 50000) ? 50000 : $hba_int_80ee;

                                            $hba_loan_amount = $hba_loan > 200000 ? 200000 : $hba_loan;

                                            $total_hba_amount_with_hba_inter_let = ($hba_loan_amount + $hba_int) - ( $item['savings']['letout']  ?? 0)

                                      @endphp
                                        -  {{ $total_hba_amount_with_hba_inter_let  ?? 0 }}
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                   (b) Income Under the Head Other Sources Offered for TDS
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">

                                   @php
                                        $total_income_other_sources =
                                            ($item['savings']['fd_int'] ?? 0) +
                                            ($item['savings']['nscint'] ?? 0) +
                                            ($item['savings']['pension'] ?? 0) +
                                            ($item['savings']['ac_int_80tta'] ?? 0);
                                    @endphp
                                   {{ $total_income_other_sources ?? 0 }}
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                @php $total_from_other_employer = - $total_hba_amount_with_hba_inter_let + $total_income_other_sources; @endphp
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                    8.
                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                   Total Amount of Other Income Reported by the Employee (7(a) + 7(b))
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                   {{ $total_from_other_employer ?? 0}}
                                </td>
                            </tr>
                            <tr>
                                @php $gross_total_income = $income_chargeable + $total_from_other_employer; @endphp
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                    9.
                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                   Gross Total Income (6+ 8)
                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                  {{ $gross_total_income ?? 0}}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                    10.
                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    Deductions: Under Chapter VI-A
                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none; text-transform: uppercase;">
                                    Gross
                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">
                                    quilifying
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                    Deductable
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td colspan="2" style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none; text-transform: uppercase;">
                                    Amount
                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">
                                    Amount
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                    Amount
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                   a) Contribution to Life Insurance Premium / Provident Fund etc u/s 80C
                                </td>
                               @php

                                       $total_80c_savings =
                                        ($item['savings']['ppf'] ?? 0) +
                                        ($item['savings']['bonds'] ?? 0) +
                                        ( $totalDebit[
                                            $item->memberCategory->fund_type == 'GPF' ? 'gpf' : ($item->memberCategory->fund_type == 'UPS' ? 'ups' : 'nps')
                                        ] ?? 0) +
                                        ($item['savings']['nsc_ctd'] ?? 0) +
                                        (round($totalDebit['cgegis'] ?? 0)) +
                                        ($item['savings']['hba_prncpl'] ?? 0) +
                                        ($item['savings']['pli'] ?? 0) +
                                        ($item['savings']['js_sukanya'] ?? 0) +
                                        (round($item['savings']['lic'] ?? 0)) +
                                        ($item['savings']['ulip'] ?? 0) +
                                        ($item['savings']['t_fee'] ?? 0) +
                                        ($item['savings']['others_s'] ?? 0);

                                    $eligible_80c_savings = min($total_80c_savings, 150000);
                                @endphp
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                 {{  $total_80c_savings ?? 0 }}

                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    b) Contributions to Certain Pension Funds u/s 80CCC
                                </td>
                                {{-- @php
                                    $total_80ccc = 0;
                                    foreach($member_it_exemption as $it_exemption)
                                    {
                                        if (preg_match('/\b80\s*c{3}\b/i', $it_exemption['section']))
                                        {
                                            $total_80ccc += $it_exemption['member_deduction'] ?? 0;
                                        }
                                    }
                                @endphp --}}
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  {{  $total_80ccc ?? 0 }}
                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  c) Contribution by Tax Payer to Pension Scheme u/s 80CCD(1)
                                </td>

                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    {{ $totalDebit[
                                            $item->memberCategory->fund_type == 'GPF' ? 'gpf' : ($item->memberCategory->fund_type == 'UPS' ? 'ups' : 'nps')
                                        ] ?? 0 }}
                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                   d) Total Deduction u/s 80C, 80 CCC & 80 CCD(1)
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">

                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                {{-- @php $total_80c_deduction = $total_80c ?? 0 + $total_80ccc ?? 0 + $total_80ccd1 ?? 0; @endphp --}}
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                     {{ $eligible_80c_savings ?? 0 }}
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                   e) Amount Paid/Deposited u/s 80 CCD(IB)
                                </td>
                                {{-- @php
                                    $total_80ccd1b = 0;
                                    foreach($member_it_exemption as $it_exemption)
                                    {
                                        if (preg_match('/\b80\s*c{2}d\(1\)\b/i', $it_exemption['section']))
                                        {
                                            $total_80ccd1b += $it_exemption['member_deduction'] ?? 0;
                                        }
                                    }
                                @endphp --}}
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                 {{ $item['savings']['nsdl']?? 0 }}
                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                {{ $item['savings']['nsdl']?? 0 }}
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    f) Contribution by Employer to Pension Scheme u/s 80CCD(2)
                                </td>
                                @php
                                    $total_80ccd2 = 0;

                                @endphp
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  {{  $total_80ccd2 ?? 0 }}
                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                   {{  $total_80ccd2 ?? 0 }}
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  g) Health lnsurance Premia / Medical Insurance - u/s 80D
                                </td>

                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                               @php
                                          $medical = ($totalDebit['cghs']  ?? 0) + ($item['savings']['med_ins']  ?? 0);
                                          if (isset($item['savings']['med_ins_80d']) && $item['savings']['med_ins_80d'] == 1) {
                                            $medical_amount = $medical > 50000 ? 50000 : $medical;
                                          } else {
                                            $medical_amount = $medical > 25000 ? 25000 : $medical;
                                          }
                                      @endphp
                                      {{$medical  ?? 0}}

                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                  {{ $medical_amount  ?? 0 }}
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                   h) Interest on Higher Education Loan - 80E
                                </td>
                                {{-- @php
                                    $total_80e = 0;
                                    foreach($member_it_exemption as $it_exemption)
                                    {
                                        if (preg_match('/\b80\s*e\b/i', $it_exemption['section']))
                                        {
                                            $total_80e += $it_exemption['member_deduction'] ?? 0;
                                        }
                                    }
                                @endphp --}}
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    {{ $item['savings']['edu_loan_int']  ?? 0 }}
                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                  {{ $item['savings']['edu_loan_int']  ?? 0 }}
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                   i) Donations to Certen Funds / Charitable Institutions u/s 80G
                                </td>
                                @php
                                                    $others_d = $item['savings']['others_d'] ?? 0;
                                                    $donation = ($others_d > 25000) ? 25000 : $others_d;
                                                @endphp


                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                              {{  $others_d ?? 0 }}
                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                  {{ $donation }}
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                   j) Interest on Deposits in savings Account u/s 8OTTA
                                </td>
                               @php
                                                    $ac_int_80tta = $item['savings']['ac_int_80tta'] ?? 0;
                                                    $deposit = ($ac_int_80tta > 10000) ? 10000 : $ac_int_80tta;
                                                @endphp

                                              
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                {{  $ac_int_80tta ?? 0 }}
                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                   {{  $deposit ?? 0 }}
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  k) Amount Deductable Under Any Other Provisions of Chapter VI-A
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">

                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                &nbsp;  &nbsp; i) Expenditure on Medical Treatment - u/s 80DDB
                                </td>
                                      @php
                                          $expenditure_medical = ($item['savings']['med_trt']  ?? 0);
                                          if (isset($item['savings']['med_tri_80dd_disability']) && $item['savings']['med_tri_80dd_disability'] == 1) {
                                            $expenditure_medical_amount = $expenditure_medical > 125000 ? 125000 : $expenditure_medical;
                                          } else {
                                            $expenditure_medical_amount = $expenditure_medical > 75000 ? 75000 : $expenditure_medical;
                                          }
                                      @endphp

                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  {{ $expenditure_medical ?? 0 }}
                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                         {{ $expenditure_medical_amount  ?? 0 }}
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                &nbsp;  &nbsp; ii) Self/ Dependent Physically Handicapped - u/s 80DD
                                </td>
                                          @php
                                          $handicaped = ($item['savings']['ph_disable']  ?? 0);
                                          if (isset($item['savings']['ph_disable_80u_disability']) && $item['savings']['ph_disable_80u_disability'] == 1) {
                                            $handicaped_amount = $handicaped > 125000 ? 125000 : $handicaped;
                                          } else {
                                            $handicaped_amount = $handicaped > 75000 ? 75000 : $handicaped;
                                          }
                                      @endphp

                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  {{  $handicaped ?? 0 }}
                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                    {{ $handicaped_amount  ?? 0 }}
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                &nbsp;  &nbsp; iii)  u/s 8ODDB
                                </td>
                                     @php
                                          $cancer = ($item['savings']['cancer_amount']  ?? 0);
                                          if (isset($item['savings']['cancer_80ddb_senior_dependent']) && $item['savings']['cancer_80ddb_senior_dependent'] == 1) {
                                            $cancer_amount = $cancer > 100000 ? 100000 : $cancer;
                                          } else {
                                            $cancer_amount = $cancer > 40000 ? 40000 : $cancer;
                                          }
                                      @endphp

                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  {{ $cancer ?? 0 }}
                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                            {{ $cancer_amount  ?? 0 }}
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                &nbsp;  &nbsp; iv)  u/s 8OCCG
                                </td>

                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                 {{ $item['savings']['equity_mf']  ?? 0 }}
                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                    {{ $item['savings']['equity_mf']  ?? 0 }}
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                                @php
                                $expenditure_medical_amount = $expenditure_medical_amount ?? 0;
                                $handicaped_amount = $handicaped_amount ?? 0;
                                $cancer_amount = $cancer_amount ?? 0;
                                $equity_mf = $item['savings']['equity_mf'] ?? 0;

                                $total = $expenditure_medical_amount + $handicaped_amount + $cancer_amount + $equity_mf;
                                @endphp
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                &nbsp;  I) Total Amount Deductable Under Any Other Provisions of Chapter VI-A
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">

                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                   {{ $total ?? 0 }}
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                {{-- @php
                                    $total_deduction = ($total_80c ?? 0 + $total_80ccc ?? 0 + $total_80ccd ?? 0 + $total_80cce ?? 0 + $total_80d ?? 0 + $total_80e ?? 0 + $total_80g ?? 0 + $total_80tta ?? 0 + $total_80ddb ?? 0 + $total_80dd ?? 0 + $total_80ccg ?? 0 + $other_deduction_via ?? 0) - $total_80c_deduction ?? 0; @endphp --}}
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                  11.
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  Aggregate of Deductable Amount under Chapter VI-A [10(a) to 10(I)]
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">

                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">

                                </td>
                                @php
                                    $eligible_80c_savings = $eligible_80c_savings ?? 0;
                                    $nsdl = $item['savings']['nsdl'] ?? 0;
                                    $total_80ccd2 = $total_80ccd2 ?? 0;
                                    $medical_amount = $medical_amount ?? 0;
                                    $edu_loan_int = $item['savings']['edu_loan_int'] ?? 0;
                                    $donation = $donation ?? 0;
                                    $deposit = $deposit ?? 0;
                                    $total = $total ?? 0;

                                    $total_deduction = $eligible_80c_savings + $nsdl  + $total_80ccd2 + $medical_amount + $edu_loan_int + $donation + $deposit + $total;
                                    // dd( $eligible_80c_savings, $nsdl, $nsdl, $total_80ccd2, $medical_amount, $edu_loan_int, $donation, $deposit, $total);
                                @endphp


                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                   {{ $total_deduction ?? 0}}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                  12.
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  Total Taxable Income (9-11)
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">

                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">

                                </td>
                                @php
                                    $total_taxable_income = $gross_total_income - $total_deduction;
                                @endphp
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                  {{ $total_taxable_income ?? 0 }}
                                </td>
                            </tr>

                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                  13.
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  Tax on Total Income
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">

                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">

                                </td>
                                @php
                                 $taxable_income_rounded = round($total_taxable_income, -1);

                                            $income = (float) $taxable_income_rounded;
                                            $tax = 0;
                                            $surcharge = 0;

                                            if (isset($item['savings']['it_rules']) && $item['savings']['it_rules'] == 1) {
                                                // ✅ NEW REGIME
                                                if ($income <= 300000) {
                                                    $tax = 0;
                                                } elseif ($income <= 700000) {
                                                    $tax = ($income - 300000) * 0.05;
                                                } elseif ($income <= 1000000) {
                                                    $tax = 20000 + ($income - 700000) * 0.10;
                                                } elseif ($income <= 1200000) {
                                                    $tax = 50000 + ($income - 1000000) * 0.15;
                                                } elseif ($income <= 1500000) {
                                                    $tax = 80000 + ($income - 1200000) * 0.20;
                                                } else {
                                                    $tax = 140000 + ($income - 1500000) * 0.30;
                                                }

                                                // ✅ SURCHARGE - New Regime
                                                if ($income > 20000000) {
                                                    $surcharge = $tax * 0.25;
                                                } elseif ($income > 10000000) {
                                                    $surcharge = $tax * 0.15;
                                                } elseif ($income > 5000000) {
                                                    $surcharge = $tax * 0.10;
                                                }

                                            } else {
                                                // ✅ OLD REGIME
                                                if ($income <= 250000) {
                                                    $tax = 0;
                                                } elseif ($income <= 500000) {
                                                    $tax = ($income - 250000) * 0.05;
                                                } elseif ($income <= 1000000) {
                                                    $tax = 12500 + ($income - 500000) * 0.20;
                                                } else {
                                                    $tax = 112500 + ($income - 1000000) * 0.30;
                                                }

                                                // ✅ SURCHARGE - Old Regime
                                                if ($income > 50000000) {
                                                    $surcharge = $tax * 0.37;
                                                    } elseif ($income > 20000000) {
                                                        $surcharge = $tax * 0.25;
                                                    } elseif ($income > 10000000) {
                                                        $surcharge = $tax * 0.15;
                                                    } elseif ($income > 5000000) {
                                                        $surcharge = $tax * 0.10;
                                                    }
                                                }

                                                $total_income_tax_without_ecess = round($tax + $surcharge);
                                            @endphp
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                   {{ $tax ?? 0}}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                  14.
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  Rebate u/s 87A , if Applicable
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">

                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">

                                </td>
                                @php
                                    $total_87a = 0;

                                @endphp
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                   {{ $total_87a ?? 0}}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                  15.
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  Surcharge, Wherever Applicable
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">

                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                   {{ $surcharge ?? 0}}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                  16.
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  Health and Education Cess
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">

                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">

                                </td>
                                @php
                                    $cess = round($total_income_tax_without_ecess * 0.04);
                                    $total_tax_with_cess = $total_income_tax_without_ecess + $cess;
                                @endphp
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                  {{ $cess ??0  }}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                  17.
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  Tax Payable [ 13 + 15 + 16 - 14 ]
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">

                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">

                                </td>
                                @php
                                    $total_tax_payable = ($tax + $surcharge + $cess) - $total_87a;
                                @endphp
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                   {{ $total_tax_payable ?? 0}}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                  18.
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  Less: Relief u/s 89 (Attach details)
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">

                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">

                                </td>

                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                   {{$item['savings']['sec_89'] ?? 0}}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                  19.
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  TDS
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">

                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">

                                </td>

                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                     {{  $totalDebit['i_tax'] ?? 0}}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: 1px solid #000; width: 50px;">
                                  20.
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: 1px solid #000;">
                                  Net Tax Payable / Refundable (17-(18+19))
                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: 1px solid #000;">

                                </td>
                                <td
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: 1px solid #000; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: 1px solid #000; text-transform: uppercase;">

                                </td>
                                @php
                                    $net_tax_payable = $total_tax_payable - (($item['savings']['sec_89'] ?? 0) + ( $totalDebit['i_tax'] ?? 0));
                                @endphp
                                <td style="font-size: 12px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-bottom: 1px solid #000;">
                                   {{ $net_tax_payable ?? 0 }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            @endif

            <tr>
                <td style="padding:0 0px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                            <tr>
                                <td colspan="2"
                                    style="font-size: 14px; line-height: 18px; font-weight: 600; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border: none; text-decoration: underline;">
                                    Verification
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"
                                    style="font-size: 12px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                   I, {{$accountant->user_name ?? '___________________________'}}, S/o  {{$accountant->so ?? '_______________________'}} working in the capacity of SAO-I do hereby certify that information given above is true, complete and correct and is based on the books of account, documents, TDS statements and other available records.
                                </td>
                            </tr>
                            <tr>
                                <td style="height: 20px;"></td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 12px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    Place: Kochi<br>
                                    Date: {{ \Carbon\Carbon::now()->format('d/m/Y') }}
                                </td>
                                <td style="font-size: 12px; line-height: 10px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                  (Signature of the person responsible for deduction of tax)<br>
                                  Full Name:  {{$accountant->user_name ?? ''}}<br>
                                  Designation: {{$accountant->designation->designation ?? ''}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
      @if (count($membersWithPayDetails) > 1)
    @if (!$loop->last)
        <div class="page-break"></div>
    @endif
    @endif
     @endforeach
</body>

</html>
