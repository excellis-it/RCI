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

                                    <td style="font-size: 14px; text-align: right; font-weight: bold;">DRDO.SM.04</td>
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
                                        RIN CONTROL REGISTER
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
                                    <td style="padding-top: 20px;  text-decoration: underline;">
                                        Financial Year:
                                        {{ date('Y', strtotime($startOfYear)) }}-{{ date('Y', strtotime($endOfYear)) }}
                                    </td>
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
                                    <th style="border: 1px solid #000; padding: 5px; font-size: 14px;">RIN No</th>
                                    <th style="border: 1px solid #000; padding: 5px; font-size: 14px;">RIN Date</th>
                                    <th style="border: 1px solid #000; padding: 5px; font-size: 14px;">SO/ Contract /
                                        Authority No.& Date</th>
                                    <th style="border: 1px solid #000; padding: 5px; font-size: 14px;">SIR No & Date
                                    </th>
                                    {{-- <th style="border: 1px solid #000; padding: 5px; font-size: 14px;">Nomenclature</th> --}}
                                    <th style="border: 1px solid #000; padding: 5px; font-size: 14px;">Group/ Division
                                    </th>
                                    <th style="border: 1px solid #000; padding: 5px; font-size: 14px;">Name & Sign of
                                        Division Rep receiving the items & Date</th>
                                    <th style="border: 1px solid #000; padding: 5px; font-size: 14px;">O/IC CRDS Name &
                                        Sign.</th>
                                    {{-- <th style="border: 1px solid #000; padding: 5px; font-size: 14px;">CRV No & Date (*)
                                </th> --}}


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



                      </tr> --}}
                                @if ($rinControllerReports->isNotEmpty())
                                    @foreach ($rinControllerReports as $rinNo => $item)
                                        <tr>
                                            <td style="border: 1px solid #000; padding: 5px; text-align: center;">
                                                {{ $rinNo }}
                                            </td>
                                            <td style="border: 1px solid #000; padding: 5px; text-align: center;">
                                                {{ optional($item->created_at)->format('d-m-Y') ?? 'N/A' }}
                                            </td>
                                            <td style="border: 1px solid #000; padding: 5px; text-align: center;">
                                                {{ $item->sirNo?->supplyOrder?->order_number ?? 'N/A' }}
                                                &
                                                {{ optional($item->sirNo?->supplyOrder?->created_at)->format('d-m-Y') ?? 'N/A' }}
                                            </td>
                                            <td style="border: 1px solid #000; padding: 5px; text-align: center;">
                                                {{ $item->sirNo->sir_no ?? 'N/A' }}
                                                & {{ optional($item->sirNo?->sir_date)->format('d-m-Y') ?? 'N/A' }}
                                            </td>
                                            {{-- <td style="border: 1px solid #000; padding: 5px; text-align: center;"></td> --}}
                                            <td style="border: 1px solid #000; padding: 5px; text-align: center;">
                                                {{ $item->sirNo->inventoryNumber->group->group_name ?? ($item->sirNo->inventoryNumber->division ?? 'N/A') }}
                                            </td>
                                            <td style="border: 1px solid #000; padding: 5px; text-align: center;"></td>
                                            <td style="border: 1px solid #000; padding: 5px; text-align: center;"></td>
                                            {{-- <td style="border: 1px solid #000; padding: 5px; text-align: center;"></td> --}}
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="9"
                                            style="border: 1px solid #000; padding: 5px; text-align: center;">
                                            No data available for the selected financial year.
                                        </td>
                                    </tr>
                                @endif


                            </tbody>
                        </table>
                    </td>
                </tr>
                <td>
                    <table style="margin-top: 8rem;" width="100%" border="0" cellpadding="0" cellspacing="0"
                        align="center">
                        <tbody>
                            <tr>

                                <td></td>
                                <td></td>
                                <td style="font-size: 14px; text-align: right; font-weight: bold;">* To be filled up
                                    after
                                    CRV action</td>

                            </tr>

                        </tbody>
                    </table>
                </td>
                </tr>

            </tbody>
        </table>
    </body>

</html>
