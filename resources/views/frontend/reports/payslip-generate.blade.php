<!doctype html>
<html lang="en">

<title>RCI</title>


<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
    @page {
        margin: 10px;
        padding: 10px;
    }


    @font-face {
        font-family: 'NotoSansDevanagari';
        src: url("{{ public_path('font/NotoSansDevanagari-Regular.ttf') }}") format('truetype');
        font-weight: normal;
        font-style: normal;
    }

    @font-face {
        font-family: 'NotoSansDevanagari';
        src: url("{{ public_path('font/NotoSansDevanagari-Bold.ttf') }}") format('truetype');
        font-weight: normal;
        font-style: normal;
    }

    @font-face {
        font-family: 'NotoSansDevanagari';
        src: url("{{ public_path('font/NotoSansDevanagari-Italic.ttf') }}") format('truetype');
        font-weight: normal;
        font-style: italic;
    }

    @font-face {
        font-family: 'NotoSansDevanagari';
        src: url("{{ public_path('font/NotoSansDevanagari-BoldItalic.ttf') }}") format('truetype');
        font-weight: normal;
        font-style: italic;
    }

    body,
    td {
        font-family: 'NotoSansDevanagari', sans-serif;
    }

    .page-break {
        page-break-before: always;
    }
</style>

<body style="background: #fff; ">
    @foreach ($member_info as $info)
        @php
            $member_data = $info['member_data'];
            $member_credit_data = $info['member_credit_data'];
            $member_debit_data = $info['member_debit_data'];
            $member_core_info = $info['member_core_info'];
            $member_recoveries_data = $info['member_recoveries_data'];
            $member_loans = $info['member_loans'];

            $tot_credits =
                ($member_credit_data->pay ?? 0) +
                ($member_credit_data->da ?? 0) +
                ($member_credit_data->hra ?? 0) +
                ($member_credit_data->tpt ?? 0) +
                ($member_credit_data->da_on_tpt ?? 0) +
                ($member_credit_data->s_pay ?? 0) +
                ($member_credit_data->spl_incentive ?? 0) +
                ($member_credit_data->incentive ?? 0) +
                ($member_credit_data->dis_alw ?? 0) +
                ($member_credit_data->var_amount ?? 0) +
                ($member_credit_data->arrs_pay_alw ?? 0) +
                ($member_credit_data->risk_alw ?? 0) +
                ($member_credit_data->misc1 ?? 0) +
                ($member_credit_data->misc2 ?? 0);

            $member_quarter_charge =
                ($member_debit_data->licence_fee ?? 0) +
                ($member_debit_data->elec ?? 0) +
                ($member_debit_data->water ?? 0) +
                ($member_debit_data->furn ?? 0) +
                ($member_debit_data->misc2 ?? 0);

            $tot_debits =
                ($member_debit_data->gpa_sub ?? 0) +
                ($member_debit_data->gpf_adv ?? 0) +
                ($member_debit_data->gpf_arr ?? 0) +
                ($member_debit_data->cgegis ?? 0) +
                ($member_debit_data->cghs ?? 0) +
                ($member_loans['hba_adv'] ?? 0) +
                ($member_loans['hba_int'] ?? 0) +
                ($member_loans['car_adv'] ?? 0) +
                ($member_loans['car_int'] ?? 0) +
                ($member_loans['sco_adv'] ?? 0) +
                ($member_loans['sco_int'] ?? 0) +
                ($member_loans['comp_adv'] ?? 0) +
                ($member_loans['comp_int'] ?? 0) +
                ($member_loans['fest_adv'] ?? 0) +
                ($member_debit_data->ltc ?? 0) +
                ($member_debit_data->medi ?? 0) +
                ($member_debit_data->tada ?? 0) +
                ($member_debit_data->leave_rec ?? 0) +
                ($member_debit_data->pension_rec ?? 0) +
                ($member_debit_data->i_tax ?? 0) +
                ($member_debit_data->ecess ?? 0) +
                ($member_debit_data->pli ?? 0) +
                ($member_debit_data->misc1 ?? 0) +
                ($member_debit_data->misc2 ?? 0) +
                ($member_debit_data->cghs_arr ?? 0) +
                ($member_debit_data->cgeis_arr ?? 0) +
                ($member_debit_data->penal_intr ?? 0) +
                $member_quarter_charge;

            $secondDeduction =
                ($member_debit_data->society ?? 0) +
                ($member_recoveries_data->mess ?? 0) +
                ($member_recoveries_data->wel_sub ?? 0) +
                ($member_recoveries_data->ptax ?? 0) +
                ($member_recoveries_data->asso_fee ?? 0);
        @endphp
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff"
            style="border-radius: 0px; margin: 0 auto; text-align: center;">
            <tbody>
                <tr>
                    <td style="padding:0 0px">
                        <table width="100%" border="" cellpadding="0" cellspacing="0" align="center">
                            <tbody>
                                <tr>
                                    <td
                                        style="font-size: 10px; font-weight: normal; line-height: 14px;  color: #000; text-align: center; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        भारत सरकार , रक्षा मंत्रालय
                                        GOVT. OF INDIA , MINISTRY OF DEFENCE<br>
                                        उच्च ऊर्जा प्रणाली एबं िवज्ञान केंद्र िवग्रयान कांचा (डाकघर ), हैदराबाद -
                                        500069<br>
                                        CENTER FOR HIGH ENERGY SYSTEMS AND SCIENCE CHESS, HYDERABAD-500069 <br>
                                        बेतन पर्ची PAY SLIP FOR THE MONTH OF : {{ $monthName }}-{{ $year }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding:0 0px">
                        <table width="100%" border="0" cellpadding="3" cellspacing="0" align="center">
                            <tbody>
                                <tr>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: left;  text-transform: uppercase; padding: 0px 0px !important;
                                    margin: 0px 0px !important; width:20%">
                                        कर्मचारी संकेत Ecode:<br>
                                        नाम Name:<br>
                                        पदनाम Rank(level)<br>
                                        Pan No<br>
                                        Soc.MNO:
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: left;  text-transform: uppercase; padding: 0px 0px !important;
                                    margin: 0px 0px !important; width:15%">
                                        {{ $member_data->emp_id ?? '' }}<br>
                                        {{ $member_data->name ?? '' }} <br>
                                        {{ $member_data->desigs->designation ?? '' }}({{ $member_data->payLevels->value ?? '' }})<br>
                                        {{ $member_data->pan_no ?? '' }}<br>

                                    </td>
                                    <td
                                        style="text-align: center; vertical-align: middle; padding: 0px 5px !important; margin: 0px 100px 0px 0px!important;">
                                        <img style="width: 50px; height: 50px;"
                                            src="{{ public_path('storage/' . $logo->logo) }}" />
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: left;  text-transform: uppercase; padding: 0px 0px !important;
                                    margin: 0px 0px !important; width:20%">
                                        भ. िन. िन. संख्या Gpfno:<br>
                                        bank name: <br>
                                        Account no:<br>
                                        ifsc no:
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: left;  text-transform: uppercase; padding: 0px 0px !important;
                                    margin: 0px 0px !important; width:20%">
                                        {{ $member->gpf_number ?? '' }}<br>
                                        {{ $member_core_info->bank ?? '' }} <br>
                                        {{ $member_core_info->bank_acc_no ?? '' }}<br>
                                        {{ $member_core_info->ifsc ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>

                    <td style="padding:0 0px">
                        <table width="100%" border="1" cellpadding="3" cellspacing="0" align="center">
                            <tbody>
                                <tr>
                                    <th colspan="2"
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        जमा / CREDITS</th>
                                    <th colspan="2"
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        कटौती - १ / DEDUCTION - I </th>
                                    <th colspan="2"
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        कटौती - २ / DEDUCTION - II</th>
                                </tr>
                                <tr>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        मूल बेतन / BASIC PAY
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $member_credit_data->pay ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        सामान्य भिबष्य िनिध अिभदान / GPF SUB
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $member_debit_data->gpa_sub ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        SOCIETY
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $member_debit_data->society ?? 0 }}
                                    </td>
                                </tr>DA
                                <tr>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        महंगाई भत्ता / DA
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $member_credit_data->da ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        सामान्य भिबष्य िनिध अिग्रम / GPF ADV
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $member_debit_data->gpf_adv ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        MESS
                                    </td>

                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $member_recoveries_data->mess ?? 0 }}
                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        मकान िकराया भत्ता / HRA
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $member_credit_data->hra ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        सा भ िन बकाया / GPF ARRS
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $member_debit_data->gpf_arr ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        WELFARE
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $member_recoveries_data->wel_sub ?? 0 }}
                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        प िरबाहन भत्ता / Tpt allow
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $member_credit_data->tpt ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        के स क सा बी यो / CGEGIS
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $member_debit_data->cgegis ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        PTAX
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $member_recoveries_data->ptax ?? 0 }}
                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        प िरबाहन महंगाई भत्ता / TPTDA
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $member_credit_data->da_on_tpt ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        केंद्रीय सरकारी स्वास्थ योजना / CGHS
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $member_debit_data->cghs ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        ASSOCIATION STORES
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $member_recoveries_data->asso_fee ?? 0 }}
                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        िबशेष बेतन / SPL PAY
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $member_credit_data->s_pay ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        आबास भवन अिग्रम / HBA ADV
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $member_loans['hba_adv'] ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        बिशेष प्रोत्साहन / SPL INCENT
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $member_credit_data->spl_incentive ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        आबास भवन अिग्रम / HBA INT
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $member_loans['hba_int'] ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        प्रोत्साहन भत्ता / INCENTIVE
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $member_credit_data->incentive ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        बाहन अिग्रम / CAR ADV
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $member_loans['car_adv'] ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        वर्दी भत्ता / DRESS ALLWN
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $member_credit_data->dis_alw ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        बाहन अिग्रम / CAR INT
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $member_loans['car_int'] ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        पिरबिर्त रिाश / VARIABLE AMT
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $member_credit_data->var_amount ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        स्कूटर अिग्रम / SCO ADV
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $member_loans['sco_adv'] ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        ARRS OF PAY & ALLOW
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $member_credit_data->arrs_pay_alw ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        स्कूटर अिग्रम ब्याज / SCO INT
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $member_loans['sco_int'] ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        जोखम भत्ता / RISK ALLWN
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $member_credit_data->risk_alw ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        संगणक अिग्रम / COMP ADV
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $member_loans['comp_adv'] ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        िबिबध जमा (आयकर ) / MISC CREDIT (IT)
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $member_credit_data->misc1 ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        संगणक अिग्रम ब्याज / COMP INT
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $member_loans['comp_int'] ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        िबिबध जमा / MISC CREDIT
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $member_credit_data->misc2 ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        त्योहार अिग्रम / FEST ADV
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $member_loans['fest_adv'] ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        छुट्टी िरयायत / LTC
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $member_debit_data->ltc ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        MED DEBIT
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $member_debit_data->medi ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        बै. भ / या. भ / TADA
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $member_debit_data->tada ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        LEAVE REC
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $member_debit_data->leave_rec ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        PENSION REC
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $member_debit_data->pension_rec ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        आयकर / INCOME TAX
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $member_debit_data->i_tax ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        EDU CESS
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $member_debit_data->ecess ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        PL INSUR
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $member_debit_data->pli ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px;  padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        िबिबध बकाया वसूली / MISC DEBIT
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $member_debit_data->misc1 ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px;  padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        MISC DEBIT(IT)
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $member_debit_data->misc2 ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        मकान वकाया / QUARTER CHARGES
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $member_quarter_charge ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        CGHS ARR
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $member_debit_data->cghs_arr ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        CGEIS ARR
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $member_debit_data->cgeis_arr ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px;  padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        PENAL INTR
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $member_debit_data->penal_intr ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        कुल / TOTAL
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $tot_credits ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        कुल / TOTAL
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $tot_debits ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        कुल / TOTAL
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $secondDeduction ?? 0 }}
                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        कुल बेतन िबल / NET PAY BILL
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        @php
                                            $netPayBill = ($tot_credits ?? 0) - ($tot_debits ?? 0);
                                        @endphp
                                        {{ $netPayBill ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        कुल बेतन पर्ची / PAYSLIP NET
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $netPayBill - $secondDeduction }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding:0 0px">
                        <table width="100%" border="0" cellpadding="3" cellspacing="0" align="center">
                            <tbody>
                                <tr>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: left;  text-transform: uppercase; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        Note :
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: left;  text-transform: uppercase; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        1 Unsigned Payslip, only for information<br>
                                        2 This is not a salary certificate for the purpose of grant of loan/advance by
                                        any
                                        agency.<br>
                                        3 Salary certificate if required, can be obtained from ADM group.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding:0 0px">
                        <table width="100%" border="1" cellpadding="3" cellspacing="0" align="center">
                            <tbody>
                                <tr>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; height: 20px; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        कुल अग्रम / tot adv
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        शेष अिग्रम / BAL adv
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        चालू / कुल हफ्ता / CI/TI
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        अनुज्ञ िप्त / L.F
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important; width: 50px;">
                                        0
                                    </td>
                                    <td colspan="2"
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        भ. िन. िन. / GPF DETAILS
                                    </td>

                                </tr>
                                <tr>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; height: 20px; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        भ िबष्य िनर्बाह / GPF
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $member_debit_data->gpf_adv ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important; ">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        िबजली / ELECTRICITY
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $member_debit_data->elec ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        आ िद शेष / OBAL
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        0
                                    </td>

                                </tr>
                                <tr>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; height: 20px; border: 1px solid #000;  padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        बाहन / VEHICLE
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        पानी / WATER
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $member_debit_data->water ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        अंत शेष / CBAL
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        0
                                    </td>

                                </tr>
                                <tr>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; height: 20px; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        गृह िनर्माण भत्ता / HBA
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        फर्नीचर / FURNITURE
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $member_debit_data->furn ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>

                                </tr>
                                <tr>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; height: 20px; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        संगणक / COMP ADV/INT
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        िबिबध मकान बकाया / MISC RENT
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        {{ $member_debit_data->misc1 ?? 0 }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>

                                </tr>
                                <tr>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; height: 20px; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        त्यौहार अिग्रम / FEST ADV/INT
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px;  padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px;  padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                        िबिबध बकाया वसूली शेष / LWFL BAL
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: normal; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        @if (count($member_info) > 1)
            <div class="page-break"></div>

        @endif
    @endforeach

</body>

</html>
