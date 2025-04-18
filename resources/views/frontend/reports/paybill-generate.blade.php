<!doctype html>
<html lang="en">
<title>RCI</title>
<meta charset="utf-8" />

<style>
    /* @page {
            size: 29.7cm 42cm
        } */

    .page-break {
        page-break-before: always;
    }


    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 5px;
        text-align: center;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        border: 1px solid #000;
        padding: 5px;
        text-align: left;
    }

    /* Ensures full table border on every page */
    thead {
        display: table-header-group;
    }

    tfoot {
        display: table-footer-group;
    }

    /* Fixes the issue with borders not appearing across page breaks */
    /* tr {
        page-break-inside: avoid;
    } */
</style>


<body style="background: #fff;">

    @foreach ($groupedData as $chunkKey => $chunkData)
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff"
            style="border-radius: 0px; margin: 0 auto; text-align: center;">
            <tbody>

                <tr>
                    <td style="padding:0 0px">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                            <thead>
                                <tr>
                                    <td colspan="4"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px;  border-right: 0px;">
                                        PAY BILL {{ $pay_bill_no ?? 'N/A' }} FOR THE MONTH OF {{ $month ?? 'N/A' }}
                                        - {{ $year ?? 'N/A' }} </br>GPF OFFICER
                                    </td>
                                    <td colspan="4" style="text-align: center;border-left:0px;border-right:0px;">
                                        <img style="width: 50px; height: 50px; margin: 0 auto; padding: 0px 5px;border:1px solid #ffffff;border-right:0px;border-left:0px;"
                                            border="0" src="{{ public_path('storage/' . $logo->logo) }}"
                                            alt="">
                                    </td>
                                    <td colspan="1" style="text-align: center;border-left:0px;border-right:0px;">
                                    </td>
                                    <td colspan="5"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px; border-right: none !important;border-left:0px;">
                                        Center For High Energy Systems and Science<br>
                                        Unit Code : ######### &nbsp; &nbsp; &nbsp; <span
                                            style="text-transform: uppercase; border-bottom: 1px solid #000;">Page
                                            NO. {{ $chunkKey + 1 }}</span>
                                    </td>

                                </tr>
                                <tr>
                                    <th colspan="2"
                                        style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: center; padding: 0px 5px; border: 1px solid #000; text-transform: uppercase;">
                                        EMPLOYEE DETAILS
                                    </th>
                                    <th colspan="3"
                                        style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: center; padding: 0px 5px; border: 1px solid #000; text-transform: uppercase;">
                                        CREDITS
                                    </th>
                                    <th colspan="5"
                                        style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: center; padding: 0px 5px; border: 1px solid #000; text-transform: uppercase;">
                                        DEBITS
                                    </th>
                                    <th
                                        style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: center; padding: 0px 5px; border: 1px solid #000; text-transform: uppercase;">
                                        Loans
                                    </th>
                                    <th
                                        style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: center; padding: 0px 5px; border: 1px solid #000; text-transform: uppercase;">
                                        RENT
                                    </th>
                                    <th
                                        style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: center; padding: 0px 5px; border: 1px solid #000; text-transform: uppercase;">
                                        TOTAL
                                    </th>
                                    <th
                                        style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: center; padding: 0px 5px; border: 1px solid #000; text-transform: uppercase;">
                                        Sign
                                    </th>
                                </tr>
                                <tr>
                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px; border-left: 1px solid #000; border-top: 1px solid #000; border-right: 1px solid #000; text-transform: uppercase;">
                                        Sr.No.<br>NAME<br>CODE<br>RANK NAME<br>BANK A/C<br>IFSC
                                    </td>
                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px; border-left: 1px solid #000; border-top: 1px solid #000; border-right: 1px solid #000; text-transform: uppercase;">
                                        LEVEL<br>DATE OF BIRTH<br>GPF NO./PRAN NO<br>APPT DATE<br>VAR.INCR.NO,
                                        DNI<br>PAN NO
                                    </td>
                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px; border-left: 1px solid #000; border-top: 1px solid #000; border-right: 1px solid #000; text-transform: uppercase;">
                                        BASIC PAY<br>DA ({{ $da_percent->percentage ?? 'N/A' }}%)<br>HRA<br>TPT
                                        ALLOW<br>TPTDA<br>SPL PAY<br>Var Incr
                                    </td>
                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px; border-left: 1px solid #000; border-top: 1px solid #000; border-right: 1px solid #000; text-transform: uppercase;">
                                        SPL INCENT<br>INCENTIVE<br>DRESS ALLWN<br>VARIABLE AMT<br>ARRS OF PAY &
                                        ALLOW<br>RISK ALLWN
                                    </td>
                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px; border-left: 1px solid #000; border-top: 1px solid #000; border-right: 1px solid #000; text-transform: uppercase;">
                                        NPSC 14%<br>NPSG ARRS 14%<br>NPS ADJ14%<br>MISC CREDIT (IT)<br>MISC CREDIT
                                    </td>
                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px; border-left: 1px solid #000; border-top: 1px solid #000; border-right: 1px solid #000; text-transform: uppercase;">
                                        GPF SUB<br>GPF ADV<br>GPF ARRS<br>CCEGIS<br>CGHS<br>HBA ADV
                                    </td>
                                    {{-- <td valign="top"
                                            style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px; border-left: 1px solid #000; border-top: 1px solid #000; border-right: 1px solid #000; text-transform: uppercase;">
                                            HBA INT<br>CAR ADV<br>CAR INT<br>SCO ADV<br>SCO INT<br>COMP ADV
                                        </td> --}}

                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px; border-left: 1px solid #000; border-top: 1px solid #000; border-right: 1px solid #000; text-transform: uppercase;">
                                        COMP INT<br>FEST ADV<br>LTC<br>MED DEBIT<br>TADA<br>LEAVE REC
                                    </td>
                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px; border-left: 1px solid #000; border-top: 1px solid #000; border-right: 1px solid #000; text-transform: uppercase;">
                                        PENSION REC<br>INCOME TAX<br>EDU CESS<br>PL INSUR<br>MISC DEBIT<br>MISC
                                        DEBIT (IT)
                                    </td>
                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px; border-left: 1px solid #000; border-top: 1px solid #000; border-right: 1px solid #000; text-transform: uppercase;">
                                        NPS 10% REC.<br>NPSG 14%<br>NPS ARR 10%<br>NPSG ARR 14%<br>NPS ADJ
                                        10%<br>NPS ADJ
                                        14%
                                    </td>
                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px; border-left: 1px solid #000; border-top: 1px solid #000; border-right: 1px solid #000; text-transform: uppercase;">
                                        CGHS ARR<br>CGEIS ARR<br>PENAL INTR
                                    </td>
                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px; border-left: 1px solid #000; border-top: 1px solid #000; border-right: 1px solid #000; text-transform: uppercase;">
                                        HBA Inst<br>Comp Inst<br>Edu Inst<br>Car/Bike Inst
                                    </td>
                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px; border-left: 1px solid #000; border-top: 1px solid #000; border-right: 1px solid #000; text-transform: uppercase;">
                                        LICENCE FEE<br>ELECT<br>WATER<br>FURN<br>MISC RENT
                                    </td>
                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px; border-left: 1px solid #000; border-top: 1px solid #000; border-right: 1px solid #000; text-transform: uppercase;">
                                        CREDITS<br>DEBITS<br>NET PAY<br>TABLE REC<br>PAYSLIP PAY
                                    </td>
                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px; border-left: 1px solid #000; border-top: 1px solid #000; border-right: 1px solid #000;">
                                    </td>
                                </tr>
                            </thead>


                            @php
                                $totalItems = count($chunkData);
                                $totalBasicPay = 0;
                                $totalDa = 0;
                                $totalHra = 0;
                                $totalTpt = 0;
                                $totalDaOnTpt = 0;
                                $totalSpay = 0;
                                $totalVarIncr = 0;
                                $totalSplIncent = 0;
                                $totalIncentive = 0;
                                $totaldressAllow = 0;
                                $totalVariableAmount = 0;
                                $totalPayAllow = 0;
                                $totalRiskAllow = 0;
                                $totalMiscCreditIt = 0;
                                $totalMiscCredit = 0;
                                $totalGpfSub = 0;
                                $totalGpfAdv = 0;
                                $totalCgegis = 0;
                                $totalCghs = 0;

                                $totalLtc = 0;
                                $totalMedDebit = 0;
                                $totalTada = 0;
                                $totalLeaveRec = 0;
                                $totalPensionRec = 0;
                                $totalIncomeTax = 0;
                                $totalEduCess = 0;
                                $totalPlInsur = 0;
                                $totalMiscDebit = 0;
                                $totalMiscDebitIt = 0;
                                $totalNps10Rec = 0;
                                $totalCghsArr = 0;
                                $totalCgeisArr = 0;
                                $totalPenalIntr = 0;
                                $totalElec = 0;
                                $totalWater = 0;
                                $totalFurn = 0;
                                $totalMiscRent = 0;
                                $bn = 0;
                                $totalcredit = 0;
                                $totalDebit = 0;
                                $totalNetPay = 0;
                                $totalTableRec = 0;

                                //Loans
                                $totalHbaInst = 0;
                                $totalCompInst = 0;
                                $totalEduInst = 0;
                                $totalCarBikeInst = 0;

                                $totalLoans = 0;

                            @endphp


                            <tbody>
                                @foreach ($chunkData as $key => $member_info)
                                    @php
                                        $totalBasicPay += $member_info['details']['member_credit']->pay ?? 0; // total basic pay
                                        $totalDa += $member_info['details']['member_credit']->da ?? 0; // total da
                                        $totalHra += $member_info['details']['member_credit']->hra ?? 0; // total hra
                                        $totalTpt += $member_info['details']['member_credit']->tpt ?? 0; // total tpt
                                        $totalDaOnTpt += $member_info['details']['member_credit']->da_on_tpt ?? 0; // total da on
                                        $totalSpay += $member_info['details']['member_credit']->s_pay ?? 0;
                                        $totalVarIncr += $member_info['details']['member_credit']->var_incr ?? 0;
                                        $totalSplIncent += $member_info['details']['member_credit']->spl_incentive ?? 0;
                                        $totalIncentive += $member_info['details']['member_credit']->incentive ?? 0;
                                        $totaldressAllow += $member_info['details']['member_credit']->dis_alw ?? 0;
                                        $totalVariableAmount +=
                                            $member_info['details']['member_credit']->variable_amount ?? 0;
                                        $totalPayAllow += $member_info['details']['member_credit']->arrs_pay_alw ?? 0;
                                        $totalRiskAllow += $member_info['details']['member_credit']->risk_alw ?? 0;
                                        $totalMiscCreditIt += $member_info['details']['member_credit']->misc1 ?? 0;
                                        $totalMiscCredit += $member_info['details']['member_credit']->misc2 ?? 0;
                                        $totalGpfSub += $member_info['details']['member_debit']->gpa_sub ?? 0;
                                        $totalGpfAdv += $member_info['details']['member_debit']->gpf_adv ?? 0;
                                        $totalCgegis += $member_info['details']['member_debit']->cgegis ?? 0;
                                        $totalCghs += $member_info['details']['member_debit']->cghs ?? 0;

                                        $totalLtc += $member_info['details']['member_debit']->ltc ?? 0;
                                        $totalMedDebit += $member_info['details']['member_debit']->medi ?? 0;
                                        $totalTada += $member_info['details']['member_debit']->tada ?? 0;
                                        $totalLeaveRec += $member_info['details']['member_debit']->leave_rec ?? 0;
                                        $totalPensionRec += $member_info['details']['member_debit']->pension_rec ?? 0;
                                        $totalIncomeTax += $member_info['details']['member_debit']->i_tax ?? 0;
                                        $totalEduCess += $member_info['details']['member_debit']->ecess ?? 0;
                                        $totalPlInsur += $member_info['details']['member_debit']->pli ?? 0;
                                        $totalMiscDebit += $member_info['details']['member_debit']->misc1 ?? 0;
                                        $totalMiscDebitIt += $member_info['details']['member_debit']->misc2 ?? 0;
                                        $totalNps10Rec += $member_info['details']['member_debit']->gpa_sub ?? 0;
                                        $totalCgeisArr += $member_info['details']['member_debit']->cgeis_arr ?? 0;
                                        $totalCghsArr += $member_info['details']['member_debit']->cghs_arr ?? 0;
                                        $totalPenalIntr += $member_info['details']['member_debit']->penal_intr ?? 0;
                                        $totalElec += $member_info['details']['member_debit']->elec ?? 0;
                                        $totalWater += $member_info['details']['member_debit']->water ?? 0;
                                        $totalFurn += $member_info['details']['member_debit']->furn ?? 0;
                                        $totalMiscRent += $member_info['details']['member_debit']->misc3misc3 ?? 0;
                                        $totalcredit += $member_info['details']['member_credit']->tot_credits ?? 0;
                                        $totalDebit += $member_info['details']['member_debit']->tot_debits ?? 0;
                                        $totalNetPay += $member_info['details']['member_debit']->net_pay ?? 0;

                                        $totalTableRec +=
                                            ($member_info['details']['member_recovery']?->ccs_sub ?? 0) +
                                            ($member_info['details']['member_recovery']?->wel_sub ?? 0) +
                                            ($member_info['details']['member_recovery']?->ptax ?? 0);

                                        // totalcredit total credits and totalDebit total debits

                                        //Loans
                                        $totalHbaInst += $member_info['details']['member_loans']['hba_inst'] ?? 0;
                                        $totalCompInst += $member_info['details']['member_loans']['comp_inst'] ?? 0;
                                        $totalEduInst += $member_info['details']['member_loans']['edu_inst'] ?? 0;
                                        $totalCarBikeInst += $member_info['details']['member_loans']['car_inst'] ?? 0;

                                        // total loans
                                        $totalLoans +=
                                            $totalHbaInst + $totalCompInst + $totalEduInst + $totalCarBikeInst;
                                        $total_credits_first =
                                            $member_info['details']['member_credit']->tot_credits ?? 0;
                                    @endphp

                                    <tr>
                                        <td valign="top"
                                            style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000; border-right: 1px solid #000; border-bottom: 1px solid #000;">
                                            {{ $key + 1 }}<br>
                                            {{ $member_info['member_data']->name ?? 'N/A' }}<br>
                                            {{ $member_info['member_data']->emp_id ?? 'N/A' }}<br>
                                            {{ $member_info['member_data']['desigs']->designation ?? 'N/A' }}<br>
                                            {{ $member_info['details']['member_core_info']->bank_acc_no ?? '0000-0000-0000-00' }}<br>
                                            {{ $member_info['details']['member_core_info']['banks']->ifsc ?? 'N/A' }}
                                        </td>
                                        <td valign="top"
                                            style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000; border-right: 1px solid #000; border-bottom: 1px solid #000;">
                                            {{ $member_info['member_data']->pm_level ?? 'N/A' }}<br>
                                            {{ $member_info['member_data']->dob ?? '' }} <br>
                                            {{ $member_info['details']['member_core_info']->gpf_acc_no ?? 'N/A' }}/{{ $member_info['member_data']->pran_number ?? 'N/A' }}
                                            <br>
                                            {{ $member_info['member_data']->doj_lab ?? '' }}<br>
                                            {{ $member_info['details']['member_credit']->var_incr ?? 'N/A' }}<br>
                                            {{ $member_info['member_data']->next_inr ?? 'N/A' }}<br>
                                            {{ $member_info['details']['member_core_info']->pan_no ?? 'N/A' }}

                                        </td>
                                        <td valign="top"
                                            style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                             margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000; border-right: 1px solid #000;border-bottom: 1px solid #000; border-bottom: 1px solid #000;">
                                            {{ round($member_info['details']['member_credit']->pay ?? 0) }}<br>
                                            {{ round($member_info['details']['member_credit']->da ?? 0) }}<br>
                                            {{ round($member_info['details']['member_credit']->hra ?? 0) }}<br>
                                            {{ round($member_info['details']['member_credit']->tpt ?? 0) }}<br>
                                            {{ round($member_info['details']['member_credit']->da_on_tpt ?? 0) }}<br>
                                            {{ round($member_info['details']['member_credit']->s_pay ?? 0) }}<br>
                                            {{ round($member_info['details']['member_credit']->var_incr ?? 0) }}

                                        </td>
                                        <td valign="top"
                                            style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                             margin: 0px 0px !important; text-transform: uppercase;border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
                                            {{ round($member_info['details']['member_credit']->spl_incentive ?? 0) }}<br>
                                            {{ round($member_info['details']['member_credit']->incentive ?? 0) }}<br>
                                            {{ round($member_info['details']['member_credit']->dis_alw ?? 0) }}<br>
                                            {{ round($member_info['details']['member_credit']->variable_amount ?? 0) }}<br>
                                            {{ round($member_info['details']['member_credit']->arrs_pay_alw ?? 0) }}<br>
                                            {{ round($member_info['details']['member_credit']->risk_alw ?? 0) }}


                                        </td>
                                        <td valign="top"
                                            style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                             margin: 0px 0px !important; text-transform: uppercase; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
                                            0 <br>
                                            0 <br>
                                            0 <br>
                                            {{ round($member_info['details']['member_credit']->misc1 ?? 0) }}<br>
                                            {{ round($member_info['details']['member_credit']->misc2 ?? 0) }}

                                        </td>
                                        <td valign="top"
                                            style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                             margin: 0px 0px !important; text-transform: uppercase; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
                                            {{ round($member_info['details']['member_debit']->gpa_sub ?? 0) }}<br>
                                            {{ round($member_info['details']['member_debit']->gpf_adv ?? 0) }}<br>
                                            {{ round($member_info['details']['member_debit']->cgegis ?? 0) }}<br>
                                            {{ round($member_info['details']['member_debit']->cghs ?? 0) }}<br>

                                        </td>

                                        <td valign="top"
                                            style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                             margin: 0px 0px !important; text-transform: uppercase; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">

                                            {{ round($member_info['details']['member_debit']->ltc ?? 0) }}
                                            <br>
                                            {{ round($member_info['details']['member_debit']->medi ?? 0) }}
                                            <br>
                                            {{ round($member_info['details']['member_debit']->tada ?? 0) }}
                                            <br>
                                            {{ round($member_info['details']['member_debit']->leave_rec ?? 0) }}

                                        </td>
                                        <td valign="top"
                                            style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                             margin: 0px 0px !important; text-transform: uppercase; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
                                            {{ round($member_info['details']['member_debit']->pension_rec ?? 0) }}
                                            <br>
                                            {{ round($member_info['details']['member_debit']->i_tax ?? 0) }}
                                            <br>
                                            {{ round($member_info['details']['member_debit']->ecess ?? 0) }}
                                            <br>
                                            {{ round($member_info['details']['member_debit']->pli ?? 0) }}
                                            <br>
                                            {{ round($member_info['details']['member_debit']->misc1 ?? 0) }}
                                            <br>
                                            {{ round($member_info['details']['member_debit']->misc2 ?? 0) }}

                                        </td>
                                        <td valign="top"
                                            style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                             margin: 0px 0px !important; text-transform: uppercase; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
                                            0 <br>
                                            0 <br>
                                            0 <br>
                                            0 <br>
                                            0 <br>
                                            0 <br>
                                            0
                                        </td>
                                        <td valign="top"
                                            style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                         margin: 0px 0px !important; text-transform: uppercase; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
                                            {{ round($member_info['details']['member_debit']->cghs_arr ?? 0) }}
                                            <br>
                                            {{ round($member_info['details']['member_debit']->cgeis_arr ?? 0) }}
                                            <br>
                                            {{ round($member_info['details']['member_debit']->penal_intr ?? 0) }}
                                            <br>

                                        </td>
                                        <td valign="top"
                                            style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                         margin: 0px 0px !important; text-transform: uppercase; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
                                            {{ round($member_info['details']['member_loans']['hba_inst'] ?? 0) }}
                                            <br>
                                            {{ round($member_info['details']['member_loans']['comp_inst'] ?? 0) }}
                                            <br>
                                            {{ round($member_info['details']['member_loans']['edu_inst'] ?? 0) }}
                                            <br>
                                            {{ round($member_info['details']['member_loans']['car_inst'] ?? 0) }}
                                            @php

                                                $allLoans =
                                                    $member_info['details']['member_loans']['hba_inst'] +
                                                    $member_info['details']['member_loans']['comp_inst'] +
                                                    $member_info['details']['member_loans']['edu_inst'] +
                                                    $member_info['details']['member_loans']['car_inst'];
                                            @endphp
                                        </td>
                                        <td valign="top"
                                            style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                             margin: 0px 0px !important; text-transform: uppercase; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
                                            0 <br>
                                            {{ round($member_info['details']['member_debit']->elec ?? 0) }}
                                            <br>
                                            {{ round($member_info['details']['member_debit']->water ?? 0) }}
                                            <br>
                                            {{ round($member_info['details']['member_debit']->furn ?? 0) }}
                                            <br>
                                            {{ round($member_info['details']['member_debit']->misc3 ?? 0) }}

                                        </td>
                                        <td valign="top"
                                            style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                             margin: 0px 0px !important; text-transform: uppercase; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
                                            {{ round($total_credits_first + ($member_info['details']['member_credit']->var_incr ?? 0)) }}<br>
                                            {{ round(($member_info['details']['member_debit']->tot_debits ?? 0) + ($allLoans ?? 0)) }}<br>
                                            {{ round($total_credits_first + ($member_info['details']['member_credit']->var_incr ?? 0) - (($member_info['details']['member_debit']->tot_debits ?? 0) + ($allLoans ?? 0))) }}<br>
                                            {{ round(
                                                ($member_info['details']['member_recovery']?->ccs_sub ?? 0) +
                                                    ($member_info['details']['member_recovery']?->wel_sub ?? 0) +
                                                    ($member_info['details']['member_recovery']?->ptax ?? 0),
                                                2,
                                            ) }}<br>

                                            0 <br>
                                        </td>
                                        <td valign="top"
                                            style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                         margin: 0px 0px !important; text-transform: uppercase; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
                                        </td>
                                    </tr>
                                @endforeach

                            <tfoot>




                                <tr>
                                    <td colspan="2" valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000; border-right: 1px solid #000; border-bottom: 1px solid #000;">
                                        Page {{ $chunkKey + 1 }} Total
                                    </td>

                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                             margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000; border-right: 1px solid #000;border-bottom: 1px solid #000; border-bottom: 1px solid #000;">
                                        {{ round($totalBasicPay ?? 0) }} <br>
                                        {{ round($totalDa ?? 0) }} <br>
                                        {{ round($totalHra ?? 0) }} <br>
                                        {{ round($totalTpt ?? 0) }} <br>
                                        {{ round($totalDaOnTpt ?? 0) }} <br>
                                        {{ round($totalSpay ?? 0) }} <br>
                                        {{ round($totalVarIncr ?? 0) }} <br>

                                    </td>
                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                             margin: 0px 0px !important; text-transform: uppercase;border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
                                        {{ round($totalSplIncent ?? 0) }} <br>
                                        {{ round($totalIncentive ?? 0) }} <br>
                                        {{ round($totaldressAllow ?? 0) }} <br>
                                        {{ round($totalVariableAmount ?? 0) }} <br>
                                        {{ round($totalPayAllow ?? 0) }} <br>
                                        {{ round($totalRiskAllow ?? 0) }}


                                    </td>
                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                             margin: 0px 0px !important; text-transform: uppercase; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
                                        0 <br>
                                        0 <br>
                                        0 <br>
                                        {{ round($totalMiscCreditIt ?? 0) }}<br>
                                        {{ round($totalMiscCredit ?? 0) }}<br>

                                    </td>
                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                             margin: 0px 0px !important; text-transform: uppercase; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
                                        {{ round($totalGpfSub ?? 0) }} <br>
                                        {{ round($totalGpfAdv ?? 0) }} <br>
                                        {{ round($totalCgegis ?? 0) }} <br>
                                        {{ round($totalCghs ?? 0) }} <br>

                                    </td>

                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                             margin: 0px 0px !important; text-transform: uppercase; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">

                                        {{ round($totalLtc ?? 0) }} <br>
                                        {{ round($totalMedDebit ?? 0) }} <br>
                                        {{ round($totalTada ?? 0) }} <br>
                                        {{ round($totalLeaveRec ?? 0) }}

                                    </td>
                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                             margin: 0px 0px !important; text-transform: uppercase; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
                                        {{ round($totalPensionRec ?? 0) }} <br>
                                        {{ round($totalIncomeTax ?? 0) }} <br>
                                        {{ round($totalEduCess ?? 0) }} <br>
                                        {{ round($totalPlInsur ?? 0) }} <br>
                                        {{ round($totalMiscDebit ?? 0) }} <br>
                                        {{ round($totalMiscDebitIt ?? 0) }}

                                    </td>
                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                             margin: 0px 0px !important; text-transform: uppercase; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
                                        {{ round($totalNps10Rec ?? 0) }} <br>
                                        {{ round($totalIncomeTax ?? 0) }} <br>
                                        {{ round($totalEduCess ?? 0) }} <br>
                                        {{ round($totalPlInsur ?? 0) }} <br>
                                        {{ round($totalMiscDebit ?? 0) }} <br>
                                        {{ round($totalMiscDebitIt ?? 0) }}

                                    </td>
                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                         margin: 0px 0px !important; text-transform: uppercase; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
                                        {{ round($totalCghsArr ?? 0) }}<br>
                                        {{ round($totalCgeisArr ?? 0) }}<br>
                                        0
                                    </td>
                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                         margin: 0px 0px !important; text-transform: uppercase; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
                                        {{ round($totalHbaInst ?? 0) }}<br>
                                        {{ round($totalCompInst ?? 0) }}<br>
                                        {{ round($totalEduInst ?? 0) }}<br>
                                        {{ round($totalCarBikeInst ?? 0) }}

                                    </td>
                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                             margin: 0px 0px !important; text-transform: uppercase; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
                                        0 <br>
                                        {{ round($totalElec ?? 0) }}<br>
                                        {{ round($totalWater ?? 0) }}<br>
                                        {{ round($totalFurn ?? 0) }}<br>
                                        {{ round($totalMiscRent ?? 0) }}
                                    </td>
                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                             margin: 0px 0px !important; text-transform: uppercase; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
                                        {{ round(($totalcredit ?? 0) + ($totalVarIncr ?? 0)) }} <br>
                                        {{ round(($totalDebit ?? 0) + ($totalLoans ?? 0)) }} <br>
                                        {{ round((($totalcredit ?? 0) + ($totalVarIncr ?? 0)) - (($totalDebit ?? 0) + ($totalLoans ?? 0))) }} <br>
                                        {{ round($totalTableRec ?? 0) }}
                                    </td>
                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                         margin: 0px 0px !important; text-transform: uppercase; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
                                    </td>
                                </tr>
                            </tfoot>


                </tr>
            </tbody>
        </table>

        @if (!$loop->last)
            <div class="page-break"></div>
        @endif
    @endforeach

</body>

</html>
