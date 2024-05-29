
<!doctype html>
<html lang="en">
<title>RCI</title>
<meta charset="utf-8" />

<body style="background: #fff;">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff"
        style="border-radius: 0px; margin: 0 auto; text-align: center;">
        <tbody>
            <tr>
                <td style="padding:0 0px">
                    <table width="100%" border="" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: center; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    GOVT. OF INDIA , MINISTRY OF DEFENCE<br>
                                    CENTER FOR HIGH ENERGY SYSTEMS AND SCIENCE CHESS, HYDERABAD-500069 <br>
                                    PAY SLIP FOR THE MONTH OF : NOVEMBER-2023
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
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left;  text-transform: uppercase; padding: 0px 0px !important;
                                    margin: 0px 0px !important;">
                                    Ecode:<br>
                                    Name:<br>
                                    Rank(level)<br>
                                    Pan<br>
                                    Soc.MNO:
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left;  text-transform: uppercase; padding: 0px 0px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member->emp_id }}<br>
                                    {{ $member->name }} <br>
                                    {{ $member->designation->designation }}({{ $member->payLevels->value }})<br>
                                    {{ $member_core_info->pan_no }}<br>
                                </td>
                                <td><img style="width: 50px; height: 50px; margin: 0 auto; padding: 0px 5px !important;
                                    " src="https://excellis.co.in/rci/frontend_assets/images/drdo-logo.png" alt=""
                                        height=100% width=100%></img></td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left;  text-transform: uppercase; padding: 0px 0px !important;
                                    margin: 0px 0px !important;">
                                    Gpfno:<br>
                                    bank name: <br>
                                    Account no:<br>
                                    ifsc no:
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left;  text-transform: uppercase; padding: 0px 0px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_core_info->gpf_acc_no }}<br>
                                    {{ $member_core_info->bank }} <br>
                                    {{ $member_core_info->bank_acc_no }}<br>
                                    {{ $member_core_info->bank->ifsc }}
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
                                <th colspan="2" style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    CREDITS</th>
                                <th colspan="2" style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    DEDUCTION - I </th>
                                <th colspan="2" style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    DEDUCTION - II</th>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    मूल बेतन / BASIC PAY
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_credit_data->pay }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    GPF SUB
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    5000
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    SOCIETY
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    2500
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    महंगाई भत्ता / DA
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_credit_data->da }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    GPF ADV
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    0
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    MESS
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    0
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    मकान किराया भत्ता / HRA
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_credit_data->hra }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    GPF ARRS
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    0
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    WELFARE
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    20
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    परिबाहन भत्ता / Tpt allow
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_credit_data->tpt }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    CGEGIS
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    60
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    PTAX
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    200
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    परिबाहन महंगाई भत्ता / TPTDA
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_credit_data->da_on_tpt }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    CGHS
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    650
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    ASSOCIATION STORES
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    0
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    बिशेष बेतन / SPL PAY
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                   {{ $member_credit_data->s_pay ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    HBA ADV
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    0
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    बिशेष प्रोत्साहन / SPL INCENT
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_credit_data->spl_incentive ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    HBA INT
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    0
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    प्रोत्साहन भत्ता / INCENTIVE
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_credit_data->incentive ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    CAR ADV
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    0
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    वर्दी भत्ता / DRESS ALLWN
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_credit_data->dis_alw ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    CAR INT
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    0
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    परिबर्ति राशि / VARIABLE AMT
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_credit_data->variable_amt ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    SCO ADV
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    0
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    ARRS OF PAY & ALLOW
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_credit_data->arrs_pay_alw ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    SCO INT
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    0
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    जोखिम भत्ता / RISK ALLWN
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_credit_data->risk_alw ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    COMP ADV
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    0
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    बिबिध जमा (आयकर ) / MISC CREDIT (IT)
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_credit_data->misc1 ?? 0}}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    COMP INT
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    0
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    बिबिध जमा / MISC CREDIT
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_credit_data->misc2 ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    FEST ADV
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    0
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    LTC
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    0
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    MED DEBIT
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    0
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    TADA
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    0
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    LEAVE REC
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    0
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    PENSION REC
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    0
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    INCOME TAX
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    15000
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    EDU CESS
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    600
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    PL INSUR
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    0
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px;  padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    MISC DEBIT
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    0
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px;  padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    MISC DEBIT(IT)
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    0
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    QUARTER CHARGES
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    0
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    CGHS ARR
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    0
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    CGEIS ARR
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    0
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px;  padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    PENAL INTR
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    0
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    TOTAL
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    137601
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    TOTAL
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    21310
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    TOTAL
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    2720
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    NET PAY BILL
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    116291
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    PAYSLIPNET
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    113571
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
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left;  text-transform: uppercase; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    Note :
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left;  text-transform: uppercase; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    1 Unsigned Payslip, only for information<br>
                                    2 This is not a salary certificate for the purpose of grant of loan/advance by any
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
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; height: 20px; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    tot adv
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    BAL adv
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    CI/TI
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    L.F
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    0
                                </td>
                                <td colspan="2" style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    GPF DETAILS
                                </td>

                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; height: 20px; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    GPF
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important; ">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    ELECTRICITY
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    OBAL
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    160613
                                </td>

                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; height: 20px; border: 1px solid #000;  padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    VEHICLE
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    WATER
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    CBAL
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    65613
                                </td>

                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; height: 20px; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    HBA
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    FURNITURE
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>

                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; height: 20px; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    COMP ADV/INT
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    MISC RENT
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>

                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; height: 20px; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    FEST ADWINT
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px;  padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px;  padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    LWFL BAL
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>

                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>