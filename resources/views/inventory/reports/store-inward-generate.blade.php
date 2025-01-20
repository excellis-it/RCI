<!DOCTYPE html>
<html lang="en">
    <title>RCI</title>
    <meta charset="utf-8" />
    @php
        use App\Helpers\Helper;
    @endphp

    <body style="background: #fff">
        <center>
            <img src="{{ public_path('storage/' . $logo->logo) }}" style="max-width: 50px;">
        </center>
        <br>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
            <tbody>
                <tr>
                    <td>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>

                                    <td style="font-size: 14px; text-align: right; font-weight: bold;">DRDO.SM.03</td>
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
                                        CENTER FOR HIGH ENERGY SYSTEM & SCIENCES, Hyderabad<br />
                                        STORES INWARD REGISTER (SIR)
                                    </td>
                                    <td style="font-size: 14px; text-align: right"></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>


                <tr>
                    <td>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center"
                            style="margin-top: 1rem">
                            <tbody>
                                <tr>
                                    <th style="border: 1px solid #000; padding: 5px; font-size: 14px;">SI. No</th>
                                    <th style="border: 1px solid #000; padding: 5px; font-size: 14px;">DC/ Invoice No. &
                                        Date</th>
                                    <th style="border: 1px solid #000; padding: 5px; font-size: 14px;">SO/Contract No. /
                                        Authority No. & Date</th>
                                    {{-- <th style="border: 1px solid #000; padding: 5px; font-size: 14px;">TCR No & Date (If
                                    applicable)</th> --}}
                                    {{-- <th style="border: 1px solid #000; padding: 5px; font-size: 14px;">Nomenclature</th> --}}
                                    <th style="border: 1px solid #000; padding: 5px; font-size: 14px;">Name of Consignor
                                    </th>
                                    <th style="border: 1px solid #000; padding: 5px; font-size: 14px;">Qty Received</th>
                                    <th style="border: 1px solid #000; padding: 5px; font-size: 14px;">Date of Receipt
                                    </th>
                                    <th style="border: 1px solid #000; padding: 5px; font-size: 14px;">Name & Sig. of
                                        O/IC
                                        CRDS</th>
                                    {{-- <th style="border: 1px solid #000; padding: 5px; font-size: 14px;">Remarks</th>
                                <th style="border: 1px solid #000; padding: 5px; font-size: 14px;">RIN No & Date</th> --}}


                                </tr>


                                {{-- <tr>
                        <td style="border: 1px solid #000; padding: 5px; text-align: center;">1</td>
                        <td style="border: 1px solid #000; padding: 5px; text-align: center;">2</td>
                        <td style="border: 1px solid #000; padding: 5px; text-align: center;">3</td>
                        <td style="border: 1px solid #000; padding: 5px; text-align: center;">4</td>
                        <td style="border: 1px solid #000; padding: 5px; text-align: center;">5</td>
                        <td style="border: 1px solid #000; padding: 5px; text-align: center;">6</td>
                        <td style="border: 1px solid #000; padding: 5px; text-align: center;">7</td>
                        <td style="border: 1px solid #000; padding: 5px; text-align: center;">8</td>
                        <td style="border: 1px solid #000; padding: 5px; text-align: center;">9</td>
                        <td style="border: 1px solid #000; padding: 5px; text-align: center;">10</td>
                        <td style="border: 1px solid #000; padding: 5px; text-align: center;">11</td>


                      </tr> --}}
                                @if ($storeInwards->isNotEmpty())
                                    @foreach ($storeInwards as $sirNo => $item)
                                        <tr>
                                            <td style="border: 1px solid #000; padding: 5px; text-align: center;">
                                                {{ $sirNo }}</td>
                                            <td style="border: 1px solid #000; padding: 5px; text-align: center;">
                                                {{ $item->invoice_no ?? 'N/A' }} &
                                                {{ isset($item->invoice_date) && $item->invoice_date ? date('d-m-Y', strtotime($item->invoice_date)) : 'N/A' }}
                                            </td>
                                            <td style="border: 1px solid #000; padding: 5px; text-align: center;">
                                                {{ $item->supplyOrder->order_number ?? 'N/A' }} /
                                                {{ isset($item->supplyOrder->created_at) && $item->supplyOrder->created_at ? date('d-m-Y', strtotime($item->supplyOrder->created_at)) : 'N/A' }}
                                            </td>
                                            {{-- <td style="border: 1px solid #000; padding: 5px; text-align: center;">

                                        </td>
                                        <td style="border: 1px solid #000; padding: 5px; text-align: center;">

                                        </td> --}}
                                            <td style="border: 1px solid #000; padding: 5px; text-align: center;">
                                                {{ $item->supplier->name ?? '' }}</td>
                                            <td style="border: 1px solid #000; padding: 5px; text-align: center;">
                                                {{ Helper::getTotalSirQty($sirNo) ?? '' }}</td>
                                            <td style="border: 1px solid #000; padding: 5px; text-align: center;">
                                                {{ isset($item->sir_date) && $item->sir_date ? date('d-m-Y', strtotime($item->sir_date)) : 'N/A' }}
                                            </td>
                                            <td style="border: 1px solid #000; padding: 5px; text-align: center;">
                                            </td>
                                            {{-- <td style="border: 1px solid #000; padding: 5px; text-align: center;"></td>
                                        <td style="border: 1px solid #000; padding: 5px; text-align: center"></td> --}}
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="10"
                                            style="border: 1px solid #000; padding: 5px; text-align: center;">
                                            No data available for the selected date.
                                        </td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                    </td>
                </tr>


            </tbody>
        </table>
    </body>

</html>
