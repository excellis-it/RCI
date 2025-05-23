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

    @php
        $pageArrayBasicPay = [];
        $pageArrayDa = [];
        $pageArrayHra = [];
        $pageArrayTpt = [];
        $pageArrayDaOnTpt = [];
        $pageArraySpay = [];
        $pageArrayVarIncr = [];
        $pageArraySplIncent = [];
        $pageArrayIncentive = [];
        $pageArraydressAllow = [];
        $pageArrayVariableAmount = [];
        $pageArrayPayAllow = [];
        $pageArrayRiskAllow = [];
        $pageArrayMiscCreditIt = [];
        $pageArrayMiscCredit = [];
        $pageArrayGpfSub = [];
        $pageArrayGpfAdv = [];
        $pageArrayCgegis = [];
        $pageArrayCghs = [];

        $pageArrayLtc = [];
        $pageArrayMedDebit = [];
        $pageArrayTada = [];
        $pageArrayLeaveRec = [];
        $pageArrayPensionRec = [];
        $pageArrayIncomeTax = [];
        $pageArrayEduCess = [];
        $pageArrayPlInsur = [];
        $pageArrayMiscDebit = [];
        $pageArrayMiscDebitIt = [];
        $pageArrayNps10Rec = [];
        $pageArrayCghsArr = [];
        $pageArrayCgeisArr = [];
        $pageArrayPenalIntr = [];
        $pageArrayElec = [];
        $pageArrayWater = [];
        $pageArrayFurn = [];
        $pageArrayMiscRent = [];
        $pageArraycredit = [];
        $pageArrayDebit = [];
        $pageArrayNetPay = [];
        $pageArrayTableRec = [];

        //Loans
        $pageArrayHbaInst = [];
        $pageArrayCompInst = [];
        $pageArrayEduInst = [];
        $pageArrayCarBikeInst = [];

        $pageArrayLoans = [];
        $pageArrayNpscCreditIt = [];
        $pageArrayNpgArrsCreditIt = [];
        $pageArrayNpgAdgCredit = [];
        $pageArrayHbaAdv = [];
        $pageArrayCarAdv = [];
        $pageArrayEduAdv = [];
        $pageArrayCompAdv = [];
        $pageArrayNpsg = [];
        $pageArrayNpsgArr = [];
        $pageArrayNpsAdj = [];
        $pageArray_nps_10_rec = [];
        $pageArray_nps_10_arr = [];
        $pageArray_nps_14_adj = [];
        $pageArrayPayslipPay = [];

        // These should also be initialized per chunk for accurate sums
        $singlepageArrayCredit = [];
        $singlepageArrayDebit = [];
        $singleNetPay_array = [];
        $singlePayslipPay_array = [];
        $pageArraySingleTableRec = [];
    @endphp

    @foreach ($groupedData as $chunkKey => $chunkData)
        @php
            // Initialize all arrays for the current chunkKey to 0 before processing members
            $pageArrayBasicPay[$chunkKey] = 0;
            $pageArrayDa[$chunkKey] = 0;
            $pageArrayHra[$chunkKey] = 0;
            $pageArrayTpt[$chunkKey] = 0;
            $pageArrayDaOnTpt[$chunkKey] = 0;
            $pageArraySpay[$chunkKey] = 0;
            $pageArrayVarIncr[$chunkKey] = 0;
            $pageArraySplIncent[$chunkKey] = 0;
            $pageArrayIncentive[$chunkKey] = 0;
            $pageArraydressAllow[$chunkKey] = 0;
            $pageArrayVariableAmount[$chunkKey] = 0;
            $pageArrayPayAllow[$chunkKey] = 0;
            $pageArrayRiskAllow[$chunkKey] = 0;
            $pageArrayNpscCreditIt[$chunkKey] = 0;
            $pageArrayNpgArrsCreditIt[$chunkKey] = 0;
            $pageArrayNpgAdgCredit[$chunkKey] = 0;
            $pageArrayMiscCreditIt[$chunkKey] = 0;
            $pageArrayMiscCredit[$chunkKey] = 0;
            $pageArrayGpfSub[$chunkKey] = 0;
            $pageArrayGpfAdv[$chunkKey] = 0;
            $pageArrayCgegis[$chunkKey] = 0;
            $pageArrayCghs[$chunkKey] = 0;
            $pageArrayHbaAdv[$chunkKey] = 0;
            $pageArrayCarAdv[$chunkKey] = 0;
            $pageArrayEduAdv[$chunkKey] = 0;
            $pageArrayCompAdv[$chunkKey] = 0;
            $pageArrayLtc[$chunkKey] = 0;
            $pageArrayMedDebit[$chunkKey] = 0;
            $pageArrayTada[$chunkKey] = 0;
            $pageArrayLeaveRec[$chunkKey] = 0;
            $pageArrayPensionRec[$chunkKey] = 0;
            $pageArrayIncomeTax[$chunkKey] = 0;
            $pageArrayEduCess[$chunkKey] = 0;
            $pageArrayPlInsur[$chunkKey] = 0;
            $pageArrayMiscDebit[$chunkKey] = 0;
            $pageArrayMiscDebitIt[$chunkKey] = 0;
            $pageArrayNpsg[$chunkKey] = 0;
            $pageArrayNpsgArr[$chunkKey] = 0;
            $pageArrayNpsAdj[$chunkKey] = 0;
            $pageArray_nps_10_rec[$chunkKey] = 0;
            $pageArray_nps_10_arr[$chunkKey] = 0;
            $pageArray_nps_14_adj[$chunkKey] = 0;
            $pageArrayCgeisArr[$chunkKey] = 0;
            $pageArrayCghsArr[$chunkKey] = 0;
            $pageArrayPenalIntr[$chunkKey] = 0;
            $pageArrayElec[$chunkKey] = 0;
            $pageArrayWater[$chunkKey] = 0;
            $pageArrayFurn[$chunkKey] = 0;
            $pageArrayMiscRent[$chunkKey] = 0;
            $pageArraycredit[$chunkKey] = 0;
            $pageArrayDebit[$chunkKey] = 0;
            $pageArrayNetPay[$chunkKey] = 0;
            $pageArrayTableRec[$chunkKey] = 0;
            $pageArrayPayslipPay[$chunkKey] = 0;

            // Initialize single-member sums for the current chunk
            $singlepageArrayCredit[$chunkKey] = 0;
            $singlepageArrayDebit[$chunkKey] = 0;
            $singleNetPay_array[$chunkKey] = 0;
            $singlePayslipPay_array[$chunkKey] = 0;
            $pageArraySingleTableRec[$chunkKey] = 0;
        @endphp


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
                                        PAY BILL {{ $pay_bill_no ?? 'N/A' }} FOR THE MONTH OF
                                        {{ \Illuminate\Support\Str::upper($month ?? 'N/A') }}
                                        - {{ $year ?? 'N/A' }} </br>NPS STAFF
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
                                        Unit Code : 330000110 &nbsp; &nbsp; &nbsp; <span
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
                                    <th colspan="6"
                                        style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: center; padding: 0px 5px; border: 1px solid #000; text-transform: uppercase;">
                                        DEBITS
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
                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px; border-left: 1px solid #000; border-top: 1px solid #000; border-right: 1px solid #000; text-transform: uppercase;">
                                        HBA INT<br>CAR ADV<br>CAR INT<br>EDU ADV<br>EDU INT<br>COMP ADV
                                    </td>

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
                                    {{-- <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px; border-left: 1px solid #000; border-top: 1px solid #000; border-right: 1px solid #000; text-transform: uppercase;">
                                        HBA Inst<br>Comp Inst<br>Edu Inst<br>Car/Bike Inst
                                    </td> --}}
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
                                $totalNpscCreditIt = 0;
                                $totalNpgArrsCreditIt = 0;
                                $totalNpgAdgCredit = 0;
                                $totalHbaAdv = 0;
                                $totalCarAdv = 0;
                                $totalEduAdv = 0;
                                $totalCompAdv = 0;
                                $totalNpsg = 0;
                                $totalNpsgArr = 0;
                                $totalNpsAdj = 0;
                                $total_nps_10_rec = 0;
                                $total_nps_10_arr = 0;
                                $total_nps_14_adj = 0;
                                $totalPayslipPay = 0;
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

                                        $totalNpscCreditIt += $member_info['details']['member_credit']->npsc ?? 0;
                                        $totalNpgArrsCreditIt +=
                                            $member_info['details']['member_credit']->npg_arrs ?? 0;
                                        $totalNpgAdgCredit += $member_info['details']['member_credit']->npg_adj ?? 0;
                                        $totalMiscCreditIt += $member_info['details']['member_credit']->misc1 ?? 0;
                                        $totalMiscCredit += $member_info['details']['member_credit']->misc2 ?? 0;

                                        $totalGpfSub += $member_info['details']['member_debit']->gpa_sub ?? 0;
                                        $totalGpfAdv += $member_info['details']['member_debit']->gpf_adv ?? 0;
                                        $totalCgegis += $member_info['details']['member_debit']->cgegis ?? 0;
                                        $totalCghs += $member_info['details']['member_debit']->cghs ?? 0;
                                        $totalHbaAdv += $member_info['details']['member_loans']['hba_inst'] ?? 0;

                                        $totalCarAdv += $member_info['details']['member_loans']['car_inst'] ?? 0;
                                        $totalEduAdv += $member_info['details']['member_loans']['edu_inst'] ?? 0;
                                        $totalCompAdv += $member_info['details']['member_loans']['comp_inst'] ?? 0;

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

                                        $totalNpsg += $member_info['details']['member_debit']->npsg ?? 0;
                                        $totalNpsgArr += $member_info['details']['member_debit']->npsg_arr ?? 0;
                                        $totalNpsAdj += $member_info['details']['member_debit']->npsg_adj ?? 0;

                                        $total_nps_10_rec += $member_info['details']['member_debit']->nps_10_rec ?? 0;
                                        $total_nps_10_arr += $member_info['details']['member_debit']->nps_10_arr ?? 0;
                                        $total_nps_14_adj += $member_info['details']['member_debit']->nps_14_adj ?? 0;

                                        $totalCgeisArr += $member_info['details']['member_debit']->cgeis_arr ?? 0;
                                        $totalCghsArr += $member_info['details']['member_debit']->cghs_arr ?? 0;
                                        $totalPenalIntr += $member_info['details']['member_debit']->penal_intr ?? 0;

                                        $totalElec += $member_info['details']['member_debit']->elec ?? 0;
                                        $totalWater += $member_info['details']['member_debit']->water ?? 0;
                                        $totalFurn += $member_info['details']['member_debit']->furn ?? 0;
                                        $totalMiscRent += $member_info['details']['member_debit']->misc3 ?? 0;

                                        $singleTotalCredit =
                                            $member_info['details']['member_credit']->pay +
                                            $member_info['details']['member_credit']->da +
                                            $member_info['details']['member_credit']->hra +
                                            $member_info['details']['member_credit']->tpt +
                                            $member_info['details']['member_credit']->da_on_tpt +
                                            $member_info['details']['member_credit']->s_pay +
                                            $member_info['details']['member_credit']->var_incr +
                                            $member_info['details']['member_credit']->spl_incentive +
                                            $member_info['details']['member_credit']->incentive +
                                            $member_info['details']['member_credit']->dis_alw +
                                            $member_info['details']['member_credit']->variable_amount +
                                            $member_info['details']['member_credit']->arrs_pay_alw +
                                            $member_info['details']['member_credit']->risk_alw +
                                            $member_info['details']['member_credit']->npsc +
                                            $member_info['details']['member_credit']->npg_arrs +
                                            $member_info['details']['member_credit']->npg_adj +
                                            $member_info['details']['member_credit']->misc1 +
                                            $member_info['details']['member_credit']->misc2;

                                        $totalcredit += $singleTotalCredit;

                                        $singleTotalDebit =
                                            $member_info['details']['member_debit']->gpa_sub +
                                            $member_info['details']['member_debit']->gpf_adv +
                                            $member_info['details']['member_debit']->cgegis +
                                            $member_info['details']['member_debit']->cghs +
                                            $member_info['details']['member_loans']['hba_inst'] +
                                            $member_info['details']['member_loans']['car_inst'] +
                                            $member_info['details']['member_loans']['edu_inst'] +
                                            $member_info['details']['member_loans']['comp_inst'] +
                                            $member_info['details']['member_debit']->ltc +
                                            $member_info['details']['member_debit']->medi +
                                            $member_info['details']['member_debit']->tada +
                                            $member_info['details']['member_debit']->leave_rec +
                                            $member_info['details']['member_debit']->pension_rec +
                                            $member_info['details']['member_debit']->i_tax +
                                            $member_info['details']['member_debit']->ecess +
                                            $member_info['details']['member_debit']->pli +
                                            $member_info['details']['member_debit']->misc1 +
                                            $member_info['details']['member_debit']->misc2 +
                                            $member_info['details']['member_debit']->npsg +
                                            $member_info['details']['member_debit']->npsg_arr +
                                            $member_info['details']['member_debit']->npsg_adj +
                                            $member_info['details']['member_debit']->nps_10_rec +
                                            $member_info['details']['member_debit']->nps_10_arr +
                                            $member_info['details']['member_debit']->nps_14_adj +
                                            $member_info['details']['member_debit']->cgeis_arr +
                                            $member_info['details']['member_debit']->cghs_arr +
                                            $member_info['details']['member_debit']->penal_intr +
                                            $member_info['details']['member_debit']->elec +
                                            $member_info['details']['member_debit']->water +
                                            $member_info['details']['member_debit']->furn +
                                            $member_info['details']['member_debit']->misc3;

                                        $totalDebit += $singleTotalDebit;

                                        $singleNetPay = $singleTotalCredit - $singleTotalDebit;

                                        $totalNetPay += $totalcredit + $totalDebit;
                                        $totalSingleTableRec =
                                            ($member_info['details']['member_recovery']?->ccs_sub ?? 0) +
                                            ($member_info['details']['member_recovery']?->wel_sub ?? 0) +
                                            ($member_info['details']['member_recovery']?->ptax ?? 0) +
                                            ($member_info['details']['member_recovery']?->mess ?? 0);

                                        $totalTableRec += $totalSingleTableRec;

                                        $totalPayslipPay += $totalNetPay - $totalTableRec;

                                        $singlePayslipPay = $singleNetPay + $totalSingleTableRec;
                                    @endphp

                                    @php
                                        $pageArrayBasicPay[$chunkKey] +=
                                            $member_info['details']['member_credit']->pay ?? 0;
                                        $pageArrayDa[$chunkKey] += $member_info['details']['member_credit']->da ?? 0;
                                        $pageArrayHra[$chunkKey] += $member_info['details']['member_credit']->hra ?? 0;
                                        $pageArrayTpt[$chunkKey] += $member_info['details']['member_credit']->tpt ?? 0;
                                        $pageArrayDaOnTpt[$chunkKey] +=
                                            $member_info['details']['member_credit']->da_on_tpt ?? 0;
                                        $pageArraySpay[$chunkKey] +=
                                            $member_info['details']['member_credit']->s_pay ?? 0;
                                        $pageArrayVarIncr[$chunkKey] +=
                                            $member_info['details']['member_credit']->var_incr ?? 0;

                                        $pageArraySplIncent[$chunkKey] +=
                                            $member_info['details']['member_credit']->spl_incentive ?? 0;
                                        $pageArrayIncentive[$chunkKey] +=
                                            $member_info['details']['member_credit']->incentive ?? 0;
                                        $pageArraydressAllow[$chunkKey] +=
                                            $member_info['details']['member_credit']->dis_alw ?? 0;
                                        $pageArrayVariableAmount[$chunkKey] +=
                                            $member_info['details']['member_credit']->variable_amount ?? 0;
                                        $pageArrayPayAllow[$chunkKey] +=
                                            $member_info['details']['member_credit']->arrs_pay_alw ?? 0;
                                        $pageArrayRiskAllow[$chunkKey] +=
                                            $member_info['details']['member_credit']->risk_alw ?? 0;

                                        $pageArrayNpscCreditIt[$chunkKey] +=
                                            $member_info['details']['member_credit']->npsc ?? 0;
                                        $pageArrayNpgArrsCreditIt[$chunkKey] +=
                                            $member_info['details']['member_credit']->npg_arrs ?? 0;
                                        $pageArrayNpgAdgCredit[$chunkKey] +=
                                            $member_info['details']['member_credit']->npg_adj ?? 0;
                                        $pageArrayMiscCreditIt[$chunkKey] +=
                                            $member_info['details']['member_credit']->misc1 ?? 0;
                                        $pageArrayMiscCredit[$chunkKey] +=
                                            $member_info['details']['member_credit']->misc2 ?? 0;

                                        $pageArrayGpfSub[$chunkKey] +=
                                            $member_info['details']['member_debit']->gpa_sub ?? 0;
                                        $pageArrayGpfAdv[$chunkKey] +=
                                            $member_info['details']['member_debit']->gpf_adv ?? 0;
                                        $pageArrayCgegis[$chunkKey] +=
                                            $member_info['details']['member_debit']->cgegis ?? 0;
                                        $pageArrayCghs[$chunkKey] += $member_info['details']['member_debit']->cghs ?? 0;
                                        $pageArrayHbaAdv[$chunkKey] +=
                                            $member_info['details']['member_loans']['hba_inst'] ?? 0;

                                        $pageArrayCarAdv[$chunkKey] +=
                                            $member_info['details']['member_loans']['car_inst'] ?? 0;
                                        $pageArrayEduAdv[$chunkKey] +=
                                            $member_info['details']['member_loans']['edu_inst'] ?? 0;
                                        $pageArrayCompAdv[$chunkKey] +=
                                            $member_info['details']['member_loans']['comp_inst'] ?? 0;

                                        $pageArrayLtc[$chunkKey] += $member_info['details']['member_debit']->ltc ?? 0;
                                        $pageArrayMedDebit[$chunkKey] +=
                                            $member_info['details']['member_debit']->medi ?? 0;
                                        $pageArrayTada[$chunkKey] += $member_info['details']['member_debit']->tada ?? 0;
                                        $pageArrayLeaveRec[$chunkKey] +=
                                            $member_info['details']['member_debit']->leave_rec ?? 0;

                                        $pageArrayPensionRec[$chunkKey] +=
                                            $member_info['details']['member_debit']->pension_rec ?? 0;
                                        $pageArrayIncomeTax[$chunkKey] +=
                                            $member_info['details']['member_debit']->i_tax ?? 0;
                                        $pageArrayEduCess[$chunkKey] +=
                                            $member_info['details']['member_debit']->ecess ?? 0;
                                        $pageArrayPlInsur[$chunkKey] +=
                                            $member_info['details']['member_debit']->pli ?? 0;
                                        $pageArrayMiscDebit[$chunkKey] +=
                                            $member_info['details']['member_debit']->misc1 ?? 0;
                                        $pageArrayMiscDebitIt[$chunkKey] +=
                                            $member_info['details']['member_debit']->misc2 ?? 0;

                                        $pageArrayNpsg[$chunkKey] += $member_info['details']['member_debit']->npsg ?? 0;
                                        $pageArrayNpsgArr[$chunkKey] +=
                                            $member_info['details']['member_debit']->npsg_arr ?? 0;
                                        $pageArrayNpsAdj[$chunkKey] +=
                                            $member_info['details']['member_debit']->npsg_adj ?? 0;

                                        $pageArray_nps_10_rec[$chunkKey] +=
                                            $member_info['details']['member_debit']->nps_10_rec ?? 0;
                                        $pageArray_nps_10_arr[$chunkKey] +=
                                            $member_info['details']['member_debit']->nps_10_arr ?? 0;
                                        $pageArray_nps_14_adj[$chunkKey] +=
                                            $member_info['details']['member_debit']->nps_14_adj ?? 0;

                                        $pageArrayCgeisArr[$chunkKey] +=
                                            $member_info['details']['member_debit']->cgeis_arr ?? 0;
                                        $pageArrayCghsArr[$chunkKey] +=
                                            $member_info['details']['member_debit']->cghs_arr ?? 0;
                                        $pageArrayPenalIntr[$chunkKey] +=
                                            $member_info['details']['member_debit']->penal_intr ?? 0;

                                        $pageArrayElec[$chunkKey] += $member_info['details']['member_debit']->elec ?? 0;
                                        $pageArrayWater[$chunkKey] +=
                                            $member_info['details']['member_debit']->water ?? 0;
                                        $pageArrayFurn[$chunkKey] += $member_info['details']['member_debit']->furn ?? 0;
                                        $pageArrayMiscRent[$chunkKey] +=
                                            $member_info['details']['member_debit']->misc3 ?? 0;

                                        // Calculate singlepageArrayCredit for the current member and add it to the chunk total
                                        $currentMemberCredit =
                                            ($member_info['details']['member_credit']->pay ?? 0) +
                                            ($member_info['details']['member_credit']->da ?? 0) +
                                            ($member_info['details']['member_credit']->hra ?? 0) +
                                            ($member_info['details']['member_credit']->tpt ?? 0) +
                                            ($member_info['details']['member_credit']->da_on_tpt ?? 0) +
                                            ($member_info['details']['member_credit']->s_pay ?? 0) +
                                            ($member_info['details']['member_credit']->var_incr ?? 0) +
                                            ($member_info['details']['member_credit']->spl_incentive ?? 0) +
                                            ($member_info['details']['member_credit']->incentive ?? 0) +
                                            ($member_info['details']['member_credit']->dis_alw ?? 0) +
                                            ($member_info['details']['member_credit']->variable_amount ?? 0) +
                                            ($member_info['details']['member_credit']->arrs_pay_alw ?? 0) +
                                            ($member_info['details']['member_credit']->risk_alw ?? 0) +
                                            ($member_info['details']['member_credit']->npsc ?? 0) +
                                            ($member_info['details']['member_credit']->npg_arrs ?? 0) +
                                            ($member_info['details']['member_credit']->npg_adj ?? 0) +
                                            ($member_info['details']['member_credit']->misc1 ?? 0) +
                                            ($member_info['details']['member_credit']->misc2 ?? 0);
                                        $pageArraycredit[$chunkKey] += $currentMemberCredit;

                                        // Calculate singlepageArrayDebit for the current member and add it to the chunk total
                                        $currentMemberDebit =
                                            ($member_info['details']['member_debit']->gpa_sub ?? 0) +
                                            ($member_info['details']['member_debit']->gpf_adv ?? 0) +
                                            ($member_info['details']['member_debit']->cgegis ?? 0) +
                                            ($member_info['details']['member_debit']->cghs ?? 0) +
                                            ($member_info['details']['member_loans']['hba_inst'] ?? 0) +
                                            ($member_info['details']['member_loans']['car_inst'] ?? 0) +
                                            ($member_info['details']['member_loans']['edu_inst'] ?? 0) +
                                            ($member_info['details']['member_loans']['comp_inst'] ?? 0) +
                                            ($member_info['details']['member_debit']->ltc ?? 0) +
                                            ($member_info['details']['member_debit']->medi ?? 0) +
                                            ($member_info['details']['member_debit']->tada ?? 0) +
                                            ($member_info['details']['member_debit']->leave_rec ?? 0) +
                                            ($member_info['details']['member_debit']->pension_rec ?? 0) +
                                            ($member_info['details']['member_debit']->i_tax ?? 0) +
                                            ($member_info['details']['member_debit']->ecess ?? 0) +
                                            ($member_info['details']['member_debit']->pli ?? 0) +
                                            ($member_info['details']['member_debit']->misc1 ?? 0) +
                                            ($member_info['details']['member_debit']->misc2 ?? 0) +
                                            ($member_info['details']['member_debit']->npsg ?? 0) +
                                            ($member_info['details']['member_debit']->npsg_arr ?? 0) +
                                            ($member_info['details']['member_debit']->npsg_adj ?? 0) +
                                            ($member_info['details']['member_debit']->nps_10_rec ?? 0) +
                                            ($member_info['details']['member_debit']->nps_10_arr ?? 0) +
                                            ($member_info['details']['member_debit']->nps_14_adj ?? 0) +
                                            ($member_info['details']['member_debit']->cgeis_arr ?? 0) +
                                            ($member_info['details']['member_debit']->cghs_arr ?? 0) +
                                            ($member_info['details']['member_debit']->penal_intr ?? 0) +
                                            ($member_info['details']['member_debit']->elec ?? 0) +
                                            ($member_info['details']['member_debit']->water ?? 0) +
                                            ($member_info['details']['member_debit']->furn ?? 0) +
                                            ($member_info['details']['member_debit']->misc3 ?? 0);
                                        $pageArrayDebit[$chunkKey] += $currentMemberDebit;

                                        $currentMemberNetPay = $currentMemberCredit - $currentMemberDebit;
                                        $pageArrayNetPay[$chunkKey] += $currentMemberNetPay; // Summing net pay for the chunk

                                        $currentMemberTableRec =
                                            ($member_info['details']['member_recovery']?->ccs_sub ?? 0) +
                                            ($member_info['details']['member_recovery']?->wel_sub ?? 0) +
                                            ($member_info['details']['member_recovery']?->ptax ?? 0) +
                                            ($member_info['details']['member_recovery']?->mess ?? 0);
                                        $pageArrayTableRec[$chunkKey] += $currentMemberTableRec;

                                        // This calculates the payslip pay for the *current member* and adds it to the chunk total
                                        $pageArrayPayslipPay[$chunkKey] +=
                                            $currentMemberNetPay - $currentMemberTableRec;
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
                                            {{ !empty($member_info['details']['member_core_info']->gpf_acc_no) ? $member_info['details']['member_core_info']->gpf_acc_no . '/' : '' }}
                                            {{ $member_info['member_data']->pran_number ?? 'N/A' }}
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
                                            {{ round($member_info['details']['member_credit']->npsc ?? 0) }} <br>
                                            {{ round($member_info['details']['member_credit']->npg_arrs ?? 0) }} <br>
                                            {{ round($member_info['details']['member_credit']->npg_adj ?? 0) }} <br>
                                            {{ round($member_info['details']['member_credit']->misc1 ?? 0) }}<br>
                                            {{ round($member_info['details']['member_credit']->misc2 ?? 0) }}

                                        </td>
                                        <td valign="top"
                                            style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                             margin: 0px 0px !important; text-transform: uppercase; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
                                            {{ round($member_info['details']['member_debit']->gpa_sub ?? 0) }}<br>
                                            {{ round($member_info['details']['member_debit']->gpf_adv ?? 0) }}<br>
                                            0 <br>
                                            {{ round($member_info['details']['member_debit']->cgegis ?? 0) }}<br>
                                            {{ round($member_info['details']['member_debit']->cghs ?? 0) }}<br>
                                            {{ round($member_info['details']['member_loans']['hba_inst'] ?? 0) }}<br>

                                        </td>
                                        <td valign="top"
                                            style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                         margin: 0px 0px !important; text-transform: uppercase; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
                                            0<br>
                                            {{ round($member_info['details']['member_loans']['car_inst'] ?? 0) }}<br>
                                            0 <br>
                                            {{ round($member_info['details']['member_loans']['edu_inst'] ?? 0) }}<br>
                                            0<br>
                                            {{ round($member_info['details']['member_loans']['comp_inst'] ?? 0) }} <br>

                                        </td>

                                        <td valign="top"
                                            style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                             margin: 0px 0px !important; text-transform: uppercase; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
                                            0 <br>
                                            0 <br>
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
                                            {{ round($member_info['details']['member_debit']->nps_10_rec ?? 0) }} <br>
                                            {{ round($member_info['details']['member_debit']->npsg ?? 0) }}<br>
                                            {{ round($member_info['details']['member_debit']->nps_10_arr ?? 0) }} <br>
                                            {{ round($member_info['details']['member_debit']->npsg_arr ?? 0) }}<br>
                                            {{ round($member_info['details']['member_debit']->npsg_adj ?? 0) }}<br>
                                            {{ round($member_info['details']['member_debit']->nps_14_adj ?? 0) }}<br>
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
                                        {{-- <td valign="top"
                                            style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                         margin: 0px 0px !important; text-transform: uppercase; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
                                            {{ round($member_info['details']['member_loans']['hba_inst'] ?? 0) }}
                                            <br>
                                            {{ round($member_info['details']['member_loans']['comp_inst'] ?? 0) }}
                                            <br>
                                            {{ round($member_info['details']['member_loans']['edu_inst'] ?? 0) }}
                                            <br>
                                            {{ round($member_info['details']['member_loans']['car_inst'] ?? 0) }}

                                        </td> --}}


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
                                            {{ round($singleTotalCredit ?? 0) }}<br>
                                            {{ round($singleTotalDebit) }}<br>
                                            {{ round($singleNetPay) }}<br>
                                            {{ round($totalSingleTableRec) }}<br>
                                            {{ round($singlePayslipPay) }} <br>

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
                                        {{ round($totalNpscCreditIt) }} <br>
                                        {{ round($totalNpgArrsCreditIt) }} <br>
                                        {{ round($totalNpgAdgCredit) }} <br>
                                        {{ round($totalMiscCreditIt ?? 0) }}<br>
                                        {{ round($totalMiscCredit ?? 0) }}<br>

                                    </td>
                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                             margin: 0px 0px !important; text-transform: uppercase; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
                                        {{ round($totalGpfSub ?? 0) }} <br>
                                        {{ round($totalGpfAdv ?? 0) }} <br>
                                        0 <br>
                                        {{ round($totalCgegis ?? 0) }} <br>
                                        {{ round($totalCghs ?? 0) }} <br>
                                        {{ round($totalHbaAdv ?? 0) }} <br>
                                    </td>

                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                         margin: 0px 0px !important; text-transform: uppercase; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
                                        0 <br>
                                        {{ round($totalCarAdv ?? 0) }} <br>
                                        0 <br>
                                        {{ round($totalEduAdv ?? 0) }} <br>
                                        0 <br>
                                        {{ round($totalCompAdv ?? 0) }}

                                    </td>
                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                             margin: 0px 0px !important; text-transform: uppercase; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
                                        0 <br>
                                        0 <br>
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
                                        {{ round($total_nps_10_rec) }} <br>
                                        {{ round($totalNpsg ?? 0) }} <br>
                                        {{ round($total_nps_10_arr) }}<br>
                                        {{ round($totalNpsgArr ?? 0) }} <br>
                                        {{ round($totalNpsAdj ?? 0) }} <br>
                                        {{ round($totalNpsAdj) }}
                                    </td>
                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                         margin: 0px 0px !important; text-transform: uppercase; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
                                        {{ round($totalCghsArr ?? 0) }}<br>
                                        {{ round($totalCgeisArr ?? 0) }}<br>
                                        {{ round($totalPenalIntr ?? 0) }}

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
                                        {{ round($totalcredit ?? 0) }}<br>
                                        {{ round($totalDebit) }}<br>
                                        {{ round($totalNetPay) }}<br>
                                        {{ round($totalTableRec) }}<br>
                                        {{ round($totalPayslipPay) }} <br>
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

        {{-- @if (!$loop->last) --}}
        <div class="page-break"></div>
        {{-- @endif --}}
    @endforeach

    <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff"
        style="border-radius: 0px; margin: 0 auto; text-align: center">
        <tbody>

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
                  text-align: left;
                  padding: 0px 5px !important;
                  margin: 0px 0px !important;
                ">
                                    {{-- Lorem Ipsum is simply dummy text --}}
                                    <br>
                                    PAY BILL {{ $pay_bill_no ?? 'N/A' }} FOR THE MONTH OF
                                    {{ \Illuminate\Support\Str::upper($month ?? 'N/A') }}
                                    - {{ $year ?? 'N/A' }} </br>NPS STAFF
                                </td>
                                <td
                                    style="
                  font-size: 15px;
                  line-height: 18px;
                  font-weight: 400;
                  color: #000;
                  text-align: right;
                  padding: 0px 5px !important;
                  margin: 0px 0px !important;
                ">
                                    <span style="font-weight:600;">Center For High Energy Systems and Science </span>
                                    <br>
                                    Unit Code : 330000110
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding: 0px 0px 10px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                            <tr>
                                <td
                                    style="
                  font-size: 18px;
                  line-height: 14px;
                  font-weight: 500;
                  color: #000;
                  text-align: center;
                  padding: 0px 5px !important;
                  margin: 0px 0px !important;
                  text-transform: uppercase;
                  text-decoration: underline;
                ">
                                    CREDIT SUMMARY REPORT FOR BILLNO
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
                                <th
                                    style="
                  font-size: 10px;
                  line-height: 14px;
                  font-weight: 600;
                  color: #000;
                  text-align: left;
                  padding: 0px 5px !important;
                  margin: 0px 0px !important;
                  border-top: 1px solid #000;
                  border-left: 1px solid #000;
                  background: #cdcdcd;
                ">
                                    Page No
                                </th>
                                <th
                                    style="
                  font-size: 10px;
                  line-height: 14px;
                  font-weight: 600;
                  color: #000;
                  text-align: left;
                  padding: 0px 5px !important;
                  margin: 0px 0px !important;
                  border-top: 1px solid #000;
                  border-left: 1px solid #000;
                  background: #cdcdcd;
                ">
                                    BASIC PAY
                                </th>
                                <th
                                    style="
                  font-size: 10px;
                  line-height: 14px;
                  font-weight: 600;
                  color: #000;
                  text-align: left;
                  padding: 0px 5px !important;
                  margin: 0px 0px !important;
                  border-top: 1px solid #000;
                  border-left: 1px solid #000;
                  background: #cdcdcd;
                ">
                                    DA
                                </th>
                                <th
                                    style="
                  font-size: 10px;
                  line-height: 14px;
                  font-weight: 600;
                  color: #000;
                  text-align: left;
                  padding: 0px 5px !important;
                  margin: 0px 0px !important;
                  border-top: 1px solid #000;
                  border-left: 1px solid #000;
                  background: #cdcdcd;
                ">
                                    HRA
                                </th>
                                <th
                                    style="
                  font-size: 10px;
                  line-height: 14px;
                  font-weight: 600;
                  color: #000;
                  text-align: left;
                  padding: 0px 5px !important;
                  margin: 0px 0px !important;
                  border-top: 1px solid #000;
                  border-left: 1px solid #000;
                  background: #cdcdcd;
                ">
                                    TPT ALLOW
                                </th>
                                <th
                                    style="
                  font-size: 10px;
                  line-height: 14px;
                  font-weight: 600;
                  color: #000;
                  text-align: left;
                  padding: 0px 5px !important;
                  margin: 0px 0px !important;
                  border-top: 1px solid #000;
                  border-left: 1px solid #000;
                  background: #cdcdcd;
                ">
                                    TPTDA
                                </th>
                                <th
                                    style="
                  font-size: 10px;
                  line-height: 14px;
                  font-weight: 600;
                  color: #000;
                  text-align: left;
                  padding: 0px 5px !important;
                  margin: 0px 0px !important;
                  border-left: 1px solid #000;
                  border-top: 1px solid #000;
                  border-right: 1px solid #000;
                  background: #cdcdcd;
                ">
                                    SPL PAY
                                </th>
                                <th
                                    style="
            font-size: 10px;
            line-height: 14px;
            font-weight: 600;
            color: #000;
            text-align: left;
            padding: 0px 5px !important;
            margin: 0px 0px !important;
            border-top: 1px solid #000;
            border-right: 1px solid #000;
            background: #cdcdcd;
          ">
                                    SPL INCENTE
                                </th>
                                <th
                                    style="
      font-size: 10px;
      line-height: 14px;
      font-weight: 600;
      color: #000;
      text-align: left;
      padding: 0px 5px !important;
      margin: 0px 0px !important;
      border-top: 1px solid #000;
      border-right: 1px solid #000;
      background: #cdcdcd;
    ">
                                    INCENTIVE
                                </th>
                                <th
                                    style="
font-size: 10px;
line-height: 14px;
font-weight: 600;
color: #000;
text-align: left;
padding: 0px 5px !important;
margin: 0px 0px !important;
border-top: 1px solid #000;
border-right: 1px solid #000;
background: #cdcdcd;
">
                                    DRESS ALLWN
                                </th>
                                <th
                                    style="
font-size: 10px;
line-height: 14px;
font-weight: 600;
color: #000;
text-align: left;
padding: 0px 5px !important;
margin: 0px 0px !important;
border-top: 1px solid #000;
border-right: 1px solid #000;
background: #cdcdcd;
">
                                    VARIABLE AMT
                                </th>
                                <th
                                    style="
font-size: 10px;
line-height: 14px;
font-weight: 600;
color: #000;
text-align: left;
padding: 0px 5px !important;
margin: 0px 0px !important;
border-top: 1px solid #000;
border-right: 1px solid #000;
background: #cdcdcd;
">
                                    ARRS OF PAY & ALLOW
                                </th>
                                <th
                                    style="
font-size: 10px;
line-height: 14px;
font-weight: 600;
color: #000;
text-align: left;
padding: 0px 5px !important;
margin: 0px 0px !important;
border-top: 1px solid #000;
border-right: 1px solid #000;
background: #cdcdcd;
">
                                    RISK ALLWN
                                </th>
                                <th
                                    style="
font-size: 10px;
line-height: 14px;
font-weight: 600;
color: #000;
text-align: left;
padding: 0px 5px !important;
margin: 0px 0px !important;
border-top: 1px solid #000;
border-right: 1px solid #000;
background: #cdcdcd;
">
                                    NPSC 14%
                                </th>
                                <th
                                    style="
font-size: 10px;
line-height: 14px;
font-weight: 600;
color: #000;
text-align: left;
padding: 0px 5px !important;
margin: 0px 0px !important;
border-top: 1px solid #000;
border-right: 1px solid #000;
background: #cdcdcd;
">
                                    NPSG ARRS 14%
                                </th>
                                <th
                                    style="
font-size: 10px;
line-height: 14px;
font-weight: 600;
color: #000;
text-align: left;
padding: 0px 5px !important;
margin: 0px 0px !important;
border-top: 1px solid #000;
border-right: 1px solid #000;
background: #cdcdcd;
">
                                    NPS ADJ14%
                                </th>
                                <th
                                    style="
font-size: 10px;
line-height: 14px;
font-weight: 600;
color: #000;
text-align: left;
padding: 0px 5px !important;
margin: 0px 0px !important;
border-top: 1px solid #000;
border-right: 1px solid #000;
background: #cdcdcd;
">
                                    MISC CREDIT (IT)
                                </th>
                                <th
                                    style="
font-size: 10px;
line-height: 14px;
font-weight: 600;
color: #000;
text-align: left;
padding: 0px 5px !important;
margin: 0px 0px !important;
border-top: 1px solid #000;
border-right: 1px solid #000;
background: #cdcdcd;
">
                                    MISC CREDIT
                                </th>
                                <th
                                    style="
font-size: 10px;
line-height: 14px;
font-weight: 600;
color: #000;
text-align: left;
padding: 0px 5px !important;
margin: 0px 0px !important;
border-top: 1px solid #000;
border-right: 1px solid #000;
background: #cdcdcd;
">
                                    CREDITS
                                </th>
                            </tr>
                        </thead>
                        <tbody>
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
            height: 20px;
            border-left: 1px solid #000;
            border-top: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    1
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
            height: 20px;
            border-left: 1px solid #000;
            border-top: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    125800
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
            height: 20px;
            border-left: 1px solid #000;
            border-top: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    66674
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
            height: 20px;
            border-left: 1px solid #000;
            border-top: 1px solid #000;
            border-bottom: 1px solid #000;
          ">

                                    12330
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
            height: 20px;
            border-left: 1px solid #000;
            border-top: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    12300
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
            height: 20px;
            border-left: 1px solid #000;
            border-top: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    5724
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
            height: 20px;
            border-top: 1px solid #000;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
            border-left: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-top: 1px solid #000;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-top: 1px solid #000;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-top: 1px solid #000;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-top: 1px solid #000;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-top: 1px solid #000;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-top: 1px solid #000;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-top: 1px solid #000;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-top: 1px solid #000;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-top: 1px solid #000;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-top: 1px solid #000;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-top: 1px solid #000;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-top: 1px solid #000;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
                                </td>
                            </tr>
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
            height: 20px;
            border-left: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    2
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
            height: 20px;
            border-left: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    125800
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
            height: 20px;
            border-left: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    66674
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
            height: 20px;
            border-left: 1px solid #000;
            border-bottom: 1px solid #000;
          ">

                                    12330
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
            height: 20px;
            border-left: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    12300
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
            height: 20px;
            border-left: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    5724
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
            height: 20px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
            border-left: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
                                </td>
                            </tr>
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
            height: 20px;
            border-left: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    3
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
            height: 20px;
            border-left: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    125800
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
            height: 20px;
            border-left: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    66674
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
            height: 20px;
            border-left: 1px solid #000;
            border-bottom: 1px solid #000;
          ">

                                    12330
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
            height: 20px;
            border-left: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    12300
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
            height: 20px;
            border-left: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    5724
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
            height: 20px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
            border-left: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
                                </td>
                            </tr>
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
            height: 20px;
            border-left: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    4
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
            height: 20px;
            border-left: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    125800
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
            height: 20px;
            border-left: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    66674
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
            height: 20px;
            border-left: 1px solid #000;
            border-bottom: 1px solid #000;
          ">

                                    12330
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
            height: 20px;
            border-left: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    12300
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
            height: 20px;
            border-left: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    5724
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
            height: 20px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
            border-left: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
                                </td>
                            </tr>
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
            height: 20px;
            border-left: 1px solid #000;
            border-bottom: 1px solid #000;
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
            height: 20px;
            border-left: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    125800
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
            height: 20px;
            border-left: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    66674
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
            height: 20px;
            border-left: 1px solid #000;
            border-bottom: 1px solid #000;
          ">

                                    12330
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
            height: 20px;
            border-left: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    12300
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
            height: 20px;
            border-left: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    5724
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
            height: 20px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
            border-left: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
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
            height: 20px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    0
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>




        </tbody>
    </table>
    {{-- @dd($pageArrayBasicPay) --}}

</body>

</html>
