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
        <center>
            <img src="{{ public_path('storage/' . $logo->logo) }}" style="max-width: 50px;">
        </center>
        <br>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff"
            style="border-radius: 0px; margin: 0 auto; text-align: center;">
            <tbody>
                <tr>
                    <td style="padding:0 0px">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                            <tbody>
                                <tr>
                                    <td
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: center; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        Centre for High Energy Systems Sciences, Hyderabad<br>
                                        <span style="text-decoration: uppercase; font-weight: 400;">PAY & ALLOWANCES AND
                                            STATEMENT SHOWING
                                            INCOME TAX CALCULATION FOR THE YEAR {{ $report_year }}</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding:0 0px">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                            <tbody>
                                <tr>
                                    <td
                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000;">
                                        PC No: <span
                                            style="font-weight:600!important;">{{ $item->pers_no ?? '' }}</span>
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important;
                                margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000;">
                                        EMP-ID:
                                        <span style="font-weight:600!important;">{{ $item->emp_id ?? '' }}</span>
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important;
                              margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000;">
                                        PAN NO: <span
                                            style="font-weight:600!important;">{{ $item->pan_no ?? '' }}</span>
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important;
                                margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000;">
                                        Name & Designation: <span
                                            style="font-weight:600!important;">{{ $item->name }},{{ $item->desigs->designation ?? '' }}
                                        </span>
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important;
                                  margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000;">
                                        Pay Bill Sl No: {{ $customer_key + 1 }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding:0 0px">


                        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                            <thead>
                                <tr>
                                    <th
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                              margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                        Month</th>
                                    <th
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                              margin: 0px 0px !important;border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                        B PAY</th>
                                    <th
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                              margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                        G Pay</th>
                                    <th
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                              margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                        S PAY</th>
                                    <th
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                              margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                        F PAY</th>
                                    @if ($item->memberCategory->fund_type == 'NPS')
                                        <th
                                            style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                              margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                            NPSC</th>
                                    @endif

                                    @if ($item->memberCategory->fund_type == 'UPS')
                                        <th
                                            style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                              margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                            UPSC</th>
                                    @endif

                                    <th
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                              margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                        2 Incr</th>

                                    <th
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                              margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                        V Incr
                                    </th>
                                    <th
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                        margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                        DA
                                    </th>
                                    <th
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
            margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                        TPT</th>
                                    <th
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                        margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                        DA TPT
                                    </th>
                                    <th
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                  margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                        HRA</th>

                                    <th
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
      margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                        WASH</th>
                                    <th
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                              margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                        MISC
                                    </th>
                                    <th
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                        margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                        OT
                                    </th>
                                    <th
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                  margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                        TOTAL
                                    </th>
                                    <th
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
            margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                        @if ($item->memberCategory->fund_type == 'NPS')
                                            NPS
                                        @elseif($item->memberCategory->fund_type == 'UPS')
                                            UPS
                                        @else
                                            GPF
                                        @endif
                                    </th>
                                    <th
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
      margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                        CGEGIS
                                    </th>
                                    <th
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                              margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                        CGHS
                                    </th>
                                    <th
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                        margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                        P TAX
                                    </th>
                                    <th
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                  margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                        HBA
                                    </th>
                                    <th
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
            margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                        PLI
                                    </th>
                                    <th
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
      margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                        LIC
                                    </th>
                                    <th
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                              margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                        EOL
                                    </th>
                                    <th
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                        margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                        HDFC
                                    </th>
                                    <th
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                  margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                        MISC
                                    </th>
                                    <th
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
            margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                        I TAX
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    //    dd($item['payDetails']);
                                    // Initialize all credit fields to zero
                                    $totalCredit = [
                                        'basic' => 0,
                                        'g_pay' => 0,
                                        's_pay' => 0,
                                        'e_pay' => 0,
                                        'npsc' => 0,
                                        'upsc_10' => 0,
                                        'add_incr' => 0,
                                        'var_incr' => 0,
                                        'da' => 0,
                                        'hra' => 0,
                                        'tpt' => 0,
                                        'da_tpt' => 0,
                                        'dis_alw' => 0,
                                        'misc' => 0,
                                        'ot' => 0,
                                        'total' => 0,
                                    ];

                                    // Initialize all debit fields to zero
                                    $totalDebit = [
                                        'gpf' => 0,
                                        'nps' => 0,
                                        'ups' => 0,
                                        'cgegis' => 0,
                                        'cghs' => 0,
                                        'p_tax' => 0,
                                        'hba' => 0,
                                        'pli' => 0,
                                        'lic' => 0,
                                        'eol' => 0,
                                        'hdfc' => 0,
                                        'misc1' => 0,
                                        'i_tax' => 0,
                                        'policy' => 0, // if you have a policy total
                                    ];
                                @endphp

                                @foreach ($item['payDetails'] as $key => $data)
                                    @php
                                        $formattedMonth = \Carbon\Carbon::createFromDate(
                                            $data->year,
                                            $data->month,
                                            1,
                                        )->format('M-Y');
                                        // Loop once and accumulate

                                        // credit fields
                                        $totalCredit['basic'] += $data['basic'] ?? 0;
                                        $totalCredit['g_pay'] += $data['g_pay'] ?? 0;
                                        $totalCredit['s_pay'] += $data['s_pay'] ?? 0;
                                        $totalCredit['e_pay'] += $data['e_pay'] ?? 0;
                                        $totalCredit['npsc'] += $data['npsc'] ?? 0;
                                        $totalCredit['upsc_10'] += $data['upsc_10'] ?? 0;
                                        $totalCredit['add_incr'] += $data['add_incr'] ?? 0;
                                        $totalCredit['var_incr'] += $data['var_incr'] ?? 0;
                                        $totalCredit['da'] += $data['da'] ?? 0;
                                        $totalCredit['da_tpt'] += $data['da_tpt'] ?? 0;

                                        $totalCredit['hra'] += $data['hra'] ?? 0;
                                        $totalCredit['tpt'] += $data['tpt'] ?? 0;
                                        $totalCredit['dis_alw'] += $data['dis_alw'] ?? 0;
                                        $totalCredit['misc'] += $data['misc'] ?? 0;
                                        $totalCredit['ot'] += $data['ot'] ?? 0;

                                        $npsc = 0;
                                        $upsc_10 = 0;
                                        if ($item->memberCategory->fund_type == 'NPS') {
                                            $npsc = $data['npsc'] ?? 0;
                                        } elseif ($item->memberCategory->fund_type == 'UPS') {
                                            $upsc_10 = $data['upsc_10'] ?? 0;
                                        }

                                        $total_credit =
                                            ($data['basic'] ?? 0) +
                                            ($data['g_pay'] ?? 0) +
                                            ($data['s_pay'] ?? 0) +
                                            ($data['e_pay'] ?? 0) +
                                            $npsc +
                                            $upsc_10 +
                                            ($data['add_incr'] ?? 0) +
                                            ($data['var_incr'] ?? 0) +
                                            ($data['da'] ?? 0) +
                                            ($data['da_tpt'] ?? 0) +
                                            ($data['hra'] ?? 0) +
                                            ($data['tpt'] ?? 0) +
                                            ($data['dis_alw'] ?? 0) +
                                            ($data['misc'] ?? 0) +
                                            ($data['ot'] ?? 0);

                                        $totalCredit['total'] += $total_credit ?? 0;

                                        // debit fields (choose correct key for GPF vs NPS)
                                        if ($item->memberCategory->fund_type == 'NPS') {
                                            $totalDebit['nps'] += $data['nps'] ?? 0;
                                        } elseif ($item->memberCategory->fund_type == 'UPS') {
                                            $totalDebit['ups'] += $data['ups_10_per_rec'] ?? 0;
                                        } else {
                                            $totalDebit['gpf'] += $data['gpf'] ?? 0;
                                        }
                                        $totalDebit['cgegis'] += $data['cgeis'] ?? 0;
                                        $totalDebit['cghs'] += $data['cghs'] ?? 0;
                                        $totalDebit['p_tax'] += $data['p_tax'] ?? 0;
                                        $totalDebit['hba'] += $data['hba'] ?? 0;
                                        $totalDebit['pli'] += $data['pli'] ?? 0;
                                        $totalDebit['lic'] += $data['lic'] ?? 0;
                                        $totalDebit['eol'] += $data['eol'] ?? 0;
                                        $totalDebit['hdfc'] += $data['hdfc'] ?? 0;
                                        $totalDebit['misc1'] += $data['d_misc'] ?? 0;
                                        $totalDebit['i_tax'] += $data['i_tax'] ?? 0;
                                        // policy if needed:
                                        // $totalDebit['policy'] += $data['some_policy_key'] ?? 0;
                                    @endphp
                                    <tr>

                                        <td
                                            style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                            margin: 0px 0px !important; border-bottom: 1px solid #000;">

                                            {{ $formattedMonth }}

                                        </td>
                                        <td
                                            style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                        margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                            {{ round($data['basic']) ?? 0 }}
                                        </td>
                                        <td
                                            style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                            margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                            {{ round($data['g_pay']) ?? 0 }}
                                        </td>
                                        <td
                                            style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                        margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                            {{ $data['s_pay'] ?? 0 }}
                                        </td>

                                        <td
                                            style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                        margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                            {{ round($data['e_pay']) ?? 0 }}
                                        </td>

                                        @if ($item->memberCategory->fund_type == 'NPS')
                                            <td
                                                style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                        margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                                {{ round($data['npsc']) ?? 0 }}
                                            </td>
                                        @endif
                                        @if ($item->memberCategory->fund_type == 'UPS')
                                            <td
                                                style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                        margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                                {{ round($data['upsc_10']) ?? 0 }}
                                            </td>
                                        @endif
                                        <td
                                            style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                            margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                            {{ round($data['add_incr']) ?? 0 }}
                                        </td>
                                        <td
                                            style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                        margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                            {{ round($data['var_incr']) ?? 0 }}
                                        </td>
                                        <td
                                            style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                            margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                            {{ round($data['da']) ?? 0 }}
                                        </td>
                                        <td
                                            style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                        margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                            {{ round($data['tpt']) ?? 0 }}
                                        </td>
                                        <td
                                            style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                            margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                            {{ round($data['da_tpt']) ?? 0 }}
                                        </td>

                                        <td
                                            style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                        margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                            {{ round($data['hra']) ?? 0 }}
                                        </td>

                                        <td
                                            style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                            margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                            {{ round($data['dis_alw']) ?? 0 }}
                                        </td>
                                        <td
                                            style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                        margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                            {{ round($data['misc']) ?? 0 }}
                                        </td>
                                        <td
                                            style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                            margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                            {{ round($data['ot']) ?? 0 }}
                                        </td>
                                        <td
                                            style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                        margin: 0px 0px !important; border-bottom: 1px solid #000;">

                                            {{ round($total_credit) ?? 0 }}
                                        </td>
                                        {{-- @dd($item->memberCategory->fund_type) --}}
                                        <td
                                            style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                        margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                            @if ($item->memberCategory->fund_type == 'NPS')
                                                {{ round($data['nps']) ?? 0 }}
                                            @elseif ($item->memberCategory->fund_type == 'UPS')
                                                {{ round($data['ups_10_per_rec']) ?? 0 }}
                                            @else
                                                {{ round($data['gpf']) ?? 0 }}
                                            @endif

                                        </td>
                                        <td
                                            style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                            margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                            {{ round($data['cgeis']) ?? 0 }}
                                        </td>
                                        <td
                                            style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                        margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                            {{ round($data['cghs']) ?? 0 }}
                                        </td>
                                        <td
                                            style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                            margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                            {{ round($data['p_tax']) ?? 0 }}
                                        </td>
                                        <td
                                            style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                        margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                            {{ round($data['hba']) ?? 0 }}
                                        </td>
                                        <td
                                            style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                        margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                            {{ round($data['pli']) ?? 0 }}
                                        </td>
                                        <td
                                            style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                        margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                            {{ round($data['lic']) ?? 0 }}
                                        </td>
                                        <td
                                            style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                        margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                            {{ round($data['eol']) ?? 0 }}
                                        </td>
                                        <td
                                            style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                        margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                            {{ round($data['hdfc']) ?? 0 }}
                                        </td>
                                        <td
                                            style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                        margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                            {{ round($data['d_misc']) ?? 0 }}
                                        </td>
                                        <td
                                            style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                        margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                            {{ round($data['i_tax']) ?? 0 }}
                                        </td>

                                    </tr>
                                @endforeach
                                @php
                                    $arrear_total = 0;
                                    foreach ($item['arrears'] as $key => $arrear) {
                                        $arrear_total += $arrear['amt'];
                                    }

                                    $final_total = round(($totalCredit['total'] ?? 0) + ($arrear_total ?? 0));
                                    // dd($totalCredit['total'], $arrear_total);
                                @endphp
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                                    margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                        Total
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                                margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                        {{ $totalCredit['basic'] }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                                    margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                        {{ $totalCredit['g_pay'] ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                                margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                        {{ $totalCredit['s_pay'] ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                                margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                        {{ $totalCredit['e_pay'] ?? 0 }}
                                    </td>
                                    @if ($item->memberCategory->fund_type == 'NPS')
                                        <td
                                            style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                                margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                            {{ $totalCredit['npsc'] ?? 0 }}
                                        </td>
                                    @endif

                                    @if ($item->memberCategory->fund_type == 'UPS')
                                        <td
                                            style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                                margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                            {{ $totalCredit['upsc_10'] ?? 0 }}
                                        </td>
                                    @endif
                                    <td
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                                    margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                        {{ $totalCredit['add_incr'] ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                                margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                        {{ $totalCredit['var_incr'] ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                                    margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                        {{ $totalCredit['da'] ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                                margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                        {{ $totalCredit['tpt'] ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                                    margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                        {{ $totalCredit['da_tpt'] ?? 0 }}
                                    </td>


                                    <td
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                                margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                        {{ $totalCredit['hra'] ?? 0 }}
                                    </td>

                                    <td
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                                    margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                        {{ $totalCredit['dis_alw'] ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                                margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                        {{ $totalCredit['misc'] ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                                    margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                        {{ $totalCredit['ot'] ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                                margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                        {{ $totalCredit['total'] ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                                margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                        {{ $totalDebit[
                                            $item->memberCategory->fund_type == 'GPF' ? 'gpf' : ($item->memberCategory->fund_type == 'UPS' ? 'ups' : 'nps')
                                        ] }}

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                                    margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                        {{ round($totalDebit['cgegis']) ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                                margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                        {{ round($totalDebit['cghs']) ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                                    margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                        {{ round($totalDebit['p_tax']) ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                                margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                        {{ round($totalDebit['hba']) ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                                margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                        {{ round($totalDebit['pli']) ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                             margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                        {{ round($totalDebit['lic']) ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                             margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                        {{ round($totalDebit['eol']) ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                          margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                        {{ round($totalDebit['hdfc']) ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                                margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                        {{ round($totalDebit['misc1']) ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                             margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                        {{ round($totalDebit['i_tax']) ?? 0 }}
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding:0 0px">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                            <tbody>
                                <tr>
                                    <td
                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        Add Arrears Paid
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                margin: 0px 0px !important;">
                                        {{ $arrear_total ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                              margin: 0px 0px !important;">
                                        CGHS Recovered from Supplimentary Bills
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                margin: 0px 0px !important;">
                                        0
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                                  margin: 0px 0px !important;">
                                        Income Tax Recovered Other than Pay
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                  margin: 0px 0px !important;">
                                        {{ $totalDebit['i_tax'] ?? 0 }}
                                    </td>
                                </tr>
                                {{-- <tr>
                                <td
                                    style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    Less HRA/EOL/HPL/ TOTAL
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                margin: 0px 0px !important;">
                                    0
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                              margin: 0px 0px !important;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                  margin: 0px 0px !important;">
                                    Income Tax Recovered From Arrears
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                  margin: 0px 0px !important;">
                                    0
                                </td>
                            </tr> --}}
                                {{-- <tr>
                                <td
                                    style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    Add Govt Subscription to the NPS
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                margin: 0px 0px !important;">
                                    0
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                              margin: 0px 0px !important;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                  margin: 0px 0px !important;">
                                    Income Tax Recovered From OT Bill
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                  margin: 0px 0px !important;">
                                    0
                                </td>
                            </tr> --}}
                                <tr>
                                    <td
                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        FINAL TOTAL
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                margin: 0px 0px !important;">
                                        {{ $final_total }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                              margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                    </td>
                                    {{-- <td
                                    style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                  margin: 0px 0px !important;">
                                    Challan Amt
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                  margin: 0px 0px !important;">
                                    0
                                </td> --}}
                                </tr>
                                <tr>
                                    <td
                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                              margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                    </td>
                                    {{-- <td
                                    style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                  margin: 0px 0px !important;">
                                    NPS/CPS Recovered from Arrears
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                  margin: 0px 0px !important;">
                                    0
                                </td> --}}
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td style="padding:0 0px">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                            <tbody>
                                <tr>
                                    <td
                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important; border-top: 1px solid #000;  border-bottom: 1px solid #000;">
                                        {{-- @dd($item['arrears']) --}}
                                        @php
                                            $total_update_allowance = 0;
                                        @endphp
                                        Arrear Details: @foreach ($item['arrears'] as $value)
                                            {{ $value['name'] }} - {{ $value['amt'] }} ,
                                            @php
                                                if ($value['name'] == 'Update Allw') {
                                                    $total_update_allowance += $value['amt'];
                                                }
                                            @endphp
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>

                @if (isset($item['savings']['it_rules']) && $item['savings']['it_rules'] == 1)
                    <tr>
                        <td style="padding:0 0px;">
                            <table width="100%" border="1">
                                <tr>
                                    <td width="50%">
                                        <table width="100%" border="1">
                                            <tbody>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        1. Pay and Allowances (Including HRA, Tuition Fee etc)
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                        {{ $final_total ?? 0 }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        2. Exemptions
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        a. Elements of HRA exempted<br>
                                                        (Actual amount of HRA paid per annum
                                                        Rs.{{ $totalCredit['hra'] ?? 0 }}/-
                                                        Total Rent paid
                                                        Rs.{{ $item['savings']['annual_rent'] ?? 0 }}/-)
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                        0
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        b. Standard Deduction + Transport Allowance Excemption for
                                                        Selected PH
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                        @if (isset($item['savings']['it_rules']) && $item['savings']['it_rules'] == 1)
                                                            @php
                                                                $standard_deduction = 75000;
                                                            @endphp
                                                        @else
                                                            @php
                                                                $standard_deduction = 50000;
                                                            @endphp
                                                        @endif
                                                        {{ $standard_deduction }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        c. Professional Update Allowance
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">

                                                        0
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        @php
                                                            $total_examptaion = $standard_deduction + 0 ?? 0;
                                                        @endphp
                                                        {{ $total_examptaion ?? 0 }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        3. Pay & Allowances after Exemptions (1 - 2)
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">
                                                        @php $pay_allowances_after_exemptions = ($final_total  ?? 0) - $total_examptaion @endphp
                                                        {{ $pay_allowances_after_exemptions ?? 0 }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        4. Deductions
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        a. Professional Tax
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                        {{ 0 }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        b. Accrued Interest on HBA (Self Occupied House)
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                        {{ 0 }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        c. Med Insurance / CGHS / Preventive Health Check (80 D) (25,000
                                                        /
                                                        50,000)
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">

                                                        {{ 0 }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        d. Expenditure on Medical Treatment (80 DD) (75,000 / 1,25,000)
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">


                                                        {{ 0 }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        e. Exp on Treatment for Specified Disease like Cancer/ AIDS (80
                                                        DDB)
                                                        (40,000 / 1L)
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">

                                                        {{ 0 }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        f. Self/Dependent Physically Handicapped (80 U) (75,000 /
                                                        1,25,000)
                                                    </td>

                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                        {{ 0 }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        g. Interest on Education Loan (80 E)
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                        {{ 0 }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        h. Any Donations to Specified Funds (80 G) (25,000)
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">


                                                        {{ 0 }}

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        i. Interest Earned on deposits in savings A/c (80 TTA) (10,000)
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">


                                                        {{ 0 }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        j. Equity Saving Scheme (80 CC G)
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                        {{ 0 }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        k. HBA Interest Exemption (80 EE)(50,000)
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">

                                                        {{ 0 }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        I. CEA u/s 10(14)
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                        {{ 0 }}
                                                    </td>
                                                    @php
                                                        $total_other_savings = 0;
                                                    @endphp

                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        {{ $total_other_savings ?? 0 }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        5. Pay & Allowances after Deductions (3 - 4)
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">
                                                        @php
                                                            $pay_allowances_after_deductions =
                                                                $pay_allowances_after_exemptions - $total_other_savings;
                                                        @endphp
                                                        {{ $pay_allowances_after_deductions }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        6. Income from Other Sources
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        a. Interest on Fixed Deposits
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                        {{ 0 }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        b. Interest on NSC
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                        {{ 0 }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        c. Income/Loss on Let-out Property
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                        {{ 0 }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        d. Income from pension
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                        {{ 0 }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        e. Income from Interest on Savings A/c
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                        {{ 0 }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        @php
                                                            $total_income_other_sources = 0;
                                                        @endphp


                                                        {{ $total_income_other_sources }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        7. Total Income (5 + 6)
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">
                                                        @php
                                                            $total_income =
                                                                $total_income_other_sources +
                                                                $pay_allowances_after_deductions;
                                                        @endphp
                                                        {{ $total_income }}
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </td>
                                    <td width="50%">
                                        <table width="100%" border="1">

                                            <tbody>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        8a. Savings (80C + 80CCC + 80CCD(1))
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                </tr>
                                                @php

                                                    $total_80c_savings = 0;

                                                    $eligible_80c_savings = min($total_80c_savings, 150000);
                                                @endphp

                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        PPF
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">
                                                        {{ 0 }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        ICICl/IDBI or Other Bonds
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        {{ 0 }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        GPF Subscription / CPS
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">
                                                        {{ 0 }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        NSC / CTD
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        {{ 0 }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        CGEIS
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">
                                                        {{ 0 }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        HBA Loan Refund
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        {{ 0 }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        PLI
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">
                                                        {{ 0 }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        Jeevan Suraksha / Jeevan Dhara
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        {{ 0 }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        LIC
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">
                                                        {{ 0 }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        ULIP
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        {{ 0 }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        TUTION FEE
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">
                                                        {{ 0 }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        Any Other
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        {{ 0 }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        Total of (8a)
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        (Restricted to a Max of 1,50,000)
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        {{ $eligible_80c_savings }}
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        8b Govt. Subs to CPS - 80CCD(2)
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                        {{ 0 }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        8c U/s - 80CCD(1b) through NSDL
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        {{ 0 }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        Total Savings - (8a+8b+8c)
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        @php
                                                            $totalSaving = 0;
                                                        @endphp
                                                        {{ $totalSaving }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        9. Taxable Income (7 - 8)
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        @php
                                                            $taxable_income = $total_income - $totalSaving;
                                                        @endphp
                                                        {{ $taxable_income }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        10. Taxable Income rounded off to nearest ten Rupee
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        @php
                                                            $taxable_income_rounded = round($taxable_income, -1);
                                                        @endphp
                                                        {{ $taxable_income_rounded }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        11. Total Income Tax
                                                    </td>

                                                    @php
                                                        $income = (float) $taxable_income_rounded;
                                                        $tax = 0;
                                                        $surcharge = 0;

                                                        if (
                                                            isset($item['savings']['it_rules']) &&
                                                            $item['savings']['it_rules'] == 1
                                                        ) {
                                                            // ✅ NEW REGIME
                                                            if ($income <= 300000) {
                                                                $tax = 0;
                                                            } elseif ($income <= 700000) {
                                                                $tax = ($income - 300000) * 0.05;
                                                            } elseif ($income <= 1000000) {
                                                                $tax = 20000 + ($income - 700000) * 0.1;
                                                            } elseif ($income <= 1200000) {
                                                                $tax = 50000 + ($income - 1000000) * 0.15;
                                                            } elseif ($income <= 1500000) {
                                                                $tax = 80000 + ($income - 1200000) * 0.2;
                                                            } else {
                                                                $tax = 140000 + ($income - 1500000) * 0.3;
                                                            }

                                                            // ✅ SURCHARGE - New Regime
                                                            if ($income > 20000000) {
                                                                $surcharge = $tax * 0.25;
                                                            } elseif ($income > 10000000) {
                                                                $surcharge = $tax * 0.15;
                                                            } elseif ($income > 5000000) {
                                                                $surcharge = $tax * 0.1;
                                                            }
                                                        } else {
                                                            // ✅ OLD REGIME
                                                            if ($income <= 250000) {
                                                                $tax = 0;
                                                            } elseif ($income <= 500000) {
                                                                $tax = ($income - 250000) * 0.05;
                                                            } elseif ($income <= 1000000) {
                                                                $tax = 12500 + ($income - 500000) * 0.2;
                                                            } else {
                                                                $tax = 112500 + ($income - 1000000) * 0.3;
                                                            }

                                                            // ✅ SURCHARGE - Old Regime
                                                            if ($income > 50000000) {
                                                                $surcharge = $tax * 0.37;
                                                            } elseif ($income > 20000000) {
                                                                $surcharge = $tax * 0.25;
                                                            } elseif ($income > 10000000) {
                                                                $surcharge = $tax * 0.15;
                                                            } elseif ($income > 5000000) {
                                                                $surcharge = $tax * 0.1;
                                                            }
                                                        }

                                                        $total_income_tax_without_ecess = round($tax + $surcharge);
                                                    @endphp
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        {{ $total_income_tax_without_ecess }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        12. Relief u/s 87 A
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        0 {{-- {{  $relief87A ?? 0 }} --}}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        {{ $total_income_tax_without_ecess }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        13. Add 4% Edu Cess to Income Tax <br>
                                                        (IT - {{ $tax }}, Surcharge - {{ $surcharge }})


                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                                    </td>
                                                    @php
                                                        $cess = round($total_income_tax_without_ecess * 0.04);
                                                        $total_tax_with_cess = $total_income_tax_without_ecess + $cess;
                                                    @endphp
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        {{ $cess ?? 0 }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        {{ $total_tax_with_cess ?? 0 }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        14. Relief u/s 89
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        {{ 0 }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        @php
                                                            $final_income_tax_with_sec_89 = $total_tax_with_cess - 0;
                                                        @endphp

                                                        {{ $final_income_tax_with_sec_89 }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        15. Amt of IT rec from Pay & other Bills
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        {{ $totalDebit['i_tax'] ?? 0 }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        16. Balance to be recovered in the remaining months
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        @php
                                                            $total_remaining_amount =
                                                                $final_income_tax_with_sec_89 -
                                                                ($totalDebit['i_tax'] ?? 0);
                                                        @endphp
                                                        {{ $total_remaining_amount ?? 0 }}
                                                    </td>
                                                </tr>
                                                @php
                                                    // Month mapping: higher number = earlier in year
                                                    $monthMap = [
                                                        7 => 'Aug',
                                                        6 => 'Sep',
                                                        5 => 'Oct',
                                                        4 => 'Nov',
                                                        3 => 'Dec',
                                                        2 => 'Jan',
                                                        1 => 'Feb',
                                                    ];

                                                    $total_remaining_amount = $total_remaining_amount ?? 0;
                                                    $recovery_form = $recovery_form ?? 10; // e.g., 1 for Feb
                                                    $startMonth = (int) $recovery_form;

                                                    // Calculate how many months are involved (all months <= selected)
                                                    $monthsToRecover = array_filter(
                                                        array_keys($monthMap),
                                                        fn($key) => $key <= $startMonth,
                                                    );
                                                    $monthCount = count($monthsToRecover);

                                                    // Divide total amount across these months
                                                    $baseShare = floor($total_remaining_amount / $monthCount);
                                                    $lastShare =
                                                        $total_remaining_amount - $baseShare * ($monthCount - 1); // Adjust last month to match total

                                                    $output = [];
                                                    foreach ($monthMap as $value => $label) {
                                                        if ($value <= $startMonth) {
                                                            $share =
                                                                $value == min($monthsToRecover)
                                                                    ? $lastShare
                                                                    : $baseShare;
                                                            $tax = round(($share * 100) / 104);
                                                            $cess = $share - $tax;
                                                            $output[] = "$label -> $share ($tax, $cess)";
                                                        } else {
                                                            $output[] = "$label -> 0";
                                                        }
                                                    }

                                                @endphp


                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        {{-- @dd($recovery_form) --}}
                                                        @if ($recovery_form && $recovery_form != 10)
                                                            @foreach (array_chunk($output, 4) as $line)
                                                                {!! implode(' ; ', $line) !!}<br>
                                                            @endforeach
                                                        @else
                                                            Aug -> 0 ; Sep -> 0 ; Oct -> 0 ; Nov -> 0 <br>
                                                            Dec -> 0 ; Jan -> 0 ; Feb -> 0
                                                        @endif

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 6400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    {{-- end it rules if new regime --}}
                @else
                    <tr>
                        <td style="padding:0 0px;">
                            <table width="100%" border="1">
                                <tr>
                                    <td width="50%">
                                        <table width="100%" border="1">
                                            <tbody>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        1. Pay and Allowances (Including HRA, Tuition Fee etc)
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                        {{ $final_total ?? 0 }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        2. Exemptions
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        a. Elements of HRA exempted<br>
                                                        (Actual amount of HRA paid per annum
                                                        Rs.{{ $totalCredit['hra'] ?? 0 }}/-
                                                        Total Rent paid
                                                        Rs.{{ $item['savings']['annual_rent'] ?? 0 }}/-)
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                        0
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        b. Standard Deduction + Transport Allowance Excemption for
                                                        Selected PH
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                        @if (isset($item['savings']['it_rules']) && $item['savings']['it_rules'] == 1)
                                                            @php
                                                                $standard_deduction = 75000;
                                                            @endphp
                                                        @else
                                                            @php
                                                                $standard_deduction = 50000;
                                                            @endphp
                                                        @endif
                                                        {{ $standard_deduction }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        c. Professional Update Allowance
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                        {{ $total_update_allowance ?? 0 }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        @php
                                                            $total_examptaion =
                                                                $standard_deduction + $total_update_allowance ?? 0;
                                                        @endphp
                                                        {{ $total_examptaion ?? 0 }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        3. Pay & Allowances after Exemptions (1 - 2)
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">
                                                        @php $pay_allowances_after_exemptions = ($final_total  ?? 0) - $total_examptaion @endphp
                                                        {{ $pay_allowances_after_exemptions ?? 0 }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        4. Deductions
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        a. Professional Tax
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                        {{ $totalDebit['p_tax'] ?? 0 }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        b. Accrued Interest on HBA (Self Occupied House)
                                                    </td>
                                                    @php
                                                        $hba_loan = $item['savings']['hba_int'] ?? 0;

                                                        $hba_loan_amount = $hba_loan > 200000 ? 200000 : $hba_loan;

                                                    @endphp

                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                        {{ $hba_loan_amount ?? 0 }}

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        c. Med Insurance / CGHS / Preventive Health Check (80 D) (25,000
                                                        /
                                                        50,000)
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                        @php
                                                            $medical =
                                                                ($totalDebit['cghs'] ?? 0) +
                                                                ($item['savings']['med_ins'] ?? 0);
                                                            if (
                                                                isset($item['savings']['med_ins_80d']) &&
                                                                $item['savings']['med_ins_80d'] == 1
                                                            ) {
                                                                $medical_amount = $medical > 50000 ? 50000 : $medical;
                                                            } else {
                                                                $medical_amount = $medical > 25000 ? 25000 : $medical;
                                                            }
                                                        @endphp
                                                        {{ $medical_amount ?? 0 }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        d. Expenditure on Medical Treatment (80 DD) (75,000 / 1,25,000)
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">

                                                        @php
                                                            $expenditure_medical = $item['savings']['med_trt'] ?? 0;
                                                            if (
                                                                isset($item['savings']['med_tri_80dd_disability']) &&
                                                                $item['savings']['med_tri_80dd_disability'] == 1
                                                            ) {
                                                                $expenditure_medical_amount =
                                                                    $expenditure_medical > 125000
                                                                        ? 125000
                                                                        : $expenditure_medical;
                                                            } else {
                                                                $expenditure_medical_amount =
                                                                    $expenditure_medical > 75000
                                                                        ? 75000
                                                                        : $expenditure_medical;
                                                            }
                                                        @endphp
                                                        {{ $expenditure_medical_amount ?? 0 }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        e. Exp on Treatment for Specified Disease like Cancer/ AIDS (80
                                                        DDB)
                                                        (40,000 / 1L)
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                        @php
                                                            $cancer = $item['savings']['cancer_amount'] ?? 0;
                                                            if (
                                                                isset(
                                                                    $item['savings']['cancer_80ddb_senior_dependent'],
                                                                ) &&
                                                                $item['savings']['cancer_80ddb_senior_dependent'] == 1
                                                            ) {
                                                                $cancer_amount = $cancer > 100000 ? 100000 : $cancer;
                                                            } else {
                                                                $cancer_amount = $cancer > 40000 ? 40000 : $cancer;
                                                            }
                                                        @endphp
                                                        {{ $cancer_amount ?? 0 }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        f. Self/Dependent Physically Handicapped (80 U) (75,000 /
                                                        1,25,000)
                                                    </td>
                                                    @php
                                                        $handicaped = $item['savings']['ph_disable'] ?? 0;
                                                        if (
                                                            isset($item['savings']['ph_disable_80u_disability']) &&
                                                            $item['savings']['ph_disable_80u_disability'] == 1
                                                        ) {
                                                            $handicaped_amount =
                                                                $handicaped > 125000 ? 125000 : $handicaped;
                                                        } else {
                                                            $handicaped_amount =
                                                                $handicaped > 75000 ? 75000 : $handicaped;
                                                        }
                                                    @endphp
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                        {{ $handicaped_amount ?? 0 }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        g. Interest on Education Loan (80 E)
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                        {{ $item['savings']['edu_loan_int'] ?? 0 }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        h. Any Donations to Specified Funds (80 G) (25,000)
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                        @php
                                                            $others_d = $item['savings']['others_d'] ?? 0;
                                                            $donation = $others_d > 25000 ? 25000 : $others_d;
                                                        @endphp

                                                        {{ $donation }}

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        i. Interest Earned on deposits in savings A/c (80 TTA) (10,000)
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                        @php
                                                            $ac_int_80tta = $item['savings']['ac_int_80tta'] ?? 0;
                                                            $deposit = $ac_int_80tta > 10000 ? 10000 : $ac_int_80tta;
                                                        @endphp

                                                        {{ $deposit }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        j. Equity Saving Scheme (80 CC G)
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                        {{ $item['savings']['equity_mf'] ?? 0 }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        k. HBA Interest Exemption (80 EE)(50,000)
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                        @php
                                                            $hba_int_80ee = $item['savings']['hba_int_80ee'] ?? 0;
                                                            $hba_int = $hba_int_80ee > 50000 ? 50000 : $hba_int_80ee;
                                                        @endphp

                                                        {{ $hba_int }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        I. CEA u/s 10(14)
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                        {{ $item['savings']['cea'] ?? 0 }}
                                                    </td>
                                                    @php
                                                        $total_other_savings =
                                                            ($totalDebit['p_tax'] ?? 0) +
                                                            ($hba_loan_amount ?? 0) +
                                                            ($medical_amount ?? 0) +
                                                            ($expenditure_medical_amount ?? 0) +
                                                            ($cancer_amount ?? 0) +
                                                            ($handicaped_amount ?? 0) +
                                                            ($item['savings']['edu_loan_int'] ?? 0) +
                                                            ($donation ?? 0) +
                                                            ($deposit ?? 0) +
                                                            ($item['savings']['equity_mf'] ?? 0) +
                                                            ($hba_int_80ee ?? 0) +
                                                            ($item['savings']['cea'] ?? 0);
                                                    @endphp

                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        {{ $total_other_savings ?? 0 }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        5. Pay & Allowances after Deductions (3 - 4)
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">
                                                        @php
                                                            $pay_allowances_after_deductions =
                                                                $pay_allowances_after_exemptions - $total_other_savings;
                                                        @endphp
                                                        {{ $pay_allowances_after_deductions }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        6. Income from Other Sources
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        a. Interest on Fixed Deposits
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                        {{ $item['savings']['fd_int'] ?? 0 }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        b. Interest on NSC
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                        {{ $item['savings']['nscint'] ?? 0 }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        c. Income/Loss on Let-out Property
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                        {{ $item['savings']['letout'] ?? 0 }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        d. Income from pension
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                        {{ $item['savings']['pension'] ?? 0 }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        e. Income from Interest on Savings A/c
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                        {{ $item['savings']['ac_int_80tta'] ?? 0 }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        @php
                                                            $total_income_other_sources =
                                                                ($item['savings']['fd_int'] ?? 0) +
                                                                ($item['savings']['nscint'] ?? 0) +
                                                                ($item['savings']['letout'] ?? 0) +
                                                                ($item['savings']['pension'] ?? 0) +
                                                                ($item['savings']['ac_int_80tta'] ?? 0);
                                                        @endphp


                                                        {{ $total_income_other_sources }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        7. Total Income (5 + 6)
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">
                                                        @php
                                                            $total_income =
                                                                $total_income_other_sources +
                                                                $pay_allowances_after_deductions;
                                                        @endphp
                                                        {{ $total_income }}
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </td>
                                    <td width="50%">
                                        <table width="100%" border="1">

                                            <tbody>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        8a. Savings (80C + 80CCC + 80CCD(1))
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                </tr>


                                                @php

                                                    $total_80c_savings =
                                                        ($item['savings']['ppf'] ?? 0) +
                                                        ($item['savings']['bonds'] ?? 0) +
                                                        ($totalDebit[
                                                            $item->memberCategory->fund_type == 'GPF'
                                                                ? 'gpf'
                                                                : ($item->memberCategory->fund_type == 'UPS'
                                                                    ? 'ups'
                                                                    : 'nps')
                                                        ] ??
                                                            0) +
                                                        ($item['savings']['nsc_ctd'] ?? 0) +
                                                        round($totalDebit['cgegis'] ?? 0) +
                                                        ($item['savings']['hba_prncpl'] ?? 0) +
                                                        ($item['savings']['pli'] ?? 0) +
                                                        ($item['savings']['js_sukanya'] ?? 0) +
                                                        round($item['savings']['lic'] ?? 0) +
                                                        ($item['savings']['ulip'] ?? 0) +
                                                        ($item['savings']['t_fee'] ?? 0) +
                                                        ($item['savings']['others_s'] ?? 0);

                                                    $eligible_80c_savings = min($total_80c_savings, 150000);
                                                @endphp

                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        PPF
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">
                                                        {{ $item['savings']['ppf'] ?? 0 }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        ICICl/IDBI or Other Bonds
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        {{ $item['savings']['bonds'] ?? 0 }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        GPF Subscription / CPS
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">
                                                        {{ $totalDebit[
                                                            $item->memberCategory->fund_type == 'GPF' ? 'gpf' : ($item->memberCategory->fund_type == 'UPS' ? 'ups' : 'nps')
                                                        ] }}

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        NSC / CTD
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        {{ $item['savings']['nsc_ctd'] ?? 0 }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        CGEIS
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">
                                                        {{ round($totalDebit['cgegis']) ?? 0 }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        HBA Loan Refund
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        {{ $item['savings']['hba_prncpl'] ?? 0 }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        PLI
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">
                                                        {{ $item['savings']['pli'] ?? 0 }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        Jeevan Suraksha / Jeevan Dhara
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        {{ $item['savings']['js_sukanya'] ?? 0 }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        LIC
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">
                                                        {{ round($item['savings']['lic'] ?? 0) }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        ULIP
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        {{ $item['savings']['ulip'] ?? 0 }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        TUTION FEE
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">
                                                        {{ $item['savings']['t_fee'] ?? 0 }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        Any Other
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        {{ $item['savings']['ohters_s'] ?? 0 }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        Total of (8a)
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        (Restricted to a Max of 1,50,000)
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        {{ $eligible_80c_savings }}
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        8b Govt. Subs to CPS - 80CCD(2)
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                        {{ $totalCredit['npsc'] ?? 0 }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        8c U/s - 80CCD(1b) through NSDL
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        {{ $item['savings']['nsdl'] ?? 0 }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        Total Savings - (8a+8b+8c)
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        @php
                                                            $totalSaving =
                                                                ($eligible_80c_savings ?? 0) +
                                                                ($totalCredit['npsc'] ?? 0) +
                                                                ($item['savings']['nsdl'] ?? 0);
                                                        @endphp
                                                        {{ $totalSaving }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        9. Taxable Income (7 - 8)
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        @php
                                                            $taxable_income = $total_income - $totalSaving;
                                                        @endphp
                                                        {{ $taxable_income }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        10. Taxable Income rounded off to nearest ten Rupee
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        @php
                                                            $taxable_income_rounded = round($taxable_income, -1);
                                                        @endphp
                                                        {{ $taxable_income_rounded }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        11. Total Income Tax
                                                    </td>

                                                    @php
                                                        $income = (float) $taxable_income_rounded;
                                                        $tax = 0;
                                                        $surcharge = 0;

                                                        if (
                                                            isset($item['savings']['it_rules']) &&
                                                            $item['savings']['it_rules'] == 1
                                                        ) {
                                                            // ✅ NEW REGIME
                                                            if ($income <= 300000) {
                                                                $tax = 0;
                                                            } elseif ($income <= 700000) {
                                                                $tax = ($income - 300000) * 0.05;
                                                            } elseif ($income <= 1000000) {
                                                                $tax = 20000 + ($income - 700000) * 0.1;
                                                            } elseif ($income <= 1200000) {
                                                                $tax = 50000 + ($income - 1000000) * 0.15;
                                                            } elseif ($income <= 1500000) {
                                                                $tax = 80000 + ($income - 1200000) * 0.2;
                                                            } else {
                                                                $tax = 140000 + ($income - 1500000) * 0.3;
                                                            }

                                                            // ✅ SURCHARGE - New Regime
                                                            if ($income > 20000000) {
                                                                $surcharge = $tax * 0.25;
                                                            } elseif ($income > 10000000) {
                                                                $surcharge = $tax * 0.15;
                                                            } elseif ($income > 5000000) {
                                                                $surcharge = $tax * 0.1;
                                                            }
                                                        } else {
                                                            // ✅ OLD REGIME
                                                            if ($income <= 250000) {
                                                                $tax = 0;
                                                            } elseif ($income <= 500000) {
                                                                $tax = ($income - 250000) * 0.05;
                                                            } elseif ($income <= 1000000) {
                                                                $tax = 12500 + ($income - 500000) * 0.2;
                                                            } else {
                                                                $tax = 112500 + ($income - 1000000) * 0.3;
                                                            }

                                                            // ✅ SURCHARGE - Old Regime
                                                            if ($income > 50000000) {
                                                                $surcharge = $tax * 0.37;
                                                            } elseif ($income > 20000000) {
                                                                $surcharge = $tax * 0.25;
                                                            } elseif ($income > 10000000) {
                                                                $surcharge = $tax * 0.15;
                                                            } elseif ($income > 5000000) {
                                                                $surcharge = $tax * 0.1;
                                                            }
                                                        }

                                                        $total_income_tax_without_ecess = round($tax + $surcharge);
                                                    @endphp
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        {{ $total_income_tax_without_ecess }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        12. Relief u/s 87 A
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        0 {{-- {{  $relief87A ?? 0 }} --}}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        {{ $total_income_tax_without_ecess }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        13. Add 4% Edu Cess to Income Tax <br>
                                                        (IT - {{ $tax }}, Surcharge - {{ $surcharge }})


                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                                    </td>
                                                    @php
                                                        $cess = round($total_income_tax_without_ecess * 0.04);
                                                        $total_tax_with_cess = $total_income_tax_without_ecess + $cess;
                                                    @endphp
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        {{ $cess ?? 0 }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        {{ $total_tax_with_cess ?? 0 }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        14. Relief u/s 89
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        {{ $item['savings']['sec_89'] ?? 0 }}
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        @php
                                                            $final_income_tax_with_sec_89 =
                                                                $total_tax_with_cess -
                                                                ($item['savings']['sec_89'] ?? 0);
                                                        @endphp

                                                        {{ $final_income_tax_with_sec_89 }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        15. Amt of IT rec from Pay & other Bills
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        {{ $totalDebit['i_tax'] ?? 0 }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        16. Balance to be recovered in the remaining months
                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                        @php
                                                            $total_remaining_amount =
                                                                $final_income_tax_with_sec_89 -
                                                                ($totalDebit['i_tax'] ?? 0);
                                                        @endphp
                                                        {{ $total_remaining_amount ?? 0 }}
                                                    </td>
                                                </tr>
                                                @php
                                                    // Month mapping: higher number = earlier in year
                                                    $monthMap = [
                                                        7 => 'Aug',
                                                        6 => 'Sep',
                                                        5 => 'Oct',
                                                        4 => 'Nov',
                                                        3 => 'Dec',
                                                        2 => 'Jan',
                                                        1 => 'Feb',
                                                    ];

                                                    $total_remaining_amount = $total_remaining_amount ?? 0;
                                                    $recovery_form = $recovery_form ?? 10; // e.g., 1 for Feb
                                                    $startMonth = (int) $recovery_form;

                                                    // Calculate how many months are involved (all months <= selected)
                                                    $monthsToRecover = array_filter(
                                                        array_keys($monthMap),
                                                        fn($key) => $key <= $startMonth,
                                                    );
                                                    $monthCount = count($monthsToRecover);

                                                    // Divide total amount across these months
                                                    $baseShare = floor($total_remaining_amount / $monthCount);
                                                    $lastShare =
                                                        $total_remaining_amount - $baseShare * ($monthCount - 1); // Adjust last month to match total

                                                    $output = [];
                                                    foreach ($monthMap as $value => $label) {
                                                        if ($value <= $startMonth) {
                                                            $share =
                                                                $value == min($monthsToRecover)
                                                                    ? $lastShare
                                                                    : $baseShare;
                                                            $tax = round(($share * 100) / 104);
                                                            $cess = $share - $tax;
                                                            $output[] = "$label -> $share ($tax, $cess)";
                                                        } else {
                                                            $output[] = "$label -> 0";
                                                        }
                                                    }

                                                @endphp


                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                        {{-- @dd($recovery_form) --}}
                                                        @if ($recovery_form && $recovery_form != 10)
                                                            @foreach (array_chunk($output, 4) as $line)
                                                                {!! implode(' ; ', $line) !!}<br>
                                                            @endforeach
                                                        @else
                                                            Aug -> 0 ; Sep -> 0 ; Oct -> 0 ; Nov -> 0 <br>
                                                            Dec -> 0 ; Jan -> 0 ; Feb -> 0
                                                        @endif

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 6400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                    <td
                                                        style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                @endif
                <!-- <tr>
                <td style="padding:0 0px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                            <tr>
                                <td rowspan="2" style="font-size: 12px; line-height: 16px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important; height: 20px;">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr> -->
                <tr>
                    <td style="padding: 0 0px">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                            <tbody>
                                <tr>
                                    <td rowspan="6"
                                        style="font-size: 12px; line-height: 10px; font-weight: 600; color: #000; text-align: left; padding: 5px; height: 40px;
                                border-top: 1px solid #000;">
                                        TAX SLABS
                                    </td>

                                    @if (isset($item['savings']['it_rules']) && $item['savings']['it_rules'] == 1)
                                        {{-- New Tax Regime u/s 115BAC --}}
                                        <td
                                            style="font-size: 10px; line-height: 10px; padding: 5px; border-top: 1px solid #000;">
                                            A) Up to Rs.3,00,000: <u>No tax</u>
                                        </td>
                                        <td
                                            style="font-size: 10px; line-height: 10px; padding: 5px; border-top: 1px solid #000;">
                                            B) Rs.3,00,001 – Rs.7,00,000: <u>5%</u> above Rs.3,00,000
                                        </td>
                                        <td style="font-size: 10px; line-height: 10px; padding: 5px;">
                                            C) Rs.7,00,001 – Rs.10,00,000: Rs.20,000 + <u>10%</u> above Rs.7,00,000
                                        </td>
                                </tr>
                                <tr>

                                    <td style="font-size: 10px; line-height: 10px; padding: 5px;">
                                        D) Rs.10,00,001 – Rs.12,00,000: Rs.50,000 + <u>15%</u> above Rs.10,00,000
                                    </td>
                                    <td style="font-size: 10px; line-height: 10px; padding: 5px;">
                                        E) Rs.12,00,001 – Rs.15,00,000: Rs.80,000 + <u>20%</u> above Rs.12,00,000
                                    </td>
                                    <td style="font-size: 10px; line-height: 10px; padding: 5px;">
                                        F) Rs.15,00,001 – Rs.50,00,000: Rs.1,40,000 + <u>30%</u> above Rs.15,00,000
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px; line-height: 10px; padding: 5px;">
                                        G) Rs.50,00,001 – Rs.1,00,00,000: Rs.1,40,000 + <u>30%</u> above Rs.15,00,000 +
                                        <u>10%</u> surcharge
                                    </td>
                                    <td style="font-size: 10px; line-height: 10px; padding: 5px;">
                                        H) Rs.1,00,00,001 – Rs.2,00,00,000: Rs.1,40,000 + <u>30%</u> above Rs.15,00,000
                                        + <u>15%</u> surcharge
                                    </td>
                                    <td colspan="2" style="font-size: 10px; line-height: 10px; padding: 5px;">
                                        I) Above Rs.2,00,00,000: Rs.1,40,000 + <u>30%</u> above Rs.15,00,000 +
                                        <u>25%</u> surcharge
                                    </td>
                                </tr>
                            @else
                                {{-- Old Tax Regime --}}
                                <td
                                    style="font-size: 10px; padding: 5px; line-height: 10px; border-top: 1px solid #000;">
                                    A) Up to Rs.2,50,000: <u>No tax</u>
                                </td>
                                <td
                                    style="font-size: 10px; padding: 5px;line-height: 10px;  border-top: 1px solid #000;">
                                    B) Rs.2,50,001 – Rs.5,00,000: <u>5%</u> above Rs.2,50,000
                                </td>
                                <td style="font-size: 10px; line-height: 10px; padding: 5px;">
                                    C) Rs.5,00,001 – Rs.10,00,000: Rs.12,500 + <u>20%</u> above Rs.5,00,000
                                </td>
                </tr>
                <tr>

                    <td style="font-size: 10px; line-height: 10px; padding: 5px;">
                        D) Rs.10,00,001 – Rs.50,00,000: Rs.1,12,500 + <u>30%</u> above Rs.10,00,000
                    </td>
                    <td style="font-size: 10px; line-height: 10px; padding: 5px;">
                        E) Rs.50,00,001 – Rs.1,00,00,000: Same as above + <u>10%</u> surcharge
                    </td>
                    <td style="font-size: 10px; line-height: 10px; padding: 5px;">
                        F) Rs.1,00,00,001 – Rs.2,00,00,000: Same as above + <u>15%</u> surcharge
                    </td>
                </tr>
                <tr>
                    <td style="font-size: 10px; line-height: 10px; padding: 5px;">
                        G) Rs.2,00,00,001 – Rs.5,00,00,000: Same as above + <u>25%</u> surcharge
                    </td>
                    <td style="font-size: 10px;line-height: 10px; padding: 5px;">
                        H) Above Rs.5,00,00,000: Same as above + <u>37%</u> surcharge
                    </td>
                </tr>
    @endif
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
