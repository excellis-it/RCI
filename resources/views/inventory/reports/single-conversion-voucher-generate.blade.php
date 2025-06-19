@php
    use App\Helpers\Helper;
@endphp

@foreach ($conversionVouchers as $key => $conversionVoucher)
    @if ($key > 0)
        <div style="page-break-before: always;"></div>
    @endif
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
                                        <td style="font-size: 10px; text-align: right; font-weight: bold;">DRDO.SM.27
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
                    ">
                                            CENTER FOR HIGHENERGY SYSTEMS & SCIENCES (CHESS) <br>
                                            RCI CAMPUS, HYDERABAD - 500 069<br><br>
                                            Conversion Voucher
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
                                style="padding-top: 20px;">
                                <tbody>
                                    <tr>
                                        <td
                                            style="font-size: 10px;  width: 70%;
                        line-height: 18px;
                        font-weight: 400;
                        color: #000;
                        text-align: left;">
                                            Group/ Division:
                                            {{ Helper::getCrvDetaisByInv($conversionVoucher->id)->division_group ?? '' }}<br>
                                            <br>
                                            Type of Voucher: {{ $conversionVoucher->voucher_type ?? '' }}
                                            &nbsp;&nbsp;&nbsp; Date:
                                            {{ $conversionVoucher->voucher_date ? date('d-m-Y', strtotime($conversionVoucher->voucher_date)) : '' }}<br>
                                            <br>
                                            ICC No.
                                            {{ Helper::getCrvDetaisByInv($conversionVoucher->id)->invNumber?->number ?? '' }}
                                        </td>
                                        <td valign="top"
                                            style="font-size: 10px; width: 30%;
                        line-height: 18px;
                        font-weight: 400;
                        color: #000;
                        text-align: left; padding-left: 10px;">
                                            Voucher No: {{ $conversionVoucher->voucher_no ?? '' }}
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
                                        <th valign="top" rowspan="2"
                                            style="border: 1px solid #000; padding: 5px 0; font-size: 14px; text-align: center; font-weight: 600; font-size: 10px;">
                                            SL.NO.
                                        </th>
                                        <th valign="top" colspan="6"
                                            style="border: 1px solid #000; padding: 5px; font-size: 14px; text-align: center; font-weight: 600; font-size: 10px;">
                                            Strike Off
                                        </th>
                                        <th valign="top" colspan="6"
                                            style="border: 1px solid #000; padding: 5px; font-size: 14px; text-align: center; font-weight: 600; font-size: 10px;">
                                            Brought on Charge
                                        </th>
                                        <th valign="middle" rowspan="2"
                                            style="border: 1px solid #000; padding: 5px; font-size: 14px; text-align: center; font-weight: 600; font-size: 10px;">
                                            Reasons for <br> Conversion
                                        </th>
                                    </tr>

                                    <tr>

                                        <td valign="top"
                                            style="border: 1px solid #000; padding: 5px; text-align: center;  font-weight: 600; font-size: 10px;">
                                            Item <br> Code
                                        </td>
                                        <td valign="top"
                                            style="border: 1px solid #000; padding: 5px; text-align: center;  font-weight: 600;font-size: 10px; ">
                                            Ledger <br> No/Page <br> No/
                                        </td>
                                        <td valign="top"
                                            style="border: 1px solid #000; padding: 5px; text-align: center;  font-weight: 600;font-size: 10px; ">
                                            Description <br> of Item to <br> be Struck <br> off Charge
                                        </td>
                                        <td valign="top"
                                            style="border: 1px solid #000; padding: 5px; text-align: center;  font-weight: 600;font-size: 10px; ">
                                            C/ <br> NC/ <br> NCF
                                        </td>
                                        <td valign="top"
                                            style="border: 1px solid #000; padding: 5px; text-align: center;  font-weight: 600;font-size: 10px; ">
                                            Q <br>ty
                                        </td>
                                        <td valign="top"
                                            style="border: 1px solid #000; padding: 5px; text-align: center;  font-weight: 600; font-size: 10px;">
                                            Rate <br> per <br> Unit
                                        </td>
                                        <td valign="top"
                                            style="border: 1px solid #000; padding: 5px; text-align: center;  font-weight: 600; font-size: 10px;">
                                            Item <br> Code
                                        </td>
                                        <td valign="top"
                                            style="border: 1px solid #000; padding: 5px; text-align: center;  font-weight: 600;font-size: 10px; ">
                                            Ledger <br> No/<br>Page No<br>/
                                        </td>
                                        <td valign="top"
                                            style="border: 1px solid #000; padding: 5px; text-align: center;  font-weight: 600;font-size: 10px; ">
                                            Description <br> of Items <br> Brought on <br> Charge
                                        </td>
                                        <td valign="top"
                                            style="border: 1px solid #000; padding: 5px; text-align: center;  font-weight: 600;font-size: 10px; ">
                                            C/ <br> NC/ <br> NCF
                                        </td>
                                        <td valign="top"
                                            style="border: 1px solid #000; padding: 5px; text-align: center;  font-weight: 600;font-size: 10px; ">
                                            Qty
                                        </td>
                                        <td valign="top"
                                            style="border: 1px solid #000; padding: 5px; text-align: center;  font-weight: 600;font-size: 10px; ">
                                            Rate per <br> Unit
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
                                                {{ ($value->strike_rate != '' ? formatIndianCurrency($value->strike_rate, 2) : '') ?? '' }}
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
                                                    {{ ($broughtItems->brought_rate != '' ? formatIndianCurrency($broughtItems->brought_rate, 2) : '') ?? '' }}
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
                                                        {{ ($value->brought_rate != '' ? formatIndianCurrency($value->brought_rate, 2) : '') ?? '' }}
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
                            <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                style="padding-top: 20px;">
                                <tbody>
                                    <tr>
                                        <td
                                            style="font-size: 10px;
                        line-height: 18px; width: 100%;
                        font-weight: 600;
                        color: #000;
                        text-align: left; padding-left: 10px;">
                                            Authority:________________________
                                        </td>
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
                                        <td
                                            style="font-size: 10px;
                        line-height: 18px; width: 50%;
                        font-weight: 400;
                        color: #000;
                        text-align: left; padding-left: 10px;">
                                            Items mentioned at Column No. 4 have been Struck off
                                            Charge and <br>
                                            Items mentioned at Column No. 10 have been brought on charge
                                        </td>
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
                                        <td
                                            style="font-size: 10px;
                        line-height: 18px; width: 80%;
                        font-weight: 600;
                        color: #000;
                        text-align: left; padding-left: 10px;">
                                            Inventory/ICC Holder <br>
                                            (Name & Designation.)<br>
                                            Date:
                                        </td>
                                        <td
                                            style="font-size: 10px;
                line-height: 18px; width: 20%;
                font-weight: 600;
                color: #000;
                text-align: left; padding-left: 10px;">
                                            O l/c Ledger <br>
                                            (Name & Designation.)<br>Date:
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
