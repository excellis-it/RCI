<!doctype html>
<html lang="en">
<title>RCI</title>
<meta charset="utf-8" />

<style>
    @page {
        size: 29.7cm 42cm
    }

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
    table 
    {
        border-collapse: collapse;
        width: 100%;
    }
    th, td {
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
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff"
        style="border-radius: 0px; margin: 0 auto; text-align: center;">
        <tbody>

            <tr>
                <td style="padding:0 0px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <thead>
                            <tr>
                                <td colspan="5" style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px;  border-right: none !important;">
                                    PAY BILL {{ $pay_bill_no ?? 'N/A' }} FOR THE MONTH OF {{ $month ?? 'N/A' }} - {{ $year ?? 'N/A' }} GPF OFFICER
                                </td>
                                <td  colspan="3" style="text-align: center;"><img style="width: 50px; height: 50px; margin: 0 auto; padding: 0px 5px;border:1px solid #ffffff;" border="0" src="{{ public_path('frontend_assets/images/drdo-logo.png') }}" alt=""></td>
                                <td colspan="6" style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px; border-right: none !important;">
                                    Center For High Energy Systems and Science<br>
                                    Unit Code : ######### &nbsp; &nbsp; &nbsp; <span style="text-transform: uppercase; border-bottom: 1px solid #000;">Page NO.</span>
                                </td>
                            </tr>
                            <tr>
                                <th colspan="2" style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: center; padding: 0px 5px; border: 1px solid #000; text-transform: uppercase;">
                                    EMPLOYEE DETAILS
                                </th>
                                <th colspan="3" style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: center; padding: 0px 5px; border: 1px solid #000; text-transform: uppercase;">
                                    CREDITS
                                </th>
                                <th colspan="6" style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: center; padding: 0px 5px; border: 1px solid #000; text-transform: uppercase;">
                                    DEBITS
                                </th>
                                <th style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: center; padding: 0px 5px; border: 1px solid #000; text-transform: uppercase;">
                                    RENT
                                </th>
                                <th style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: center; padding: 0px 5px; border: 1px solid #000; text-transform: uppercase;">
                                    TOTAL
                                </th>
                                <th style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: center; padding: 0px 5px; border: 1px solid #000; text-transform: uppercase;">
                                    Sign
                                </th>
                            </tr>
                            <tr>
                                <td valign="top" style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px; border-left: 1px solid #000; border-top: 1px solid #000; border-right: 1px solid #000; text-transform: uppercase;">
                                    Sr.No.<br>NAME<br>CODE<br>RANK NAME<br>BANK A/C<br>IFSC
                                </td>
                                <td valign="top" style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px; border-left: 1px solid #000; border-top: 1px solid #000; border-right: 1px solid #000; text-transform: uppercase;">
                                    LEVEL<br>DATE OF BIRTH<br>GPF NO./PRAN NO<br>APPT DATE<br>VAR.INCR.NO, DNI<br>PAN NO
                                </td>
                                <td valign="top" style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px; border-left: 1px solid #000; border-top: 1px solid #000; border-right: 1px solid #000; text-transform: uppercase;">
                                    BASIC PAY<br>DA ({{ $da_percent->percentage ?? 'N/A' }}%)<br>HRA<br>TPT ALLOW<br>TPTDA<br>SPL PAY
                                </td>
                                <td valign="top" style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px; border-left: 1px solid #000; border-top: 1px solid #000; border-right: 1px solid #000; text-transform: uppercase;">
                                    SPL INCENT<br>INCENTIVE<br>DRESS ALLWN<br>VARIABLE AMT<br>ARRS OF PAY & ALLOW<br>RISK ALLWN
                                </td>
                                <td valign="top" style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px; border-left: 1px solid #000; border-top: 1px solid #000; border-right: 1px solid #000; text-transform: uppercase;">
                                    NPSC 14%<br>NPSG ARRS 14%<br>NPS ADJ14%<br>MISC CREDIT (IT)<br>MISC CREDIT
                                </td>
                                <td valign="top" style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px; border-left: 1px solid #000; border-top: 1px solid #000; border-right: 1px solid #000; text-transform: uppercase;">
                                    GPF SUB<br>GPF ADV<br>GPF ARRS<br>CCEGIS<br>CGHS<br>HBA ADV
                                </td>
                                <td valign="top" style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px; border-left: 1px solid #000; border-top: 1px solid #000; border-right: 1px solid #000; text-transform: uppercase;">
                                    HBA INT<br>CAR ADV<br>CAR INT<br>SCO ADV<br>SCO INT<br>COMP ADV
                                </td>
                                <td valign="top" style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px; border-left: 1px solid #000; border-top: 1px solid #000; border-right: 1px solid #000; text-transform: uppercase;">
                                    COMP INT<br>FEST ADV<br>LTC<br>MED DEBIT<br>TADA<br>LEAVE REC
                                </td>
                                <td valign="top" style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px; border-left: 1px solid #000; border-top: 1px solid #000; border-right: 1px solid #000; text-transform: uppercase;">
                                    PENSION REC<br>INCOME TAX<br>EDU CESS<br>PL INSUR<br>MISC DEBIT<br>MISC DEBIT (IT)
                                </td>
                                <td valign="top" style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px; border-left: 1px solid #000; border-top: 1px solid #000; border-right: 1px solid #000; text-transform: uppercase;">
                                    NPS 10% REC.<br>NPSG 14%<br>NPS ARR 10%<br>NPSG ARR 14%<br>NPS ADJ 10%<br>NPS ADJ 14%
                                </td>
                                <td valign="top" style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px; border-left: 1px solid #000; border-top: 1px solid #000; border-right: 1px solid #000; text-transform: uppercase;">
                                    CGHS ARR<br>CGEIS ARR<br>PENAL INTR
                                </td>
                                <td valign="top" style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px; border-left: 1px solid #000; border-top: 1px solid #000; border-right: 1px solid #000; text-transform: uppercase;">
                                    LICENCE FEE<br>ELECT<br>WATER<br>FURN<br>MISC RENT
                                </td>
                                <td valign="top" style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px; border-left: 1px solid #000; border-top: 1px solid #000; border-right: 1px solid #000; text-transform: uppercase;">
                                    CREDITS<br>DEBITS<br>NET PAY<br>TABLE REC<br>PAYSLIP PAY
                                </td>
                                <td valign="top" style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px; border-left: 1px solid #000; border-top: 1px solid #000; border-right: 1px solid #000;"></td>
                            </tr>
                        </thead>
                        

                        @php
                            $pageNumber = 1;
                            $itemsPerPage = 2;
                            $totalItems = count($all_members_info);
                            $totalPages = ceil($totalItems / $itemsPerPage);
                            $totalBasicPay = 0;
                            $totalDa = 0;
                            $totalHra = 0;
                            $totalTpt = 0;
                            $totalDaOnTpt = 0;
                            $totalSpay = 0;

                        @endphp
                        

                        <tbody>
                            @foreach ($all_members_info as $key => $member_info)
                            
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
                                        {{ $member_info['details']['member_credit']->pay ?? '0' }}<br>
                                        {{ $member_info['details']['member_credit']->da ?? '0' }}<br>
                                        {{ $member_info['details']['member_credit']->hra ?? '0' }}<br>
                                        {{ $member_info['details']['member_credit']->tpt ?? '0' }}<br>
                                        {{ $member_info['details']['member_credit']->da_on_tpt ?? '0' }}<br>
                                        {{ $member_info['details']['member_credit']->s_pay ?? '0' }}
                                    </td>
                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                             margin: 0px 0px !important; text-transform: uppercase;border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
                                        {{ $member_info['details']['member_credit']->spl_incentive ?? '0' }}<br>
                                        {{ $member_info['details']['member_credit']->incentive ?? '0' }}<br>
                                        {{ $member_info['details']['member_credit']->dis_alw ?? '0' }}<br>
                                        {{ $member_info['details']['member_credit']->variable_amount ?? '0' }}<br>
                                        {{ $member_info['details']['member_credit']->arrs_pay_alw ?? '0' }}<br>
                                        {{ $member_info['details']['member_credit']->risk_alw ?? '0' }}

                                    </td>
                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                             margin: 0px 0px !important; text-transform: uppercase; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
                                        0 <br>
                                        0 <br>
                                        0 <br>
                                        {{ $member_info['details']['member_credit']->misc1 ?? '0' }}<br>
                                        {{ $member_info['details']['member_credit']->misc2 ?? '0' }}

                                    </td>
                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                             margin: 0px 0px !important; text-transform: uppercase; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
                                        {{ $member_info['details']['member_debit']->gpa_sub ?? '0' }}<br>
                                        {{ $member_info['details']['member_debit']->gpf_adv ?? '0' }}<br>
                                        {{ $member_info['details']['member_debit']->cgegis ?? '0' }}<br>
                                        {{ $member_info['details']['member_debit']->cghs ?? '0' }}<br>
                                        {{ $member_info['details']['member_debit']->hba_adv ?? '0' }}<br>

                                    </td>
                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                             margin: 0px 0px !important; text-transform: uppercase; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
                                        {{ $member_info['details']['member_debit']->hba_int ?? '0' }} <br>
                                        {{ $member_info['details']['member_debit']->car_adv ?? '0' }} <br>
                                        {{ $member_info['details']['member_debit']->car_int ?? '0' }} <br>
                                        {{ $member_info['details']['member_debit']->sco_adv ?? '0' }} <br>
                                        {{ $member_info['details']['member_debit']->sco_int ?? '0' }} <br>
                                        {{ $member_info['details']['member_debit']->comp_adv ?? '0' }}
                                    </td>
                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                             margin: 0px 0px !important; text-transform: uppercase; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
                                        {{ $member_info['details']['member_debit']->comp_int ?? '0' }} <br>
                                        {{ $member_info['details']['member_debit']->fadv ?? '0' }} <br>
                                        {{ $member_info['details']['member_debit']->ltc ?? '0' }} <br>
                                        {{ $member_info['details']['member_debit']->medi ?? '0' }} <br>
                                        {{ $member_info['details']['member_debit']->tada ?? '0' }} <br>
                                        {{ $member_info['details']['member_debit']->leave_rec ?? '0' }}
                                    </td>
                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                             margin: 0px 0px !important; text-transform: uppercase; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
                                        {{ $member_info['details']['member_debit']->pension_rec ?? '0' }} <br>
                                        {{ $member_info['details']['member_debit']->i_tax ?? '0' }} <br>
                                        {{ $member_info['details']['member_debit']->ecess ?? '0' }} <br>
                                        {{ $member_info['details']['member_debit']->pli ?? '0' }} <br>
                                        {{ $member_info['details']['member_debit']->misc1 ?? '0' }} <br>
                                        {{ $member_info['details']['member_debit']->misc2 ?? '0' }}
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
                                        {{ $member_info['details']['member_debit']->cghs ?? '0' }} <br>
                                        {{ $member_info['details']['member_debit']->cgeis_arr ?? '0' }} <br>
                                        {{ $member_info['details']['member_debit']->penal_intr ?? '0' }} <br>
                                    </td>
                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                             margin: 0px 0px !important; text-transform: uppercase; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
                                        0 <br>
                                        {{ $member_info['details']['member_debit']->elec ?? '0' }} <br>
                                        {{ $member_info['details']['member_debit']->water ?? '0' }} <br>
                                        {{ $member_info['details']['member_debit']->furn ?? '0' }} <br>
                                        {{ $member_info['details']['member_debit']->misc3 ?? '0' }}
                                    </td>
                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                             margin: 0px 0px !important; text-transform: uppercase; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
                                        {{ $member_info['details']['member_credit']->tot_credits ?? '0' }} <br>
                                        {{ $member_info['details']['member_debit']->tot_debits ?? '0' }} <br>
                                        {{ $member_info['details']['member_debit']->net_pay ?? '0' }} <br>
                                        0 <br>
                                        0 <br>
                                    </td>
                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                         margin: 0px 0px !important; text-transform: uppercase; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
                                    </td>
                                </tr>
                        
                        <tfoot>
                            @php
                                $totalBasicPay += $member_info['details']['member_credit']->pay ?? 0; // total basic pay
                                $totalDa += $member_info['details']['member_credit']->da ?? 0; // total da
                                $totalHra += $member_info['details']['member_credit']->hra ?? 0; // total hra
                                $totalTpt += $member_info['details']['member_credit']->tpt ?? 0; // total tpt
                                $totalDaOnTpt += $member_info['details']['member_credit']->da_on_tpt ?? 0; // total da on tpt
                                $totalSpay += $member_info['details']['member_credit']->s_pay ?? 0; // total special pay
                            @endphp

                            @if (($key + 1) % $itemsPerPage == 0 || $loop->last)
                            @php
                                $currentPage = intval($key / $itemsPerPage) + 2;
                            @endphp
                                
                                <tr>
                                    <td colspan="2" valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000; border-right: 1px solid #000; border-bottom: 1px solid #000;">
                                        Page {{ $currentPage }} Total
                                    </td>

                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                             margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000; border-right: 1px solid #000;border-bottom: 1px solid #000; border-bottom: 1px solid #000;">
                                        {{ $totalBasicPay }} <br>
                                        {{ $totalDa }} <br>
                                        {{ $totalHra }}<br>
                                        {{ $totalTpt }} <br>
                                        {{ $totalDaOnTpt }} </br>
                                        {{ $totalSpay }}

                                    </td>
                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                             margin: 0px 0px !important; text-transform: uppercase;border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
                                        0 <br>
                                        0 <br>
                                        0

                                    </td>
                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                             margin: 0px 0px !important; text-transform: uppercase; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
                                        0 <br>
                                        0 <br>
                                        0
                                    </td>
                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                             margin: 0px 0px !important; text-transform: uppercase; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
                                        0 <br>
                                        0 <br>
                                        0
                                    </td>
                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                             margin: 0px 0px !important; text-transform: uppercase; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
                                        0 <br>
                                        0 <br>
                                        0
                                    </td>
                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                             margin: 0px 0px !important; text-transform: uppercase; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
                                        0 <br>
                                        0 <br>
                                        0
                                    </td>
                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                             margin: 0px 0px !important; text-transform: uppercase; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
                                        0 <br>
                                        1856324 <br>
                                        75757
                                    </td>
                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                             margin: 0px 0px !important; text-transform: uppercase; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
                                        0 <br>
                                        0 <br>
                                        0
                                    </td>
                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                         margin: 0px 0px !important; text-transform: uppercase; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
                                        0 <br>
                                        0 <br>
                                        0
                                    </td>
                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                             margin: 0px 0px !important; text-transform: uppercase; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
                                        0 <br>
                                        0 <br>
                                        0
                                    </td>
                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                             margin: 0px 0px !important; text-transform: uppercase; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
                                        40960 <br>
                                        265890 <br>
                                        745690
                                    </td>
                                    <td valign="top"
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                         margin: 0px 0px !important; text-transform: uppercase; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
                                    </td>
                                </tr>
                                @php
                                    // Reset totals for the next page
                                    $totalBasicPay = 0;
                                    $totalDa = 0;
                                    $totalHra = 0;
                                    $totalTpt = 0;
                                    $totalDaOnTpt = 0;
                                    $totalSpay = 0;
                                @endphp
                            @endif
                        </tfoot>

                        @if (($key + 1) % 1 == 0 && !$loop->last)
                    <tfoot><tr class="page-break"></tr></tfoot>
                        @endif
                        @endforeach
            </tr>
        </tbody>
    </table>

</body>

</html>
