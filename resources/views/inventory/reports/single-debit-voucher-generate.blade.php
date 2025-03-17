@foreach ($debitVouchers as $key => $debitVoucher)
    @if ($key > 0)
        <div style="page-break-before: always;"></div>
    @endif
    <!doctype html>
    <html lang="en">
        <title>RCI</title>
        <meta charset="utf-8" />
        <style>
            @page {
                margin: 10px;
                padding: 10px;
            }
        </style>

        <body style="background: #fff;">
            <center>
                <img src="{{ public_path('storage/' . $logo->logo) }}" style="max-width: 50px;">
            </center>

            <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff"
                style="border-radius: 0px; margin: 0 auto;">
                <tbody>
                    <tr>
                        <td style="padding:0 0px">
                            <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                                <tbody>
                                    <tr>
                                        <td
                                            style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase;">
                                            DRDO.SM II
                                        </td>
                                    </tr>
                                    <tr>
                                        <td
                                            style="font-size: 14px; line-height: 18px; font-weight: 600; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; text-decoration: underline;">
                                            CENTER FOR HIGH ENERGY SYSTEM & SCIENCES (CHESS),<br> VIGNYAA KANCHA POST,
                                            HYDERABAD
                                            —500069 <br>
                                            EXPENSE VOUCHER
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="height: 20px;">
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:0 0px">
                            <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                                <tbody>
                                    <tr>
                                        <td
                                            style="font-size: 14px; line-height: 18px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">
                                            Voucher Type : {{ 'Debit' }}
                                        </td>
                                        <td
                                            style="font-size: 14px; line-height: 18px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">
                                            Holder / Inventory No : {{ $debitVoucher->inventoryNumbers->number }}
                                        </td>
                                        <td
                                            style="font-size: 14px; line-height: 18px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; ">
                                            No of Items in Voucher : {{ count($debitVoucher['details']) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="height: 10px;">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td
                                            style="font-size: 14px; line-height: 18px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">
                                            Voucher No : {{ $debitVoucher['voucher_no'] }}
                                        </td>
                                        <td
                                            style="font-size: 14px; line-height: 18px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">
                                            Voucher Date : {{ $debitVoucher['voucher_date'] }}

                                        </td>
                                        <td
                                            style="font-size: 14px; line-height: 18px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; ">
                                            Cost Center Division : HYDERABAD

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="height: 20px;">
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:0 0px">
                            <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                                <thead>
                                    <tr>
                                        <th
                                            style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border: 1px solid #000;">
                                            S L.NO
                                        </th>
                                        <th
                                            style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border: 1px solid #000;">
                                            ITEM CODE
                                        </th>
                                        <th
                                            style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border: 1px solid #000;">
                                            CHDG
                                        </th>
                                        <th
                                            style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border: 1px solid #000;">
                                            DESCRIPTION
                                        </th>
                                        <th
                                            style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border: 1px solid #000;">
                                            RATE<br>
                                            (inRs.)
                                        </th>
                                        <th
                                            style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border: 1px solid #000;">
                                            UM
                                        </th>
                                        <th
                                            style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border: 1px solid #000;">
                                            QUANTITY
                                        </th>
                                        <th
                                            style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border: 1px solid #000;">
                                            VALUE<br>
                                            (inRs.)
                                        </th>
                                        <th
                                            style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border: 1px solid #000;">
                                            Remarks
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $serialNumber = 1; @endphp
                                    @foreach ($debitVoucher['details'] as $key => $item)
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border: 1px solid #000;">
                                                {{ $serialNumber++ }}
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border: 1px solid #000;">
                                                {{ $item->itemCode->code }}
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border: 1px solid #000;">
                                                {{ ' ' }}
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border: 1px solid #000;">
                                                {{ $item['item_desc'] }}
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border: 1px solid #000;">
                                                {{ number_format($item['price'] / $item['quantity'], 2) }}
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border: 1px solid #000;">
                                                {{ '' }}
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border: 1px solid #000;">
                                                {{ $item['quantity'] }}
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border: 1px solid #000;">
                                                {{ number_format(is_numeric($item['price']) ? (float) $item['price'] : 0, 2) }}

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border: 1px solid #000;">
                                                {{ $item['remarks'] }}
                                            </td>
                                        </tr>
                                    @endforeach

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
                                        <td
                                            style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important;">
                                            Certified that the above mentioned items have been used/ expended during
                                            period
                                            from ______________ to ________________
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
                                        <td
                                            style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase;">

                                        </td>
                                        <td
                                            style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase;">
                                            Inventory Holder
                                        </td>
                                        <td
                                            style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important;">
                                            Audit Cage
                                        </td>
                                        <td
                                            style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase;">

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="height: 20px; border-bottom: 2px solid #000;"></td>
                    </tr>
                    <tr>
                        <td style="padding:0 0px">
                            <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                                <tbody>
                                    <tr>
                                        <td style="height: 20px;"></td>
                                    </tr>
                                    <tr>
                                        <td
                                            style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase;">
                                            Entered in Budget Register
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
                                        <td style="height: 20px;"></td>
                                    </tr>
                                    <tr>
                                        <td
                                            style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase;">
                                            Posted in Ledger
                                        </td>
                                        <td
                                            style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase;">
                                            Ledger Keeper
                                        </td>
                                        <td
                                            style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: end; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase;">
                                            I/ C Budget
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
@endforeach
