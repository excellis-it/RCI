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
        /* width: 100%; */
        border-collapse: collapse;
    }

    th,
    td {
        padding: 5px;
        text-align: center;
    }

    table {
        border-collapse: collapse;
        /* width: 100%; */
    }

    th,
    td {
        /* border: 1px solid #000; */
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
        // $pageArrayVariableAmount = [];
        $pageArrayPayAllow = [];
        $pageArrayRiskAllow = [];
        $pageArrayMiscCreditIt = [];
        $pageArrayMiscCredit = [];
        $pageArrayNpscCreditIt = [];
        $pageArrayNpgArrsCreditIt = [];
        $pageArrayNpgAdgCredit = [];

        $pageArrayGpfSub = [];
        $pageArrayGpfAdv = [];
        $pageArrayGpfArr = [];
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
        {{-- @dd($chunkData) --}}
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
            // $pageArrayVariableAmount[$chunkKey] = 0;
            $pageArrayPayAllow[$chunkKey] = 0;
            $pageArrayRiskAllow[$chunkKey] = 0;
            $pageArrayNpscCreditIt[$chunkKey] = 0;
            $pageArrayNpgArrsCreditIt[$chunkKey] = 0;
            $pageArrayNpgAdgCredit[$chunkKey] = 0;
            $pageArrayMiscCreditIt[$chunkKey] = 0;
            $pageArrayMiscCredit[$chunkKey] = 0;
            $pageArrayGpfSub[$chunkKey] = 0;
            $pageArrayGpfAdv[$chunkKey] = 0;
            $pageArrayGpfArr[$chunkKey] = 0;
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
                                        - {{ $year ?? 'N/A' }} </br>{{ $category_fund_type }} STAFF
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
                                        ALLOW<br>TPTDA<br>SPL PAY
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
                                // $totalVariableAmount = 0;
                                $totalPayAllow = 0;
                                $totalRiskAllow = 0;
                                $totalMiscCreditIt = 0;
                                $totalMiscCredit = 0;
                                $totalGpfSub = 0;
                                $totalGpfAdv = 0;
                                $totalGpfArr = 0;
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
                                        $credit = $member_info['details']['member_credit'] ?? null;
                                        $debit = $member_info['details']['member_debit'] ?? null;
                                        $loans = $member_info['details']['member_loans'] ?? [];
                                        $recovery = $member_info['details']['member_recovery'] ?? null;

                                        $totalBasicPay += $credit?->pay ?? 0;
                                        $totalDa += $credit?->da ?? 0;
                                        $totalHra += $credit?->hra ?? 0;
                                        $totalTpt += $credit?->tpt ?? 0;
                                        $totalDaOnTpt += $credit?->da_on_tpt ?? 0;
                                        $totalSpay += $credit?->s_pay ?? 0;
                                        $totalVarIncr += $credit?->var_incr ?? 0;
                                        $totalSplIncent += $credit?->spl_incentive ?? 0;
                                        $totalIncentive += $credit?->incentive ?? 0;
                                        $totaldressAllow += $credit?->dis_alw ?? 0;
                                        // $totalVariableAmount += $credit?->variable_amount ?? 0;
                                        $totalPayAllow += $credit?->arrs_pay_alw ?? 0;
                                        $totalRiskAllow += $credit?->risk_alw ?? 0;
                                        $totalNpscCreditIt += $credit?->npsc ?? 0;
                                        $totalNpgArrsCreditIt += $credit?->npg_arrs ?? 0;
                                        $totalNpgAdgCredit += $credit?->npg_adj ?? 0;
                                        $totalMiscCreditIt += $credit?->misc1 ?? 0;
                                        $totalMiscCredit += $credit?->misc2 ?? 0;

                                        $totalGpfSub += $debit?->gpa_sub ?? 0;
                                        $totalGpfAdv += $debit?->gpf_adv ?? 0;
                                        $totalGpfArr += $debit?->gpf_arr ?? 0;
                                        $totalCgegis += $debit?->cgegis ?? 0;
                                        $totalCghs += $debit?->cghs ?? 0;
                                        $totalHbaAdv += $loans['hba_inst'] ?? 0;
                                        $totalCarAdv += $loans['car_inst'] ?? 0;
                                        $totalEduAdv += $loans['edu_inst'] ?? 0;
                                        $totalCompAdv += $loans['comp_inst'] ?? 0;

                                        $totalLtc += $debit?->ltc ?? 0;
                                        $totalMedDebit += $debit?->medi ?? 0;
                                        $totalTada += $debit?->tada ?? 0;
                                        $totalLeaveRec += $debit?->leave_rec ?? 0;
                                        $totalPensionRec += $debit?->pension_rec ?? 0;
                                        $totalIncomeTax += $debit?->i_tax ?? 0;
                                        $totalEduCess += $debit?->ecess ?? 0;
                                        $totalPlInsur += $debit?->pli ?? 0;
                                        $totalMiscDebit += $debit?->misc1 ?? 0;
                                        $totalMiscDebitIt += $debit?->misc2 ?? 0;
                                        $totalNpsg += $debit?->npsg ?? 0;
                                        $totalNpsgArr += $debit?->npsg_arr ?? 0;
                                        $totalNpsAdj += $debit?->npsg_adj ?? 0;
                                        $total_nps_10_rec += $debit?->nps_10_rec ?? 0;
                                        $total_nps_10_arr += $debit?->nps_10_arr ?? 0;
                                        $total_nps_14_adj += $debit?->nps_14_adj ?? 0;
                                        $totalCgeisArr += $debit?->cgeis_arr ?? 0;
                                        $totalCghsArr += $debit?->cghs_arr ?? 0;
                                        $totalPenalIntr += $debit?->penal_intr ?? 0;
                                        $totalElec += $debit?->elec ?? 0;
                                        $totalWater += $debit?->water ?? 0;
                                        $totalFurn += $debit?->furn ?? 0;
                                        $totalMiscRent += $debit?->misc3 ?? 0;

                                        $singleTotalCredit =
                                            ($credit?->pay ?? 0) +
                                            ($credit?->da ?? 0) +
                                            ($credit?->hra ?? 0) +
                                            ($credit?->tpt ?? 0) +
                                            ($credit?->da_on_tpt ?? 0) +
                                            ($credit?->s_pay ?? 0) +
                                            ($credit?->var_incr ?? 0) +
                                            ($credit?->spl_incentive ?? 0) +
                                            ($credit?->incentive ?? 0) +
                                            ($credit?->dis_alw ?? 0) +
                                            // ($credit?->variable_amount ?? 0) +
                                            ($credit?->arrs_pay_alw ?? 0) +
                                            ($credit?->risk_alw ?? 0) +
                                            ($credit?->npsc ?? 0) +
                                            ($credit?->npg_arrs ?? 0) +
                                            ($credit?->npg_adj ?? 0) +
                                            ($credit?->misc1 ?? 0) +
                                            ($credit?->misc2 ?? 0);

                                        $totalcredit += $singleTotalCredit;

                                        $singleTotalDebit =
                                            ($debit?->gpa_sub ?? 0) +
                                            ($debit?->gpf_adv ?? 0) +
                                            ($debit?->cgegis ?? 0) +
                                            ($debit?->cghs ?? 0) +
                                            ($loans['hba_inst'] ?? 0) +
                                            ($loans['car_inst'] ?? 0) +
                                            ($loans['edu_inst'] ?? 0) +
                                            ($loans['comp_inst'] ?? 0) +
                                            ($debit?->ltc ?? 0) +
                                            ($debit?->medi ?? 0) +
                                            ($debit?->tada ?? 0) +
                                            ($debit?->leave_rec ?? 0) +
                                            ($debit?->pension_rec ?? 0) +
                                            ($debit?->i_tax ?? 0) +
                                            ($debit?->ecess ?? 0) +
                                            ($debit?->pli ?? 0) +
                                            ($debit?->misc1 ?? 0) +
                                            ($debit?->misc2 ?? 0) +
                                            ($debit?->npsg ?? 0) +
                                            ($debit?->npsg_arr ?? 0) +
                                            ($debit?->npsg_adj ?? 0) +
                                            ($debit?->nps_10_rec ?? 0) +
                                            ($debit?->nps_10_arr ?? 0) +
                                            ($debit?->nps_14_adj ?? 0) +
                                            ($debit?->cgeis_arr ?? 0) +
                                            ($debit?->cghs_arr ?? 0) +
                                            ($debit?->penal_intr ?? 0) +
                                            ($debit?->elec ?? 0) +
                                            ($debit?->water ?? 0) +
                                            ($debit?->furn ?? 0) +
                                            ($debit?->misc3 ?? 0);

                                        $totalDebit += $singleTotalDebit;

                                        $singleNetPay = $singleTotalCredit - $singleTotalDebit;

                                        $totalNetPay += $totalcredit + $totalDebit;

                                        $totalSingleTableRec =
                                            ($recovery?->ccs_sub ?? 0) +
                                            ($recovery?->wel_sub ?? 0) +
                                            ($recovery?->ptax ?? 0) +
                                            ($recovery?->mess ?? 0);

                                        $totalTableRec += $totalSingleTableRec;

                                        $pageArraySingleTableRec[$chunkKey] = $totalTableRec;

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
                                        // $pageArrayVariableAmount[$chunkKey] +=
                                        //     $member_info['details']['member_credit']->variable_amount ?? 0;
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
                                        $pageArrayGpfArr[$chunkKey] +=
                                            $member_info['details']['member_debit']->gpf_arr ?? 0;
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
                                            // ($member_info['details']['member_credit']->variable_amount ?? 0) +
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
                                            {{-- {{ round($member_info['details']['member_credit']->var_incr ?? 0) }} --}}

                                        </td>
                                        <td valign="top"
                                            style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                             margin: 0px 0px !important; text-transform: uppercase;border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
                                            {{ round($member_info['details']['member_credit']->spl_incentive ?? 0) }}<br>
                                            {{ round($member_info['details']['member_credit']->incentive ?? 0) }}<br>
                                            {{ round($member_info['details']['member_credit']->dis_alw ?? 0) }}<br>
                                            {{ round($member_info['details']['member_credit']->var_incr ?? 0) }}<br>
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
                                        {{-- {{ round($totalVarIncr ?? 0) }} <br> --}}

                                    </td>
                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                             margin: 0px 0px !important; text-transform: uppercase;border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
                                        {{ round($totalSplIncent ?? 0) }} <br>
                                        {{ round($totalIncentive ?? 0) }} <br>
                                        {{ round($totaldressAllow ?? 0) }} <br>
                                        {{ round($totalVarIncr ?? 0) }} <br>
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
                                        {{ round($totalGpfArr ?? 0) }} <br>
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
                                    - {{ $year ?? 'N/A' }} </br>{{ $category_fund_type }} STAFF
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
                            @php
                                // Initialize total variables for all columns more concisely
                                $columnTotals = [
                                    'basic' => 0,
                                    'da' => 0,
                                    'hra' => 0,
                                    'tpt' => 0,
                                    'da_on_tpt' => 0,
                                    'spay' => 0,
                                    'spl_incent' => 0,
                                    'incentive' => 0,
                                    'dress_allow' => 0,
                                    'var_incr' => 0,
                                    'pay_allow' => 0,
                                    'risk_allow' => 0,
                                    'npsc_credit_it' => 0,
                                    'npg_arrs_credit_it' => 0,
                                    'npg_adg_credit' => 0,
                                    'misc_credit_it' => 0,
                                    'misc_credit' => 0,
                                ];
                            @endphp

                            @foreach ($pageArrayBasicPay as $key => $basic)
                                @php
                                    // Assign values with null coalescing for robustness
                                    $currentBasic = $basic ?? 0;
                                    $currentDa = $pageArrayDa[$key] ?? 0;
                                    $currentHra = $pageArrayHra[$key] ?? 0;
                                    $currentTpt = $pageArrayTpt[$key] ?? 0;
                                    $currentDaOnTpt = $pageArrayDaOnTpt[$key] ?? 0;
                                    $currentSpay = $pageArraySpay[$key] ?? 0;
                                    $currentSplIncent = $pageArraySplIncent[$key] ?? 0;
                                    $currentIncentive = $pageArrayIncentive[$key] ?? 0;
                                    $currentDressAllow = $pageArraydressAllow[$key] ?? 0;
                                    $currentVarIncr = $pageArrayVarIncr[$key] ?? 0;
                                    $currentPayAllow = $pageArrayPayAllow[$key] ?? 0;
                                    $currentRiskAllow = $pageArrayRiskAllow[$key] ?? 0;
                                    $currentNpscCreditIt = $pageArrayNpscCreditIt[$key] ?? 0;
                                    $currentNpgArrsCreditIt = $pageArrayNpgArrsCreditIt[$key] ?? 0;
                                    $currentNpgAdgCredit = $pageArrayNpgAdgCredit[$key] ?? 0;
                                    $currentMiscCreditIt = $pageArrayMiscCreditIt[$key] ?? 0;
                                    $currentMiscCredit = $pageArrayMiscCredit[$key] ?? 0;

                                    // Calculate individual row total
                                    $row_total =
                                        $currentBasic +
                                        $currentDa +
                                        $currentHra +
                                        $currentTpt +
                                        $currentDaOnTpt +
                                        $currentSpay +
                                        $currentSplIncent +
                                        $currentIncentive +
                                        $currentDressAllow +
                                        $currentVarIncr +
                                        $currentPayAllow +
                                        $currentRiskAllow +
                                        $currentNpscCreditIt +
                                        $currentNpgArrsCreditIt +
                                        $currentNpgAdgCredit +
                                        $currentMiscCreditIt +
                                        $currentMiscCredit;

                                    // Add current row values to overall column totals
                                    $columnTotals['basic'] += $currentBasic;
                                    $columnTotals['da'] += $currentDa;
                                    $columnTotals['hra'] += $currentHra;
                                    $columnTotals['tpt'] += $currentTpt;
                                    $columnTotals['da_on_tpt'] += $currentDaOnTpt;
                                    $columnTotals['spay'] += $currentSpay;
                                    $columnTotals['spl_incent'] += $currentSplIncent;
                                    $columnTotals['incentive'] += $currentIncentive;
                                    $columnTotals['dress_allow'] += $currentDressAllow;
                                    $columnTotals['var_incr'] += $currentVarIncr;
                                    $columnTotals['pay_allow'] += $currentPayAllow;
                                    $columnTotals['risk_allow'] += $currentRiskAllow;
                                    $columnTotals['npsc_credit_it'] += $currentNpscCreditIt;
                                    $columnTotals['npg_arrs_credit_it'] += $currentNpgArrsCreditIt;
                                    $columnTotals['npg_adg_credit'] += $currentNpgAdgCredit;
                                    $columnTotals['misc_credit_it'] += $currentMiscCreditIt;
                                    $columnTotals['misc_credit'] += $currentMiscCredit;
                                @endphp
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
                                        {{ $key + 1 }}
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
                                        {{ $currentBasic }}
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
                                        {{ $currentDa }}
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
                                        {{ $currentHra }}
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
                                        {{ $currentTpt }}
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
                                        {{ $currentDaOnTpt }}
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
                                        {{ $currentSpay }}
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
                                        {{ $currentSplIncent }}
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
                                        {{ $currentIncentive }}
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
                                        {{ $currentDressAllow }}
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
                                        {{ $currentVarIncr }}
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
                                        {{ $currentPayAllow }}
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
                                        {{ $currentRiskAllow }}
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
                                        {{ $currentNpscCreditIt }}
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
                                        {{ $currentNpgArrsCreditIt }}
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
                                        {{ $currentNpgAdgCredit }}
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
                                        {{ $currentMiscCreditIt }}
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
                                        {{ $currentMiscCredit }}
                                    </td>
                                    <td
                                        style="
                                        font-size: 10px;
                                        line-height: 14px;
                                        font-weight: 600; /* Make the total bold */
                                        color: #000;
                                        text-align: right;
                                        padding: 0px 5px !important;
                                        margin: 0px 0px !important;
                                        height: 20px;
                                        border-top: 1px solid #000;
                                        border-right: 1px solid #000;
                                        border-bottom: 1px solid #000;
                                    ">
                                        {{ $row_total }}
                                    </td>
                                </tr>
                            @endforeach
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
                                    {{ $columnTotals['basic'] }}
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
                                    {{ $columnTotals['da'] }}
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
                                    {{ $columnTotals['hra'] }}
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
                                    {{ $columnTotals['tpt'] }}
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
                                    {{ $columnTotals['da_on_tpt'] }}
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
                                    {{ $columnTotals['spay'] }}
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
                                    {{ $columnTotals['spl_incent'] }}
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
                                    {{ $columnTotals['incentive'] }}
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
                                    {{ $columnTotals['dress_allow'] }}
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
                                    {{ $columnTotals['var_incr'] }}
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
                                    {{ $columnTotals['pay_allow'] }}
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
                                    {{ $columnTotals['risk_allow'] }}
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
                                    {{ $columnTotals['npsc_credit_it'] }}
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
                                    {{ $columnTotals['npg_arrs_credit_it'] }}
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
                                    {{ $columnTotals['npg_adg_credit'] }}
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
                                    {{ $columnTotals['misc_credit_it'] }}
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
                                    {{ $columnTotals['misc_credit'] }}
                                </td>
                                <td
                                    style="
                                    font-size: 10px;
                                    line-height: 14px;
                                    font-weight: 600; /* Make the total bold */
                                    color: #000;
                                    text-align: right;
                                    padding: 0px 5px !important;
                                    margin: 0px 0px !important;
                                    height: 20px;
                                    border-right: 1px solid #000;
                                    border-bottom: 1px solid #000;
                                ">
                                    {{ array_sum($columnTotals) }}
                                </td>
                        </tbody>
                    </table>
                </td>
            </tr>




        </tbody>
    </table>
    <div class="page-break"></div>
    {{-- @dd($pageArrayBasicPay) --}}

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
                                    - {{ $year ?? 'N/A' }} </br>{{ $category_fund_type }} STAFF
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
                <td style="padding: 0 0px">
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
                                    DEBIT SUMMARY REPORT FOR BILLNO
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
                                    GPF SUB
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
                                    GPF ADV
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
                                    GPF ARRS
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
                                    CGEGIS
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
                                    CGHS
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
                                    HBA ADV
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
                                    HBA INT
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
                                    CAR ADV
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
                                    CAR INT
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
                                    SCO ADV
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
                                    SCO INT
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
                                    COMP ADV
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
                                    COMP INT
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
                                    FEST ADV
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
                                    LTC
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
                                    MED DEBIT
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
                                    TADA
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
                                    LEAVE REC
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
                                    PENSION REC
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
                                    INCOME TAX
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
                                    EDU CESS
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
                                    PL INSUR
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
                                    MISC DEBIT
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
                                    MISC DEBIT (IT)
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
                                    NPS 10% REC
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
                                    NPSG 14%
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
                                    NPS ARR10%
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
                                    NPSG ARR14%
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
                                    NPS ADJ10%
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
                                    NPSADJ14%
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
                                    CGHS ARR
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
                                    CGEIS ARR
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
                                    PENAL INTR
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
                                    LICENCE FEE
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
                                    ELECT
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
                                    WATER
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
                                    FURN
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
                                    MISC RENT
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
                                    DEBITS
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $totalGpfSub = round(array_sum($pageArrayGpfSub));
                            $totalGpfAdv = round(array_sum($pageArrayGpfAdv));
                            $totalGpfArr = round(array_sum($pageArrayGpfArr));
                            $totalCgegis = round(array_sum($pageArrayCgegis));
                            $totalCghs = round(array_sum($pageArrayCghs));
                            $totalHbaAdv = round(array_sum($pageArrayHbaAdv));
                            $totalCarAdv = round(array_sum($pageArrayCarAdv));
                            $totalCompAdv = round(array_sum($pageArrayCompAdv));
                            $totalLtc = round(array_sum($pageArrayLtc));
                            $totalMedDebit = round(array_sum($pageArrayMedDebit));
                            $totalTada = round(array_sum($pageArrayTada));
                            $totalLeaveRec = round(array_sum($pageArrayLeaveRec));
                            $totalPensionRec = round(array_sum($pageArrayPensionRec));
                            $totalIncomeTax = round(array_sum($pageArrayIncomeTax));
                            $totalEduCess = round(array_sum($pageArrayEduCess));
                            $totalPlInsur = round(array_sum($pageArrayPlInsur));
                            $totalMiscDebit = round(array_sum($pageArrayMiscDebit));
                            $totalMiscDebitIt = round(array_sum($pageArrayMiscDebitIt));
                            $totalNps10Rec = round(array_sum($pageArray_nps_10_rec));
                            $totalNpsg = round(array_sum($pageArrayNpsg));
                            $totalNps10Arr = round(array_sum($pageArray_nps_10_arr));
                            $totalNpsgArr = round(array_sum($pageArrayNpsgArr));
                            $totalNpsAdj = round(array_sum($pageArrayNpsAdj));
                            $totalNps14Adj = round(array_sum($pageArray_nps_14_adj));
                            $totalCghsArr = round(array_sum($pageArrayCghsArr));
                            $totalCgeisArr = round(array_sum($pageArrayCgeisArr));
                            $totalPenalIntr = round(array_sum($pageArrayPenalIntr));
                            $totalElec = round(array_sum($pageArrayElec));
                            $totalWater = round(array_sum($pageArrayWater));
                            $totalFurn = round(array_sum($pageArrayFurn));
                            $totalMiscRent = round(array_sum($pageArrayMiscRent));
                            $total_sum_debit = 0;
                            // Then in your Blade template, after the loop, you can display these totals in a new row:
                            ?>

                            {{-- Your existing loop for displaying rows --}}
                            @foreach ($pageArrayGpfSub as $key => $gpfsub)
                                @php
                                    $totalDebit = 0;
                                    $gpfAdv = $pageArrayGpfAdv[$key] ?? 0;
                                    $gpfArr = $pageArrayGpfArr[$key] ?? 0;
                                    $cgegis = $pageArrayCgegis[$key] ?? 0;
                                    $cghs = $pageArrayCghs[$key] ?? 0;
                                    $hbaAdv = $pageArrayHbaAdv[$key] ?? 0;
                                    $carAdv = $pageArrayCarAdv[$key] ?? 0;
                                    $compAdv = $pageArrayCompAdv[$key] ?? 0;
                                    $ltc = $pageArrayLtc[$key] ?? 0;
                                    $medDebit = $pageArrayMedDebit[$key] ?? 0;
                                    $tada = $pageArrayTada[$key] ?? 0;
                                    $leaveRec = $pageArrayLeaveRec[$key] ?? 0;
                                    $pensionRec = $pageArrayPensionRec[$key] ?? 0;
                                    $incomeTax = $pageArrayIncomeTax[$key] ?? 0;
                                    $eduCess = $pageArrayEduCess[$key] ?? 0;
                                    $plInsur = $pageArrayPlInsur[$key] ?? 0;
                                    $miscDebit = $pageArrayMiscDebit[$key] ?? 0;
                                    $miscDebitIt = $pageArrayMiscDebitIt[$key] ?? 0;
                                    $nps10Rec = $pageArray_nps_10_rec[$key] ?? 0;
                                    $npsg = $pageArrayNpsg[$key] ?? 0;
                                    $nps10Arr = $pageArray_nps_10_arr[$key] ?? 0;
                                    $npsgArr = $pageArrayNpsgArr[$key] ?? 0;
                                    $npsAdj = $pageArrayNpsAdj[$key] ?? 0;
                                    $nps14Adj = $pageArray_nps_14_adj[$key] ?? 0;
                                    $cghsArr = $pageArrayCghsArr[$key] ?? 0;
                                    $cgeisArr = $pageArrayCgeisArr[$key] ?? 0;
                                    $penalIntr = $pageArrayPenalIntr[$key] ?? 0;
                                    $elec = $pageArrayElec[$key] ?? 0;
                                    $water = $pageArrayWater[$key] ?? 0;
                                    $furn = $pageArrayFurn[$key] ?? 0;
                                    $miscRent = $pageArrayMiscRent[$key] ?? 0;

                                    // Add all the relevant values to totalDebit
                                    $totalDebit +=
                                        $gpfsub +
                                        $gpfAdv +
                                        $gpfArr +
                                        $cgegis +
                                        $cghs +
                                        $hbaAdv +
                                        0 +
                                        $carAdv +
                                        0 +
                                        0 +
                                        0 +
                                        $compAdv +
                                        0 +
                                        0 +
                                        $ltc +
                                        $medDebit +
                                        $tada +
                                        $leaveRec +
                                        $pensionRec +
                                        $incomeTax +
                                        $eduCess +
                                        $plInsur +
                                        $miscDebit +
                                        $miscDebitIt +
                                        $nps10Rec +
                                        $npsg +
                                        $nps10Arr +
                                        $npsgArr +
                                        $npsAdj +
                                        $nps14Adj +
                                        $cghsArr +
                                        $cgeisArr +
                                        $penalIntr +
                                        0 +
                                        $elec +
                                        $water +
                                        $furn +
                                        $miscRent +
                                        0;

                                    // You can round the totalDebit if needed
                                    $totalDebit = round($totalDebit);

                                    $total_sum_debit += round($totalDebit);
                                @endphp
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
                                        {{ $key + 1 }}
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
                                        {{ $gpfsub }}
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
                                        {{ $pageArrayGpfAdv[$key] ?? 0 }}
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
                                        {{ $pageArrayGpfArr[$key] ?? 0 }}
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
                                        {{ $pageArrayCgegis[$key] ?? 0 }}
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
                                        {{ $pageArrayCghs[$key] ?? 0 }}
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
                                        {{ $pageArrayHbaAdv[$key] ?? 0 }}
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
                                        {{ $pageArrayCarAdv[$key] ?? 0 }}
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
                                        {{ $pageArrayCompAdv[$key] ?? 0 }}
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
                                        {{ $pageArrayLtc[$key] ?? 0 }}
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
                                        {{ $pageArrayMedDebit[$key] ?? 0 }}
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
                                        {{ $pageArrayTada[$key] ?? 0 }}
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
                                        {{ $pageArrayLeaveRec[$key] ?? 0 }}
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
                                        {{ $pageArrayPensionRec[$key] ?? 0 }}
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
                                        {{ $pageArrayIncomeTax[$key] ?? 0 }}
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
                                        {{ $pageArrayEduCess[$key] ?? 0 }}
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
                                        {{ $pageArrayPlInsur[$key] ?? 0 }}
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
                                        {{ $pageArrayMiscDebit[$key] ?? 0 }}
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
                                        {{ $pageArrayMiscDebitIt[$key] ?? 0 }}
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
                                        {{ $pageArray_nps_10_rec[$key] ?? 0 }}
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
                                        {{ $pageArrayNpsg[$key] ?? 0 }}
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
                                        {{ $pageArray_nps_10_arr[$key] ?? 0 }}
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
                                        {{ $pageArrayNpsgArr[$key] ?? 0 }}
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
                                        {{ $pageArrayNpsAdj[$key] ?? 0 }}
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
                                        {{ $pageArray_nps_14_adj[$key] ?? 0 }}
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
                                        {{ $pageArrayCghsArr[$key] ?? 0 }}
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
                                        {{ $pageArrayCgeisArr[$key] ?? 0 }}
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
                                        {{ $pageArrayPenalIntr[$key] ?? 0 }}
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
                                        {{ $pageArrayElec[$key] ?? 0 }}
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
                                        {{ $pageArrayWater[$key] ?? 0 }}
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
                                        {{ $pageArrayFurn[$key] ?? 0 }}
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
                                        {{ $pageArrayMiscRent[$key] ?? 0 }}
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
                                        {{ $totalDebit }}
                                    </td>
                                </tr>
                            @endforeach

                            {{-- New row for totals --}}
                            <tr>
                                <td
                                    style="
                                    font-size: 10px;
                                    line-height: 14px;
                                    font-weight: 700; /* Make totals bold */
                                    color: #000;
                                    text-align: right;
                                    padding: 0px 5px !important;
                                    margin: 0px 0px !important;
                                    height: 20px;
                                    border-left: 1px solid #000;
                                    border-top: 1px solid #000;
                                    border-bottom: 1px solid #000;
                                ">
                                    Total
                                </td>
                                <td
                                    style="
                                    font-size: 10px;
                                    line-height: 14px;
                                    font-weight: 700;
                                    color: #000;
                                    text-align: right;
                                    padding: 0px 5px !important;
                                    margin: 0px 0px !important;
                                    height: 20px;
                                    border-left: 1px solid #000;
                                    border-top: 1px solid #000;
                                    border-bottom: 1px solid #000;
                                ">
                                    {{ $totalGpfSub }}
                                </td>
                                <td
                                    style="
                                    font-size: 10px;
                                    line-height: 14px;
                                    font-weight: 700;
                                    color: #000;
                                    text-align: right;
                                    padding: 0px 5px !important;
                                    margin: 0px 0px !important;
                                    height: 20px;
                                    border-left: 1px solid #000;
                                    border-top: 1px solid #000;
                                    border-bottom: 1px solid #000;
                                ">
                                    {{ $totalGpfAdv }}
                                </td>
                                <td
                                    style="
                                    font-size: 10px;
                                    line-height: 14px;
                                    font-weight: 700;
                                    color: #000;
                                    text-align: right;
                                    padding: 0px 5px !important;
                                    margin: 0px 0px !important;
                                    height: 20px;
                                    border-left: 1px solid #000;
                                    border-top: 1px solid #000;
                                    border-bottom: 1px solid #000;
                                ">
                                    {{ $totalGpfArr }}
                                </td>
                                <td
                                    style="
                                    font-size: 10px;
                                    line-height: 14px;
                                    font-weight: 700;
                                    color: #000;
                                    text-align: right;
                                    padding: 0px 5px !important;
                                    margin: 0px 0px !important;
                                    height: 20px;
                                    border-left: 1px solid #000;
                                    border-top: 1px solid #000;
                                    border-bottom: 1px solid #000;
                                ">
                                    {{ $totalCgegis }}
                                </td>
                                <td
                                    style="
                                    font-size: 10px;
                                    line-height: 14px;
                                    font-weight: 700;
                                    color: #000;
                                    text-align: right;
                                    padding: 0px 5px !important;
                                    margin: 0px 0px !important;
                                    height: 20px;
                                    border-left: 1px solid #000;
                                    border-top: 1px solid #000;
                                    border-bottom: 1px solid #000;
                                ">
                                    {{ $totalCghs }}
                                </td>
                                <td
                                    style="
                                    font-size: 10px;
                                    line-height: 14px;
                                    font-weight: 700;
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
                                    {{ $totalHbaAdv }}
                                </td>
                                <td
                                    style="
                                    font-size: 10px;
                                    line-height: 14px;
                                    font-weight: 700;
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
                                    font-weight: 700;
                                    color: #000;
                                    text-align: right;
                                    padding: 0px 5px !important;
                                    margin: 0px 0px !important;
                                    height: 20px;
                                    border-top: 1px solid #000;
                                    border-right: 1px solid #000;
                                    border-bottom: 1px solid #000;
                                ">
                                    {{ $totalCarAdv }}
                                </td>
                                <td
                                    style="
                                    font-size: 10px;
                                    line-height: 14px;
                                    font-weight: 700;
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
                                    font-weight: 700;
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
                                    font-weight: 700;
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
                                    font-weight: 700;
                                    color: #000;
                                    text-align: right;
                                    padding: 0px 5px !important;
                                    margin: 0px 0px !important;
                                    height: 20px;
                                    border-top: 1px solid #000;
                                    border-right: 1px solid #000;
                                    border-bottom: 1px solid #000;
                                ">
                                    {{ $totalCompAdv }}
                                </td>
                                <td
                                    style="
                                    font-size: 10px;
                                    line-height: 14px;
                                    font-weight: 700;
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
                                    font-weight: 700;
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
                                    font-weight: 700;
                                    color: #000;
                                    text-align: right;
                                    padding: 0px 5px !important;
                                    margin: 0px 0px !important;
                                    height: 20px;
                                    border-top: 1px solid #000;
                                    border-right: 1px solid #000;
                                    border-bottom: 1px solid #000;
                                ">
                                    {{ $totalLtc }}
                                </td>
                                <td
                                    style="
                                    font-size: 10px;
                                    line-height: 14px;
                                    font-weight: 700;
                                    color: #000;
                                    text-align: right;
                                    padding: 0px 5px !important;
                                    margin: 0px 0px !important;
                                    height: 20px;
                                    border-top: 1px solid #000;
                                    border-right: 1px solid #000;
                                    border-bottom: 1px solid #000;
                                ">
                                    {{ $totalMedDebit }}
                                </td>
                                <td
                                    style="
                                    font-size: 10px;
                                    line-height: 14px;
                                    font-weight: 700;
                                    color: #000;
                                    text-align: right;
                                    padding: 0px 5px !important;
                                    margin: 0px 0px !important;
                                    height: 20px;
                                    border-top: 1px solid #000;
                                    border-right: 1px solid #000;
                                    border-bottom: 1px solid #000;
                                ">
                                    {{ $totalTada }}
                                </td>
                                <td
                                    style="
                                    font-size: 10px;
                                    line-height: 14px;
                                    font-weight: 700;
                                    color: #000;
                                    text-align: right;
                                    padding: 0px 5px !important;
                                    margin: 0px 0px !important;
                                    height: 20px;
                                    border-top: 1px solid #000;
                                    border-right: 1px solid #000;
                                    border-bottom: 1px solid #000;
                                ">
                                    {{ $totalLeaveRec }}
                                </td>
                                <td
                                    style="
                                    font-size: 10px;
                                    line-height: 14px;
                                    font-weight: 700;
                                    color: #000;
                                    text-align: right;
                                    padding: 0px 5px !important;
                                    margin: 0px 0px !important;
                                    height: 20px;
                                    border-top: 1px solid #000;
                                    border-right: 1px solid #000;
                                    border-bottom: 1px solid #000;
                                ">
                                    {{ $totalPensionRec }}
                                </td>
                                <td
                                    style="
                                    font-size: 10px;
                                    line-height: 14px;
                                    font-weight: 700;
                                    color: #000;
                                    text-align: right;
                                    padding: 0px 5px !important;
                                    margin: 0px 0px !important;
                                    height: 20px;
                                    border-top: 1px solid #000;
                                    border-right: 1px solid #000;
                                    border-bottom: 1px solid #000;
                                ">
                                    {{ $totalIncomeTax }}
                                </td>
                                <td
                                    style="
                                    font-size: 10px;
                                    line-height: 14px;
                                    font-weight: 700;
                                    color: #000;
                                    text-align: right;
                                    padding: 0px 5px !important;
                                    margin: 0px 0px !important;
                                    height: 20px;
                                    border-top: 1px solid #000;
                                    border-right: 1px solid #000;
                                    border-bottom: 1px solid #000;
                                ">
                                    {{ $totalEduCess }}
                                </td>
                                <td
                                    style="
                                    font-size: 10px;
                                    line-height: 14px;
                                    font-weight: 700;
                                    color: #000;
                                    text-align: right;
                                    padding: 0px 5px !important;
                                    margin: 0px 0px !important;
                                    height: 20px;
                                    border-top: 1px solid #000;
                                    border-right: 1px solid #000;
                                    border-bottom: 1px solid #000;
                                ">
                                    {{ $totalPlInsur }}
                                </td>
                                <td
                                    style="
                                    font-size: 10px;
                                    line-height: 14px;
                                    font-weight: 700;
                                    color: #000;
                                    text-align: right;
                                    padding: 0px 5px !important;
                                    margin: 0px 0px !important;
                                    height: 20px;
                                    border-top: 1px solid #000;
                                    border-right: 1px solid #000;
                                    border-bottom: 1px solid #000;
                                ">
                                    {{ $totalMiscDebit }}
                                </td>
                                <td
                                    style="
                                    font-size: 10px;
                                    line-height: 14px;
                                    font-weight: 700;
                                    color: #000;
                                    text-align: right;
                                    padding: 0px 5px !important;
                                    margin: 0px 0px !important;
                                    height: 20px;
                                    border-top: 1px solid #000;
                                    border-right: 1px solid #000;
                                    border-bottom: 1px solid #000;
                                ">
                                    {{ $totalMiscDebitIt }}
                                </td>
                                <td
                                    style="
                                    font-size: 10px;
                                    line-height: 14px;
                                    font-weight: 700;
                                    color: #000;
                                    text-align: right;
                                    padding: 0px 5px !important;
                                    margin: 0px 0px !important;
                                    height: 20px;
                                    border-top: 1px solid #000;
                                    border-right: 1px solid #000;
                                    border-bottom: 1px solid #000;
                                ">
                                    {{ $totalNps10Rec }}
                                </td>
                                <td
                                    style="
                                    font-size: 10px;
                                    line-height: 14px;
                                    font-weight: 700;
                                    color: #000;
                                    text-align: right;
                                    padding: 0px 5px !important;
                                    margin: 0px 0px !important;
                                    height: 20px;
                                    border-top: 1px solid #000;
                                    border-right: 1px solid #000;
                                    border-bottom: 1px solid #000;
                                ">
                                    {{ $totalNpsg }}
                                </td>
                                <td
                                    style="
                                    font-size: 10px;
                                    line-height: 14px;
                                    font-weight: 700;
                                    color: #000;
                                    text-align: right;
                                    padding: 0px 5px !important;
                                    margin: 0px 0px !important;
                                    height: 20px;
                                    border-top: 1px solid #000;
                                    border-right: 1px solid #000;
                                    border-bottom: 1px solid #000;
                                ">
                                    {{ $totalNps10Arr }}
                                </td>
                                <td
                                    style="
                                    font-size: 10px;
                                    line-height: 14px;
                                    font-weight: 700;
                                    color: #000;
                                    text-align: right;
                                    padding: 0px 5px !important;
                                    margin: 0px 0px !important;
                                    height: 20px;
                                    border-top: 1px solid #000;
                                    border-right: 1px solid #000;
                                    border-bottom: 1px solid #000;
                                ">
                                    {{ $totalNpsgArr }}
                                </td>
                                <td
                                    style="
                                    font-size: 10px;
                                    line-height: 14px;
                                    font-weight: 700;
                                    color: #000;
                                    text-align: right;
                                    padding: 0px 5px !important;
                                    margin: 0px 0px !important;
                                    height: 20px;
                                    border-top: 1px solid #000;
                                    border-right: 1px solid #000;
                                    border-bottom: 1px solid #000;
                                ">
                                    {{ $totalNpsAdj }}
                                </td>
                                <td
                                    style="
                                    font-size: 10px;
                                    line-height: 14px;
                                    font-weight: 700;
                                    color: #000;
                                    text-align: right;
                                    padding: 0px 5px !important;
                                    margin: 0px 0px !important;
                                    height: 20px;
                                    border-top: 1px solid #000;
                                    border-right: 1px solid #000;
                                    border-bottom: 1px solid #000;
                                ">
                                    {{ $totalNps14Adj }}
                                </td>
                                <td
                                    style="
                                    font-size: 10px;
                                    line-height: 14px;
                                    font-weight: 700;
                                    color: #000;
                                    text-align: right;
                                    padding: 0px 5px !important;
                                    margin: 0px 0px !important;
                                    height: 20px;
                                    border-top: 1px solid #000;
                                    border-right: 1px solid #000;
                                    border-bottom: 1px solid #000;
                                ">
                                    {{ $totalCghsArr }}
                                </td>
                                <td
                                    style="
                                    font-size: 10px;
                                    line-height: 14px;
                                    font-weight: 700;
                                    color: #000;
                                    text-align: right;
                                    padding: 0px 5px !important;
                                    margin: 0px 0px !important;
                                    height: 20px;
                                    border-top: 1px solid #000;
                                    border-right: 1px solid #000;
                                    border-bottom: 1px solid #000;
                                ">
                                    {{ $totalCgeisArr }}
                                </td>
                                <td
                                    style="
                                    font-size: 10px;
                                    line-height: 14px;
                                    font-weight: 700;
                                    color: #000;
                                    text-align: right;
                                    padding: 0px 5px !important;
                                    margin: 0px 0px !important;
                                    height: 20px;
                                    border-top: 1px solid #000;
                                    border-right: 1px solid #000;
                                    border-bottom: 1px solid #000;
                                ">
                                    {{ $totalPenalIntr }}
                                </td>
                                <td
                                    style="
                                    font-size: 10px;
                                    line-height: 14px;
                                    font-weight: 700;
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
                                    font-weight: 700;
                                    color: #000;
                                    text-align: right;
                                    padding: 0px 5px !important;
                                    margin: 0px 0px !important;
                                    height: 20px;
                                    border-top: 1px solid #000;
                                    border-right: 1px solid #000;
                                    border-bottom: 1px solid #000;
                                ">
                                    {{ $totalElec }}
                                </td>
                                <td
                                    style="
                                    font-size: 10px;
                                    line-height: 14px;
                                    font-weight: 700;
                                    color: #000;
                                    text-align: right;
                                    padding: 0px 5px !important;
                                    margin: 0px 0px !important;
                                    height: 20px;
                                    border-top: 1px solid #000;
                                    border-right: 1px solid #000;
                                    border-bottom: 1px solid #000;
                                ">
                                    {{ $totalWater }}
                                </td>
                                <td
                                    style="
                                    font-size: 10px;
                                    line-height: 14px;
                                    font-weight: 700;
                                    color: #000;
                                    text-align: right;
                                    padding: 0px 5px !important;
                                    margin: 0px 0px !important;
                                    height: 20px;
                                    border-top: 1px solid #000;
                                    border-right: 1px solid #000;
                                    border-bottom: 1px solid #000;
                                ">
                                    {{ $totalFurn }}
                                </td>
                                <td
                                    style="
                                    font-size: 10px;
                                    line-height: 14px;
                                    font-weight: 700;
                                    color: #000;
                                    text-align: right;
                                    padding: 0px 5px !important;
                                    margin: 0px 0px !important;
                                    height: 20px;
                                    border-top: 1px solid #000;
                                    border-right: 1px solid #000;
                                    border-bottom: 1px solid #000;
                                ">
                                    {{ $totalMiscRent }}
                                </td>
                                <td
                                    style="
                                    font-size: 10px;
                                    line-height: 14px;
                                    font-weight: 700;
                                    color: #000;
                                    text-align: right;
                                    padding: 0px 5px !important;
                                    margin: 0px 0px !important;
                                    height: 20px;
                                    border-top: 1px solid #000;
                                    border-right: 1px solid #000;
                                    border-bottom: 1px solid #000;
                                ">
                                    {{ $total_sum_debit }}
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
                                    - {{ $year ?? 'N/A' }} </br>{{ $category_fund_type }} STAFF
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
                <td style="padding: 0 0px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                            <tr>
                                <td colspan="9"
                                    style="
                font-size: 15px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
              ">
                                    DEBIT2 SUMMARY REPORT FOR BILLNO
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>

            <tr>
                <td style="padding: 0 0px">
                    <table width="30%" border="0" cellpadding="0" cellspacing="0" align="center">
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
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      background: #cdcdcd;
                    ">
                                    PAGE NO
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
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      border-right: 1px solid #000;
                      background: #cdcdcd;
                    ">
                                    TABLE REC
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $tot_sum_record = 0;
                            @endphp
                            @foreach ($pageArraySingleTableRec as $new_rec => $record)
                                @php
                                    $tot_sum_record += $record;
                                @endphp
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
                border-left: 1px solid #000;
                border-top: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                                        {{ $new_rec + 1 }}
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
                border-left: 1px solid #000;
                border-right: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                                        {{ $record ?? 0 }}
                                    </td>
                                </tr>
                            @endforeach
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
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
          ">
                                    {{ $tot_sum_record }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>






        </tbody>
    </table>
    {{-- @dd($pageArraySingleTableRec) --}}
    <div class="page-break"></div>
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
                                    - {{ $year ?? 'N/A' }} </br>{{ $category_fund_type }} STAFF
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
                <td style="padding: 0 0px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                            <tr>
                                <td colspan="9"
                                    style="
                font-size: 15px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
              ">
                                    SUMMARY FOR CATEGORY {{ $category_fund_type == 'NPS' ? 'NS' : 'GS' }} FOR THE
                                    MONTH OF MARCH -2025
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding: 0 0px; width: 30%; vertical-align: top;">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center"
                        style="margin: 0 auto;">
                        <tr>
                            <td width="30%" style="vertical-align: top;">
                                <table width="90%" border="0" cellpadding="0" cellspacing="0">
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
                                  border-top: 1px solid #000;
                                  border-left: 1px solid #000;
                                  background: #cdcdcd;
                                ">
                                                CREDIT
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
                                  border-top: 1px solid #000;
                                  border-left: 1px solid #000;
                                  border-right: 1px solid #000;
                                  background: #cdcdcd;
                                ">
                                                Amount
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
                            text-align: left;
                            padding: 0px 5px !important;
                            margin: 0px 0px !important;
                            height: 20px;
                            border-left: 1px solid #000;
                            border-top: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                BASIC PAY
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
                            border-left: 1px solid #000;
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                {{ $columnTotals['basic'] }}

                                            </td>
                                        </tr>
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
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                DA
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
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                {{ $columnTotals['da'] }}

                                            </td>
                                        </tr>
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
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                HRA
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
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                {{ $columnTotals['hra'] }}

                                            </td>
                                        </tr>
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
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                TPT ALLOW
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
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                {{ $columnTotals['tpt'] }}

                                            </td>
                                        </tr>
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
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                TPTDA
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
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                {{ $columnTotals['da_on_tpt'] }}

                                            </td>
                                        </tr>
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
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                SPL PAY
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
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                {{ $columnTotals['spay'] }}

                                            </td>
                                        </tr>
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
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                SPL INCENT
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
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                {{ $columnTotals['spl_incent'] }}

                                            </td>
                                        </tr>
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
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                INCENTIVE
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
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                {{ $columnTotals['incentive'] }}

                                            </td>
                                        </tr>
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
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                DRESS ALLEWN
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
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                {{ $columnTotals['dress_allow'] }}

                                            </td>
                                        </tr>
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
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                VARIABLE AMT
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
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                {{ $columnTotals['var_incr'] }}

                                            </td>
                                        </tr>
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
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                ARRS OF PAY & ALLOW
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
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                {{ $columnTotals['pay_allow'] }}

                                            </td>
                                        </tr>
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
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                RISK ALLWN
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
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                {{ $columnTotals['risk_allow'] }}

                                            </td>
                                        </tr>
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
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                NPSC 14%
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
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                {{ $columnTotals['npsc_credit_it'] }}

                                            </td>
                                        </tr>
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
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                NPS Arrs 14%
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
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                {{ $columnTotals['npg_arrs_credit_it'] }}

                                            </td>
                                        </tr>
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
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                NPS ADJ14%
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
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                {{ $columnTotals['npg_adg_credit'] }}

                                            </td>
                                        </tr>
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
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                MISC CREDIT (IT)
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
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                {{ $columnTotals['misc_credit_it'] }}

                                            </td>
                                        </tr>
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
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                MISC CREDIT
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
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                {{ $columnTotals['misc_credit'] }}

                                            </td>
                                        </tr>
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
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                CREDITS
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
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                {{ array_sum($columnTotals) }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td width="30%" style="margin: 0 auto; vertical-align: top;">
                                <table width="90%" border="0" cellpadding="0" cellspacing="0">
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
                                  border-top: 1px solid #000;
                                  border-left: 1px solid #000;
                                  background: #cdcdcd;
                                ">
                                                DEBITS
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
                                  border-top: 1px solid #000;
                                  border-left: 1px solid #000;
                                  border-right: 1px solid #000;
                                  background: #cdcdcd;
                                ">
                                                Amount
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
                            text-align: left;
                            padding: 0px 5px !important;
                            margin: 0px 0px !important;
                            height: 20px;
                            border-left: 1px solid #000;
                            border-top: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                GPF SUB
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
                            border-left: 1px solid #000;
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                {{ $totalGpfSub ?? 0 }}

                                            </td>
                                        </tr>
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
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                GPF ADV
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
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                {{ $totalGpfAdv ?? 0 }}

                                            </td>
                                        </tr>
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
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                GPF ARRS
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
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                {{ $totalGpfArr ?? 0 }}

                                            </td>
                                        </tr>
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
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                CGEGIS
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
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                {{ $totalCgegis ?? 0 }}

                                            </td>
                                        </tr>
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
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                CGHS
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
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                {{ $totalCghs ?? 0 }}

                                            </td>
                                        </tr>
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
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                HBA ADV
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
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                {{ $totalHbaAdv ?? 0 }}

                                            </td>
                                        </tr>
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
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                HBA INT
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
                            text-align: left;
                            padding: 0px 5px !important;
                            margin: 0px 0px !important;
                            height: 20px;
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                CAR ADV
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
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                {{ $totalCarAdv ?? 0 }}

                                            </td>
                                        </tr>
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
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                CAR INT
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
                            text-align: left;
                            padding: 0px 5px !important;
                            margin: 0px 0px !important;
                            height: 20px;
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                SCO ADV
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
                            text-align: left;
                            padding: 0px 5px !important;
                            margin: 0px 0px !important;
                            height: 20px;
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                SCO INT
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
                            text-align: left;
                            padding: 0px 5px !important;
                            margin: 0px 0px !important;
                            height: 20px;
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                COMP ADV
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
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                {{ $totalCompAdv ?? 0 }}

                                            </td>
                                        </tr>
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
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                COMP INT
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
                            text-align: left;
                            padding: 0px 5px !important;
                            margin: 0px 0px !important;
                            height: 20px;
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                FEST ADV
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
                            text-align: left;
                            padding: 0px 5px !important;
                            margin: 0px 0px !important;
                            height: 20px;
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                LTC
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
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                {{ $totalLtc ?? 0 }}

                                            </td>
                                        </tr>
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
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                MED DEBIT
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
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                {{ $totalMedDebit ?? 0 }}

                                            </td>
                                        </tr>
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
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                TADA
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
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                {{ $totalTada ?? 0 }}

                                            </td>
                                        </tr>
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
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                LEAVE REC
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
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                {{ $totalLeaveRec ?? 0 }}

                                            </td>
                                        </tr>
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
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                PENTION REC
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
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                {{ $totalPensionRec ?? 0 }}

                                            </td>
                                        </tr>
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
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                INCOME TAX
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
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                {{ $totalIncomeTax ?? 0 }}

                                            </td>
                                        </tr>
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
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                EDU CESS
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
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                {{ $totalEduCess ?? 0 }}

                                            </td>
                                        </tr>
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
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                PL INSUR
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
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                {{ $totalPlInsur ?? 0 }}

                                            </td>
                                        </tr>
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
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                MISC DEBIT
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
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                {{ $totalMiscDebit ?? 0 }}

                                            </td>
                                        </tr>
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
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                MISC DEBIT (IT)
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
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                {{ $totalMiscDebitIt ?? 0 }}

                                            </td>
                                        </tr>
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
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                NPS 10% REC
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
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                {{ $totalNps10Rec ?? 0 }}

                                            </td>
                                        </tr>
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
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                NPSG 14%
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
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                {{ $totalNpsg ?? 0 }}

                                            </td>
                                        </tr>
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
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                NPS ARR10%
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
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                {{ $totalNps10Arr ?? 0 }}

                                            </td>
                                        </tr>
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
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                NPSG ARR14%
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
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                {{ $totalNpsgArr ?? 0 }}

                                            </td>
                                        </tr>
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
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                NPS ADJ10%
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
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                {{ $totalNpsAdj ?? 0 }}

                                            </td>
                                        </tr>

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
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                NPS ADJ14%
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
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                {{ $totalNps14Adj ?? 0 }}

                                            </td>
                                        </tr>

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
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                CGHS ARR
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
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                {{ $totalCghsArr ?? 0 }}

                                            </td>
                                        </tr>
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
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                CGEIS ARR
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
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                {{ $totalCgeisArr ?? 0 }}

                                            </td>
                                        </tr>
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
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                PENAL INTR
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
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                {{ $totalPenalIntr ?? 0 }}

                                            </td>
                                        </tr>
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
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                LICENCE FEE
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
                            text-align: left;
                            padding: 0px 5px !important;
                            margin: 0px 0px !important;
                            height: 20px;
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                ELECT
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
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                {{ $totalElec ?? 0 }}
                                            </td>
                                        </tr>
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
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                WATER
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
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                {{ $totalWater ?? 0 }}
                                            </td>
                                        </tr>
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
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                FURN
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
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                {{ $totalFurn ?? 0 }}

                                            </td>
                                        </tr>
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
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                MISC RENT
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
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                {{ $totalMiscRent ?? 0 }}

                                            </td>
                                        </tr>
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
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                <b>DEBITS</b>
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
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                {{ $total_sum_debit }}
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </td>
                            <td width="30%" style="vertical-align: top;">
                                <table width="90%" border="0" cellpadding="0" cellspacing="0">
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
                            border-left: 1px solid #000;
                            border-top: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                NET PAYBILL PAY
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
                            border-left: 1px solid #000;
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                           {{ (is_array($columnTotals) ? array_sum($columnTotals) : 0) - ($total_sum_debit ?? 0) }}

                                            </td>
                                        </tr>
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
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                TABLE RECOVERY
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
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                {{$tot_sum_record}}
                                            </td>
                                        </tr>
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
                            border-left: 1px solid #000;
                            border-bottom: 1px solid #000;
                            ">
                                                NAT PAY AFTER TOTAL DEDUCTION & TABLE RECOVERY
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
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                          ">
                                                {{
                                                    (is_array($columnTotals) ? array_sum($columnTotals) : 0)
                                                    - ($total_sum_debit ?? 0)
                                                    - ($tot_sum_record ?? 0)
                                                }}

                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"
                                                style="
                            font-size: 10px;
                            line-height: 14px;
                            font-weight: 400;
                            color: #000;
                            text-align: center;
                            padding: 0px 5px !important;
                            margin: 0px 0px !important;
                            height: 20px;
                            border-left: 1px solid #000;
                            border-right: 1px solid #000;
                            border-bottom: 1px solid #000;
                            ">
                                                <p style="font-size: 20px; text-align: center;">Nett  {{ (is_array($columnTotals) ? array_sum($columnTotals) : 0) - ($total_sum_debit ?? 0) }}</p>
                                                NAT PAY AFTER TOTAL DEDUCTION & TABLE RECOVERY

                                                <P style="font-size:18px; text-align: center; ">DATE: 23-4-2025</P>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    {{-- <div class="page-break"></div> --}}
</body>

</html>
