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
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; text-transform: uppercase;">
                                    {{ $today ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 14px; line-height: 10px; font-weight: 600; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none; text-transform: uppercase;">
                                    Center for High Energy Systems & Science, Hydrabad
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
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; text-transform: uppercase;">
                                    Category: : {{ $category ?? '' }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none; text-transform: uppercase;">
                                    Pay Roll for the Month of {{ $get_month_name ?? '' }}-{{ $year ?? ''}}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; text-transform: uppercase;">
                                    Unit Code -330000110
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
                                <td colspan="3"
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none; text-transform: uppercase;">
                                    Total Earnings
                                </td>
                                <td colspan="2"
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none; text-transform: uppercase;">
                                    Total Deductions
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    Basic Pay
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    {{ $total['basic'] ?? 0 }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    19/015/01
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    NPS Supscription
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    {{ $total['basic'] ?? 0 }}
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    Special Pay
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    {{ $total['special'] ?? 0 }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    19/015/01
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    NPS Refunds
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    0
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    2 Additional Increment
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    {{ $total['2incr'] ?? 0 }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    19/015/01
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    Rent
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    {{ $total['rent'] ?? 0 }}
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    Variable Increment
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    {{ $total['var_incr'] ?? 0 }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    19/015/01
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    Electricity
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    {{ $total['elec'] ?? 0 }}
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    Dearness Allowances
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    {{ $total['da'] ?? 0 }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    19/015/01
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    Water
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    {{ $total['water'] ?? 0 }}
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    House Rent Allowances
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    {{ $total['house_rent'] ?? 0 }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    19/015/01
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    Furniture
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    {{ $total['furn'] ?? 0 }}
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    Transport Allowances
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    {{ $total['transport'] ?? 0 }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    19/015/01
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    NPS Supscription
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    0
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    Family Planning Allowances
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    0
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    19/015/01
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    Rent Arrears
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    0
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    Hindi Allowances
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    {{ $total['hindi'] ?? 0 }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    19/015/01
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    Electricity Arrears
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    {{ $total['elec_arr'] ?? 0 }}
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    Deputation Allowances
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    {{ $total['deptn_alw'] ?? 0 }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    19/015/01
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    Water Arrears
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    {{ $total['water_arr'] ?? 0 }}
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    Disable Allowances
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    0
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    19/015/01
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    Furniture Arrears
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    {{ $total['furn_arr'] ?? 0 }}
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    Washing Allowances
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    {{ $total['wash_alwn'] ?? 0 }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    19/015/01
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    Car Advance
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    {{ $total['car_adv'] ?? 0 }}
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    Risk Allowances
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    {{ $total['risk_alwn'] ?? 0 }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    19/015/01
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    Car Advance Interest
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    {{ $total['car_adv_intrst'] ?? 0 }}
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    Non Practice Allowances
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    {{ $total['non_pract_alwn'] ?? 0 }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    19/015/01
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    Scooter Advance Interest
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    {{ $total['sctr_adv_intrst'] ?? 0 }}
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    Cr Rent
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    {{ $total['cr_rent'] ?? 0 }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    19/015/01
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    Cycle Advance
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    0
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    Cr Electricity
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    {{ $total['cr_elec'] ?? 0 }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    19/015/01
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    Cycle Advance Interest
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    0
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    Cr Water
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    {{ $total['cr_water'] ?? 0 }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    19/015/01
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    HBA Advance
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    {{ $total['hba_adv'] ?? 0 }}
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    Misc 1
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    {{ $total['misc1'] ?? 0 }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    19/015/01
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    HBA Advance Interest
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    {{ $total['hba_adv_int'] ?? 0 }}
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    Misc 2
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    {{ $total['misc2'] ?? 0 }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    19/015/01
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    PLI
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    {{ $total['pli'] ?? 0 }}
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    Gross
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000;">
                                    {{ $total['gross'] ?? 0 }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    19/015/01
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    CGEGIS
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    {{ $total['cgegis'] ?? 0 }}
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    CGHS
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    {{ $total['cghs'] ?? 0 }}
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    IT
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    {{ $total['it'] ?? 0 }}
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    E.Cess
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    {{ $total['ecess'] ?? 0 }}
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    IT Surcharge
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    0
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    TA/DA
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    {{ $total['tada'] ?? 0 }}
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    LTC
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    {{ $total['ltc'] ?? 0 }}
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    Medical
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    {{ $total['medical'] ?? 0 }}
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    EOL/HPL
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    {{ $total['eol_hpl'] ?? 0 }}
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    PC Advance
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    {{ $total['pc_adv'] ?? 0 }}
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    PC Advance Interest
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    0
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    Festival Advance Recovery
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    {{ $total['festival_adv_rec'] ?? 0 }}
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    Professional Tax
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    {{ $total['professional_tx'] ?? 0 }}
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    HRA Rec
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    {{ $total['hra_rec'] ?? 0 }}
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    TPT Rec
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    {{ $total['tpt_rec'] ?? 0 }}
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    Misc 1
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    {{ $total['misc1_debit'] ?? 0 }}
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    Misc 2
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    {{ $total['misc2_debit'] ?? 0 }}
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    Misc 3
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    {{ $total['misc3_debit'] ?? 0 }}
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    NPS Arrears
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    0
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-top: 1px solid #000;">
                                    0
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    Total Debits
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000;">
                                    {{ $total['total_debit'] ?? 0 }}
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    Net Pay
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                    {{ $total['net_pay'] ?? 0 }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="height: 20px;"></td>
            </tr>
            <tr>
                <td style="padding:0 0px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    (Rupees Zero Only)
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