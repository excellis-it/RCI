@foreach ($transferVouchers as $key => $transferVoucher)
    @if ($key > 0)
        <div style="page-break-before: always;"></div>
    @endif
    <!DOCTYPE html>
    <html lang="en">
        <title>RCI</title>
        <meta charset="utf-8" />
        <style>
            @page {
                margin: 10px;
                padding: 10px;
            }
        </style>
        <body style="background: #fff">
            <center>
                <img src="{{ public_path('storage/' . $logo->logo) }}" style="max-width: 50px;">
            </center>
            <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                <tbody>
                    <tr>
                        <td>
                            <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                                <tbody>
                                    <tr>
                                        <td></td>

                                        <td style="font-size: 12px; text-align: right; font-weight: bold;">DRDO.SM.34
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 14px"></td>
                                        <td
                                            style="
                      text-align: center;
                      font-weight: bold;
                      font-size: 14px;
                      width: 100%;
                    ">                      CENTER FOR HIGHENERGY SYSTEMS & SCIENCES (CHESS)<br />
                                            RCI CAMPUS, HYDERABAD - 500 069<br /><br />
                                            TRANSFER VOUCHER (TRVR)
                                        </td>
                                        <td style="font-size: 14px; text-align: right"></td>
                                    </tr>

                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                style="padding-top: 20px; border-bottom: 2px dashed #000;">
                                <tbody>
                                    <tr>
                                        <td
                                            style="font-size: 16px;  width: 60%;
                        line-height: 18px;
                        font-weight: 400;
                        color: #000; padding-bottom: 10px;
                        text-align: left;">
                                            ISSUING DIVISION: {{ $transferVoucher->fromInvNo->division }} <br> <br>
                                            ICC No. {{ $transferVoucher->fromInvNo->number }}
                                        </td>
                                        <td valign="top"
                                            style="font-size: 16px; width: 40%;
                        line-height: 18px;
                        font-weight: 400;
                        color: #000;
                        text-align: left; padding-left: 10px; padding-bottom: 10px;">
                                            RECEIVING DIVISION: {{ $transferVoucher->toInvNo->division }}<br> <br>
                                            ICC No. {{ $transferVoucher->toInvNo->number }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center"
                                style="margin-top: 2rem">
                                <tbody>
                                    <tr>
                                        <th valign="top" rowspan="1"
                                            style="border: 1px solid #000; padding: 5px; font-size: 14px; text-align: left; font-weight: 600;">
                                            &nbsp;
                                        </th>
                                        <th valign="top" colspan="4"
                                            style="border: 1px solid #000; padding: 5px; font-size: 14px; text-align: left; font-weight: 600;">
                                            Strike OFF Charge
                                        </th>
                                        <th valign="top" colspan="3"
                                            style="border: 1px solid #000; padding: 5px; font-size: 14px; text-align: left; font-weight: 600;">
                                            Brought ON Charge
                                        </th>

                                    </tr>

                                    <tr>

                                        <td valign="top"
                                            style="border: 1px solid #000; padding: 5px; text-align: left; font-size: 14px; font-weight: 600; width:30px;">
                                            SL.No.
                                        </td>
                                        <td valign="top"
                                            style="border: 1px solid #000; padding: 5px; text-align: left; font-size: 14px; font-weight: 600; ">
                                            Ledger No. <br> Page No.
                                        </td>
                                        <td valign="top"
                                            style="border: 1px solid #000; padding: 5px; text-align: left; font-size: 14px; font-weight: 600; ">
                                            Nomenclature
                                        </td>
                                        <td valign="top"
                                            style="border: 1px solid #000; padding: 5px; text-align: left; font-size: 14px; font-weight: 600; ">
                                            Qty
                                        </td>
                                        <td valign="top"
                                            style="border: 1px solid #000; padding: 5px; text-align: left; font-size: 14px; font-weight: 600; ">
                                            Rate per <br> unit (all <br> inclusive)
                                        </td>
                                        <td valign="top"
                                            style="border: 1px solid #000; padding: 5px; text-align: left; font-size: 14px; font-weight: 600; ">
                                            Ledger No. <br> Page No.
                                        </td>
                                        <td valign="top"
                                            style="border: 1px solid #000; padding: 5px; text-align: left; font-size: 14px; font-weight: 600; ">
                                            Nomenclature
                                        </td>
                                        <td valign="top"
                                            style="border: 1px solid #000; padding: 5px; text-align: left; font-size: 14px; font-weight: 600; ">
                                            Qty
                                        </td>

                                    </tr>
                                    @php
                                        $counter = 1;
                                        $broughtItems = $conversionVoucher->details
                                            ->whereNotNull('brought_item_id')
                                            ->first();
                                        $strikeItems = $conversionVoucher->details->whereNotNull('strike_item_id');
                                        $strikeCount = $strikeItems->count();
                                    @endphp

                                    @foreach ($strikeItems as $index => $value)
                                        <tr>
                                            <td
                                                style="border: 1px solid #000; padding: 5px; text-align: center; font-size: 10px;">
                                                {{ $counter++ }}
                                            </td>
                                            <td
                                                style="border: 1px solid #000; padding: 5px; text-align: center; font-size: 10px;">
                                                {{ $value->strike_item_code ?? '' }}</td>
                                            <td
                                                style="border: 1px solid #000; padding: 5px; text-align: center; font-size: 10px;">
                                                {{ $value->strike_ledger ?? '' }}
                                            </td>
                                            <td
                                                style="border: 1px solid #000; padding: 5px; text-align: center; font-size: 10px;">
                                                {{ $value->strike_description ?? '' }}
                                            </td>
                                            <td
                                                style="border: 1px solid #000; padding: 5px; text-align: center; font-size: 10px;">
                                                {{ $value->strike_c_nc ?? '' }}
                                            </td>
                                            <td
                                                style="border: 1px solid #000; padding: 5px; text-align: right; font-size: 10px;">
                                                {{ $value->strike_quantity ?? '' }}
                                            </td>
                                            <td
                                                style="border: 1px solid #000; padding: 5px; text-align: right; font-size: 10px;">
                                                {{ ($value->strike_rate != '' ? number_format($value->strike_rate, 2) : '') ?? '' }}
                                            </td>

                                            @if ($index === 0 && $broughtItems)
                                                <td rowspan="{{ $strikeCount }}"
                                                    style="border: 1px solid #000; padding: 5px; text-align: center; font-size: 10px;">
                                                    {{ $broughtItems->brought_item_code ?? '' }}
                                                </td>
                                                <td rowspan="{{ $strikeCount }}"
                                                    style="border: 1px solid #000; padding: 5px; text-align: center; font-size: 10px;">
                                                    {{ $broughtItems->brought_ledger ?? '' }}
                                                </td>
                                                <td rowspan="{{ $strikeCount }}"
                                                    style="border: 1px solid #000; padding: 5px; text-align: center; font-size: 10px;">
                                                    {{ $broughtItems->brought_description ?? '' }}
                                                </td>
                                                <td rowspan="{{ $strikeCount }}"
                                                    style="border: 1px solid #000; padding: 5px; text-align: center; font-size: 10px;">
                                                    {{ $broughtItems->brought_c_nc ?? '' }}
                                                </td>
                                                <td rowspan="{{ $strikeCount }}"
                                                    style="border: 1px solid #000; padding: 5px; text-align: right; font-size: 10px;">
                                                    {{ $broughtItems->brought_quantity ?? '' }}
                                                </td>
                                                <td rowspan="{{ $strikeCount }}"
                                                    style="border: 1px solid #000; padding: 5px; text-align: right; font-size: 10px;">
                                                    {{ ($broughtItems->brought_rate != '' ? number_format($broughtItems->brought_rate, 2) : '') ?? '' }}
                                                </td>
                                                <td rowspan="{{ $strikeCount }}"
                                                    style="border: 1px solid #000; padding: 5px; text-align: center; font-size: 10px;">
                                                    {{ $broughtItems->reason ?? '' }}
                                                </td>
                                            @elseif ($index !== 0 || !$broughtItems)
                                                <!-- Empty cells for rows after the first one when there's a brought item -->
                                                @if ($index !== 0 && $broughtItems)
                                                    <!-- These cells are covered by the rowspan above -->
                                                @else
                                                    <td
                                                        style="border: 1px solid #000; padding: 5px; text-align: center; font-size: 10px;">
                                                        {{ $value->brought_item_code ?? '' }}
                                                    </td>
                                                    <td
                                                        style="border: 1px solid #000; padding: 5px; text-align: center; font-size: 10px;">
                                                        {{ $value->brought_ledger ?? '' }}
                                                    </td>
                                                    <td
                                                        style="border: 1px solid #000; padding: 5px; text-align: center; font-size: 10px;">
                                                        {{ $value->brought_description ?? '' }}
                                                    </td>
                                                    <td
                                                        style="border: 1px solid #000; padding: 5px; text-align: center; font-size: 10px;">
                                                        {{ $value->brought_c_nc ?? '' }}
                                                    </td>
                                                    <td
                                                        style="border: 1px solid #000; padding: 5px; text-align: right; font-size: 10px;">
                                                        {{ $value->brought_quantity ?? '' }}
                                                    </td>
                                                    <td
                                                        style="border: 1px solid #000; padding: 5px; text-align: right; font-size: 10px;">
                                                        {{ ($value->brought_rate != '' ? number_format($value->brought_rate, 2) : '') ?? '' }}
                                                    </td>
                                                    <td
                                                        style="border: 1px solid #000; padding: 5px; text-align: center; font-size: 10px;">
                                                        {{ $value->reason ?? '' }}
                                                    </td>
                                                @endif
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center"
                                style="margin-top: 2rem">
                                <tbody>
                                    <tr>

                                        <th
                                            style="border: 1px solid #000; padding: 5px; font-size: 14px; text-align: left;">
                                            Signature of
                                            Inventory/ICC <br>
                                            Holder Officer
                                        </th>
                                        <th
                                            style="border: 1px solid #000; padding: 5px; font-size: 14px; text-align: left;">
                                            Signature of GH/DH
                                        </th>
                                        <th
                                            style="border: 1px solid #000; padding: 5px; font-size: 14px; text-align: left;">
                                            Signature of O/IC
                                            CRDS (* Only in case of return of <br> items to MMG for repair/condemnation)
                                        </th>

                                        <th
                                            style="border: 1px solid #000; padding: 5px; font-size: 14px; text-align: left;">
                                            Signature of OI/C
                                            Ledger <br> /Accounting
                                        </th>
                                    </tr>


                                    <tr>
                                        <td style="border: 1px solid #000; padding: 5px; text-align: left;">Name &
                                            Designation</td>
                                        <td style="border: 1px solid #000; padding: 5px; text-align: left;">Name &
                                            Designation</td>
                                        <td style="border: 1px solid #000; padding: 5px; text-align: left;">Name &
                                            Designation</td>
                                        <td style="border: 1px solid #000; padding: 5px; text-align: left;">Name &
                                            Designation</td>



                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #000; padding: 5px; text-align: left;">Date:</td>
                                        <td style="border: 1px solid #000; padding: 5px; text-align: left;">Date:</td>
                                        <td style="border: 1px solid #000; padding: 5px; text-align: left;">Date:</td>
                                        <td style="border: 1px solid #000; padding: 5px; text-align: left;">Date:</td>



                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                style="padding-top: 20px;">
                                <tbody>
                                    <tr>
                                        <td valign="middle"
                                            style="font-size: 16px; width: 60%;
                        line-height: 18px;
                        font-weight: 600;
                        color: #000;
                        text-align: left;">


                                        </td>
                                        <td valign="top"
                                            style="font-size: 16px; width: 40%;
                        line-height: 18px;

                        padding: 10px 30px 30px 30px;
                        color: #000;
                        text-align: left; padding-left: 10px; border: 1px solid #000; height: 120px;">
                                            Item(s) strike off charge from issuing ledger (s) and brought on charge in
                                            receiving ledger(s).
                                            <br><br><br><br><br><br><br>


                                            <span style="text-align: right; display: block;">O/IC Ledger Section</span>
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
