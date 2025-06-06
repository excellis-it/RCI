<!DOCTYPE html>
<html lang="en">
<title>RCI</title>
<meta charset="utf-8" />
<style>
    @page {
            margin: 25px;
            padding: 25px;
        }
</style>
<body style="background: #fff">

    <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff"
        style="border-radius: 0px; margin: 0 auto">

        <tbody>
            <tr>
                <td style="padding: 0 0px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                            <tr style=" padding: 0px 0px 20px 0px; text-align: right;">
                                <td style="text-align: left;"> ORIGINAL
                                </td>
                                <td style="text-align: right;"> DRDO.SM.18 <br>
                                    (In Triplicate)
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
                                <td style=" font-size: 10px;
                                line-height: 12px;
                                font-weight: 600;
                                color: #000;
                                text-align: center;
                                padding: 0px 0px 10px 0px;
                                ">

                                    (CENTER FOR HIGH ENERGY SYSTEM & SCIENCES)


                                </td>
                            </tr>
                            <tr>
                                <td style=" font-size: 10px;
                                line-height: 12px;
                                font-weight: 600;
                                color: #000;
                                text-align: center;
                                padding: 0px 5px 30px 5px;
                                margin: 0px 0px 30px 0px; ">

                                    NON-RETURNABLE MATERIAL GATE PASS (NRMGP)


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
                                <td style=" font-size: 10px;
                                line-height: 12px;
                                font-weight: 600;
                                color: #000;
                                text-align: left;
                                padding: 0px 0px 10px 0px;
                                ">

                                    Consignee: <span style="font-weight: 400; !important">{{ $gatePass->consignee->name ?? '' }} </span>


                                </td>
                                <td style=" font-size: 10px;
                                line-height: 12px;
                                font-weight: 600;
                                color: #000;
                                text-align: right;
                                padding: 0px 5px 30px 5px;
                                margin: 0px 0px 30px 0px; ">

                                    Pass No.: <span style="font-weight: 400; !important">{{ $gatePass->gate_pass_no ?? '' }}</span>  <br>
                                    Book No. :.......(pre-printed) <br>
                                    Date:. <span style="font-weight: 400; !important">{{ $date ?? '' }}</span>
                                </td>
                            </tr>

                            <tr>
                                <td style=" font-size: 10px;
                                line-height: 12px;
                                font-weight: 600;
                                color: #000;
                                text-align: left;
                                padding: 0px 0px 10px 0px;
                                ">

                                    Probable Date of Return. <span style="font-weight: 400; !important">{{ $gatePass->date_of_return ?? '' }} </span>


                                </td>

                            </tr>
                            <tr>
                                <td style=" font-size: 10px;
                                line-height: 12px;
                                font-weight: 600;
                                color: #000;
                                text-align: left;
                                padding: 0px 0px 10px 0px;
                                ">

                                    Issuing Group/Division: ..............................


                                </td>

                            </tr>
                            <tr>
                                <td style=" font-size: 10px;
                                line-height: 12px;
                                font-weight: 600;
                                color: #000;
                                text-align: left;
                                padding: 0px 0px 10px 0px;
                                ">
                                    ICC No.: <span style="font-weight: 400; !important">{{ $gatePass->inventoryNumber->number ?? '' }}</span>
                                </td>

                            </tr>
                            <tr>
                                <td style=" font-size: 10px;
                                line-height: 12px;
                                font-weight: 600;
                                color: #000;
                                text-align: left;
                                padding: 0px 0px 10px 0px;
                                ">
                                    EIV No. & Date: <span style="font-weight: 400; !important">{{ $gatePass->eivNumber->voucher_no ?? '' }} & {{ $gatePass->eivNumber->voucher_date ?? '' }} </span>
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
                                <th style=" border: 1px solid black; font-size: 12px;">SL.NO.</th>
                                <th style=" border: 1px solid black; font-size: 12px;">Item Code</th>
                                <th style=" border: 1px solid black; font-size: 12px;">Description of Stores</th>
                                <th style=" border: 1px solid black; font-size: 12px;">A/U</th>
                                <th style=" border: 1px solid black; font-size: 12px;">Qty.</th>
                            </tr>

                            @php
                            $total_item = 0;
                            @endphp
                            @foreach($gate_pass_items as $key => $gate_pass_item)
                            <tr>
                                <td style=" border: 1px solid black; padding: 10px 5px 10px 5px;font-size: 12px;">{{ $key + 1 }}</td>
                                <td style=" border: 1px solid black; padding: 10px 5px 10px 5px;font-size: 12px;">{{ $gate_pass_item->itemDetail->item_name ?? ''}}</td>
                                <td style=" border: 1px solid black; padding: 10px 5px 10px 5px;font-size: 12px;">{{ $gate_pass_item->description ?? ''}}</td>
                                <td style=" border: 1px solid black; padding: 10px 5px 10px 5px;font-size: 12px;">{{ $gate_pass_item->au_status ?? ''}}</td>
                                <td style=" border: 1px solid black; padding: 10px 5px 10px 5px;font-size: 12px;">{{ $gate_pass_item->quantity ?? ''}}</td>

                            @php
                                $total_item +=  $key;
                            @endphp

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </td>
            </tr>


            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" style="padding-top: 20px;">
                        <tbody>
                            <tr>
                                <td style="font-size: 10px;
                                line-height: 12px;
                                font-weight: 400;
                                color: #000;
                                text-align: left;">Total No. of
                                    items:................................................................. No. of
                                    packages
                                    :..................................................................................................................................
                                    <br> Purpose of Issue.
                                    ......................................................................................................................................................................................................................................
                                    <br>
                                    Authority:........................................................................................................................................................................................................................................................<br>
                                    Transport/Vehicle
                                    No:................................................................................................................................................................................................................
                                    <br>
                                    Loaded in the presence
                                    of..........................................................................................................................................................................................................
                                </td>

                            </tr>
                            <tr style="">
                                <td style="font-size: 10px;
                                line-height: 12px; padding-top: 20px;
                                font-weight: 400;
                                color: #000;
                                text-align: left;">Signature of person carrying the
                                    Stores:........................................................................................................................................
                                    <br> Name and Designation:
                                    .........................................................................................................................................................................................................
                                    <br>
                                    Name of the Firm /
                                    Organization:...............................................................................................................................................................................................<br>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>

            <tr>
                <td style="padding: 20px 0px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>

                            <tr>
                                <td style=" font-size: 10px;
                                line-height: 12px;
                                font-weight: 600;
                                color: #000;
                                text-align: left;
                                padding: 0px 5px 0px 5px;
                                ">

                                    Signature and Designation of
                                </td>
                                <td style=" font-size: 10px;
                                line-height: 12px;
                                font-weight: 600;
                                color: #000;
                                text-align: left;
                                padding: 0px 5px 0px 5px;
                                ">

                                    Signature and Designation of
                                </td>
                            </tr>
                            <tr>
                                <td style=" font-size: 10px;
                                line-height: 12px;
                                font-weight: 600;
                                color: #000;
                                text-align: left;
                                padding: 0px 5px 0px 5px;
                                ">

                                    O I/c CRDS
                                </td>
                                <td style=" font-size: 10px;
                                line-height: 12px;
                                font-weight: 600;
                                color: #000;
                                text-align: left;
                                padding: 0px 5px 0px 5px;
                                margin: 0px 0px 30px 0px; ">

                                    Authorized MMG Officer
                                </td>
                            </tr>



                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding: 20px 0px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>

                            <tr>
                                <td style=" font-size: 10px;
                                line-height: 12px;
                                font-weight: 600;
                                color: #000;
                                text-align: left;
                                padding: 0px 5px 0px 5px;
                                ">

                                    Name, Designation & Signature of
                                </td>
                                <td style=" font-size: 10px;
                                line-height: 12px;
                                font-weight: 600;
                                color: #000;
                                text-align: left;
                                padding: 0px 5px 0px 5px;
                                ">
                                    Name, Designation & Signature of

                                </td>
                            </tr>
                            <tr>
                                <td style=" font-size: 10px;
                                line-height: 12px;
                                font-weight: 600;
                                color: #000;
                                text-align: left;
                                padding: 0px 5px 0px 5px;
                                ">

                                    Inventory/ICC Holder
                                </td>
                                <td style=" font-size: 10px;
                                line-height: 12px;
                                font-weight: 600;
                                color: #000;
                                text-align: left;
                                padding: 0px 5px 0px 5px;
                                margin: 0px 0px 30px 0px; ">

                                    Division Head
                                </td>
                            </tr>



                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding: 20px 0px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>

                            <tr>
                                <td style=" font-size: 10px;
                                line-height: 12px;
                                font-weight: 600;
                                color: #000;
                                text-align: left;
                                padding: 0px 5px 10px 5px; border-bottom: 2px dashed #000;
                                ">

                                    For use by Security Section
                                </td>

                            </tr>
                            <tr>
                                <td style=" font-size: 10px;
                                line-height: 12px;
                                font-weight: 600;
                                color: #000;
                                text-align: left;
                                padding: 15px 5px 0px 5px;
                                ">

                                    Checked and passed out at.
                                    .........................................................................................................hrs.
                                    on.............................................................................(date)
                                </td>

                            </tr>
                            <tr>
                                <td style=" font-size: 10px;
                                line-height: 12px;
                                font-weight: 600; width: 50%;
                                color: #000;
                                text-align: left;
                                padding: 15px 5px 0px 5px;
                                ">

                                    Security Out Control No...
                                    .....................................................
                                </td>
                                <td style=" font-size: 10px;
                                line-height: 12px;
                                font-weight: 600; width: 50%;
                                color: #000;
                                text-align: left;
                                padding: 15px 5px 15px 5px;
                                ">

                                    Signature of the Security Asst.
                                    ......................................................
                                </td>

                            </tr>

                            <tr>
                                <td style=" font-size: 10px;
                                line-height: 12px;
                                font-weight: 600; width: 50%;
                                color: #000;
                                text-align: left;
                                padding: 15px 5px 0px 5px;
                                ">

                                    Stores Returned on...
                                    ......................................................(date)
                                </td>
                                <td style=" font-size: 10px;
                                line-height: 12px;
                                font-weight: 600; width: 50%;
                                color: #000;
                                text-align: left;
                                padding: 15px 5px 0px 5px;
                                ">

                                    Signature of the Security. Asst..
                                    ............................................................
                                </td>

                            </tr>

                        </tbody>
                    </table>
                </td>
            </tr>

        </tbody>

    </table>
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff"
        style="border-radius: 0px; margin: 0 auto">

        <tbody>


            <tr>
                <td style="padding: 20px 0px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>

                            <tr>
                                <td style=" font-size: 10px;
                                line-height: 12px;
                                font-weight: 600; width: 100%;
                                color: #000;
                                text-align: right;
                                padding: 15px 5px 0px 5px;
                                ">
                                    <span style="border: 1px solid #000; padding: 5px; ">Security stamp</span> <br>
                                    <br><br>
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
