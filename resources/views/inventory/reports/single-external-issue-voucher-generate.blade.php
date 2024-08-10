
<!DOCTYPE html>
<html lang="en">
<title>RCI</title>
<meta charset="utf-8" />

<body style="background: #fff">

    <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff"
        style="border-radius: 0px; margin: 0 auto">

        <tbody>
            <tr>
                <td style="padding: 0 0px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>

                            <tr>
                                <td style=" font-size: 12px;
                                line-height: 16px;
                                font-weight: 600;
                                color: #000;
                                text-align: center;
                                text-transform: uppercase;
                                padding: 0px 0px 10px 0px;
                                ">

                                    CENTER FOR HIGH ENERGY STSTEMS & SCIENCES


                                </td>
                            </tr>
                            <tr>
                                <td style=" font-size: 12px;
                                line-height: 16px;
                                font-weight: 600;
                                color: #000;
                                text-align: center;
                                padding: 0px 5px 30px 5px;
                                margin: 0px 0px 30px 0px; ">

                                    RCI CAMPUS, HYDERABAD - 500 069


                                </td>
                            </tr>


                            <tr>
                                <td style=" font-size: 12px;
                                line-height: 16px;
                                font-weight: 600;
                                color: #000;
                                text-align: center;
                                text-transform: uppercase; text-decoration: underline; ">
                                    EXTERNAL ISSUE VOUCHER (EIV)
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </td>
            </tr>


            <tr>
                <td>
                    <table width="60%" border="0" cellpadding="0" cellspacing="0" align="left"
                        style="padding-top: 20px;">
                        <tbody>
                            <tr>
                                <td style="font-size: 12px;
                                line-height: 16px;
                                font-weight: 600;
                                color: #000;
                                text-align: left;">Permanent issue
                                </td>
                                <td style="font-size: 12px;
                                line-height: 16px;
                                font-weight: 600;
                                color: #000;
                                text-align: left; padding-left: 10px;">Free/Payment issue
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px;
                                line-height: 16px;
                                font-weight: 600;
                                color: #000;
                                text-align: left;">
                                    Consignee:
                                </td>
                                <td style="font-size: 12px;
                                line-height: 16px;
                                font-weight: 600;
                                color: #000;
                                text-align: left; padding-left: 10px;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px;
                                line-height: 16px;
                                font-weight: 600;
                                color: #000;
                                text-align: left;">
                                    TO BE COMPLETED BY THE ISSUING OFFICER
                                </td>
                                <td style="font-size: 12px;
                                line-height: 16px;
                                font-weight: 600;
                                color: #000;
                                text-align: left; padding-left: 10px;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px;
                                line-height: 16px;
                                font-weight: 600;
                                color: #000;
                                text-align: left;">
                                    TO
                                </td>
                                <td style="font-size: 12px;
                                line-height: 16px;
                                font-weight: 600;
                                color: #000;
                                text-align: left; padding-left: 10px;">

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="50%" border="0" cellpadding="0" cellspacing="0" align="left"
                        style="padding-top: 20px; padding-bottom: 20px;">
                        <tbody>
                            <tr>
                                <td style="font-size: 12px;
                                line-height: 16px;
                                font-weight: 600;
                                color: #000;
                                text-align: right;">
                                    EIV No.: {{ $externalIssueVoucher->voucher_no ?? 'N/A'}}
                                </td>
                                <td style="font-size: 12px;
                                line-height: 16px;
                                font-weight: 600;
                                color: #000;
                                text-align: left; padding-left: 10px;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px;
                                line-height: 16px;
                                font-weight: 600;
                                color: #000;
                                text-align: right; padding-bottom: 30px;">
                                    Authority of Issue:
                                </td>
                                <td style="font-size: 12px;
                                line-height: 16px;
                                font-weight: 600;
                                color: #000;
                                text-align: left; padding-left: 10px;">

                                </td>
                            </tr>

                        </tbody>
                    </table>
                </td>
            </tr>

            <tr>
                <td>
                    <table width="60%" border="0" cellpadding="0" cellspacing="0" align="left"
                        style="padding-top: 20px; padding-bottom: 20px;">
                        <tbody>
                            <tr>
                                <td style="font-size: 12px;
                                line-height: 16px;
                                font-weight: 600;
                                color: #000;
                                text-align: left;">Non-Returnable Material Gate Pass No. {{ $gatepass->gate_pass_no ?? 'N/A'}}
                                </td>
                                <td style="font-size: 12px;
                                line-height: 16px;
                                font-weight: 600;
                                color: #000;
                                text-align: left; padding-left: 10px;">, Dt:
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                            <tr style=" border: 1px solid black;">
                                <th style=" border: 1px solid black; font-size: 12px;">SI.No</th>
                                <th style=" border: 1px solid black; font-size: 12px;">Item Code</th>
                                <th style=" border: 1px solid black; font-size: 12px;">Nomenclature</th>
                                <th style=" border: 1px solid black; font-size: 12px;">A/U</th>
                                <th style=" border: 1px solid black; font-size: 12px;">Ledger Folio & <br> Page No.</th>
                                <th style=" border: 1px solid black; font-size: 12px;">Unit Price</th>
                                <th style=" border: 1px solid black; font-size: 12px;">Quantity <br> Issue</th>
                                <th style=" border: 1px solid black; font-size: 12px;">Cost</th>
                                <th style=" border: 1px solid black; font-size: 12px;">Remarks</th>
                            </tr>
                            <tr style="height: 250px;">
                                <td style=" border: 1px solid black;  padding: 0px 5px 0px 5px; font-size: 12px;">1.&nbsp;</td>
                                <td style=" border: 1px solid black;  padding: 0px 5px 0px 5px; font-size: 12px;">{{ $itemDesc->code }}</td>
                                <td style=" border: 1px solid black; padding: 0px 5px 0px 5px; font-size: 12px;">{{ $itemDesc->description }}</td>
                                <td style=" border: 1px solid black; padding: 0px 5px 0px 5px; font-size: 12px;">Yes</td>
                                <td style=" border: 1px solid black; padding: 0px 5px 0px 5px; font-size: 12px;">001</td>
                                <td style=" border: 1px solid black; padding: 0px 5px 0px 5px; font-size: 12px;">50</td>
                                <td style=" border: 1px solid black; padding: 0px 5px 0px 5px; font-size: 12px;">100</td>
                                <td style=" border: 1px solid black; padding: 0px 5px 0px 5px; font-size: 12px;">5000</td>
                                <td style=" border: 1px solid black; padding: 0px 5px 0px 5px; font-size: 12px;">{{ $externalIssueVoucher->remarks }}</td>
                            </tr>

                        </tbody>
                    </table>
                </td>
            </tr>

            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="left"
                        style="padding-top: 20px; padding-bottom: 20px;">
                        <tbody>
                            <tr>
                                <td style="font-size: 12px;
                                line-height: 16px;
                                font-weight: 600;
                                color: #000;
                                text-align: left;">Authority No. Under buy back against CP Demand No
                                </td>
                                <td style="font-size: 12px;
                                line-height: 16px;
                                font-weight: 600;
                                color: #000;
                                text-align: left; padding-left: 10px;">Total Cost of Issue: 5000
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
                                <th style=" font-size: 12px;
                                line-height: 16px; width: 33.33%;
                                font-weight: 600;
                                color: #000;
                                text-align: left;
                                padding: 0px 0px 10px 0px;
                                ">
                                    Signature of <br>
                                    Stock Holder

                                </th>
                                <th style=" font-size: 12px;
                                line-height: 16px; width: 33.33%;
                                font-weight: 600;
                                color: #000;
                                text-align: left;
                                padding: 10px 0px 10px 0px;
                                ">
                                    Signature of <br>
                                    OI/c. CRDS/GH/TD/PD

                                </th>
                                <th style=" font-size: 12px;
                                line-height: 18px;
                                font-weight: 600;
                                color: #000; width: 33.33%;
                                text-align: center;
                                padding: 0px 0px 10px 0px;
                                ">


                                </th>
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
                                <th style=" font-size: 12px;
                                line-height: 18px; width: 33.33%;
                                font-weight: 600;
                                color: #000;
                                text-align: center;
                                padding: 0px 0px 10px 0px;
                                ">


                                </th>
                                <th style=" font-size: 12px;
                                line-height: 18px; width: 33.33%;
                                font-weight: 600;
                                color: #000;
                                text-align: center;
                                padding: 10px 0px 10px 0px;
                                ">


                                </th>
                                <th style=" font-size: 12px;
                                line-height: 18px; width: 33.33%;
                                font-weight: 600;
                                color: #000;
                                text-align: center;
                                padding: 10px 0px 10px 0px; border: 1px solid #000;
                                ">
                                    1. Items charged off from respective ledger.

                                </th>
                            </tr>

                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>

    </table>

</body>

</html>