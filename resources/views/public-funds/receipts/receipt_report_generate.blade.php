<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Receipts</title>
        <style>
            @page {
                margin: 5px !important;
                padding: 5px !important;
            }

            body {
                margin: 5px !important;
                padding: 5px !important;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            th,
            td {
                border: 1px solid #000;
                padding: 8px;
                text-align: left;
                font-size: 20px;
                line-height: 20px;
            }

            th {
                /* border-bottom: 1px solid #000; */
            }
        </style>
    </head>

    <body>
        @php
            use App\Helpers\Helper;
        @endphp
        <center>
            <img src="{{ public_path('storage/' . $logo->logo) }}" style="max-width: 50px;">
        </center>
        <br>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff"
            style="border-radius: 0px; margin: 0 auto; text-align: center; border-color: inherit;">
            <tbody>
                <tr style="border-color: inherit;">
                    <td style="padding: 0 0px; border-color: inherit;border:none;">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                            <tbody>
                                <tr>
                                    <td
                                        style="
                                    border:none;
                      font-size: 14x;
                      line-height: 20px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                        RECEIPTS FOR {{ \Carbon\Carbon::parse($vr_date)->format('d/m/Y') }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 0 0px; border:none;">
                        <table style="border:none;" width="100%" border="0" cellpadding="0" cellspacing="0"
                            align="center">
                            <tbody>
                                <tr style="border:none;">
                                    <td
                                        style="
                                    border:none;
                      font-size: 20px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                        CHESS, Hyderabad<br>
                                        <span
                                            style="font-size: 20px;
                  line-height: 20px;
                  font-weight: 400;">PUBLIC
                                            FUND A/c No - {{ $settings->public_bank_ac ?? '' }} CASH BOOK</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="height: 20px;border:none;"></td>
                </tr>
            </tbody>
        </table>

        <table>
            <thead>
                <tr>
                    <th>DATE</th>
                    <th>CBRV</th>
                    <th>DETAILS</th>
                    @foreach ($category as $cat)
                        <th>{{ strtoupper($cat->name) }}</th>
                    @endforeach
                    <th>SIGN</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $categoryAmounts = [];
                    $balanceCarriedForward = [];
                    // $totalPayments = [];
                    foreach ($category as $cat) {
                        $categoryAmounts[$cat->id] = 0;
                        $balanceCarriedForward[$cat->id] = 0;
                        //    $totalPayments[$cat->id] = 0;
                    }
                @endphp

                <tr>
                    <td></td>
                    <td></td>
                    <td>Opening Balance</td>
                    @foreach ($category as $cat)
                        <td>
                            {{ Helper::get_openings_balance($cat->id, $pre_vr_date) }}
                            {{-- {{ $openingBalance[$cat->id] ?? '' }} --}}
                        </td>
                    @endforeach
                    <td></td>

                </tr>
                @php
                    $new_count_cvr = 0;
                @endphp

                @foreach ($receipts as $key => $receipt)
                    @php

                        if (isset($categoryAmounts[$receipt->category_id])) {
                            $categoryAmounts[$receipt->category_id] += $receipt->amount;
                        }

                        // Group member amounts by category_id from the receipt
                        $categoryMemberAmounts = [];

                        if (isset($receipt->receiptMembers)) {
                            foreach ($receipt->receiptMembers as $member) {
                                $categoryId = $receipt->category_id;

                                if (!isset($categoryMemberAmounts[$categoryId])) {
                                    $categoryMemberAmounts[$categoryId] = [];
                                }

                                // Add the member's amount to the corresponding category
                                $categoryMemberAmounts[$categoryId][] = $member->amount;
                            }
                        }

                    @endphp

                    <tr style="">
                        <td rowspan="{{ isset($receipt->receiptMembers) ? $receipt->receiptMembers->count() + 2 : 1 }}"
                            style="font-size: 20px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">
                            {{ \Carbon\Carbon::parse($receipt->vr_date)->format('d/m/Y') }}
                        </td>
                        <td
                            style="font-size: 20px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">

                        </td>
                        <td
                            style="font-size: 20px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">

                        </td>
                        @foreach ($category as $cat)
                            <td
                                style="font-size: 20px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">
                            </td>
                        @endforeach
                        <td
                            style="font-size: 20px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">

                        </td>
                    </tr>


                    <tr>
                        <td rowspan="{{ $receipt->receiptMembers->count() + 1 }}"
                            style="font-size: 20px; line-height: 20px; font-weight: 400; color: #000; border-top: 0;   border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">
                            {{ $receipt->vr_no }}
                        </td>
                        <td
                            style="font-size: 20px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; ">
                            {{ $receipt->narration . ' DV No.-' . $receipt->dv_no ?? '-' }}
                        </td>

                        @foreach ($category as $cat)
                            <td
                                style="font-size: 20px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-bottom:0;">
                            </td>
                        @endforeach
                        <td
                            style="font-size: 20px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom:0;  text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">

                        </td>
                    </tr>
                    @php
                        $new_count_member = 0;
                    @endphp
                    @if (isset($receipt->receiptMembers) && $receipt->receiptMembers->count() > 0)
                        @foreach ($receipt->receiptMembers as $index => $member)
                            @php
                                $memberName = $members->firstWhere('id', $member->member_id)->name ?? 'N/A';
                                $memberDesign =
                                    $members->firstWhere('id', $member->member_id)->designation->designation_type ??
                                    'N/A';
                            @endphp
                            <tr style="{{ $loop->last ? 'border-bottom: 1px solid #000;' : 'border-bottom: 0;' }}">
                                <td
                                    style="font-size: 20px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">
                                    {{ $member->serial_no }}. {{ $memberName }} - {{ $memberDesign }}
                                </td>

                                @foreach ($category as $cat)
                                    <td
                                        style="font-size: 20px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">
                                        @if ($receipt->category_id == $cat->id)
                                            @if (isset($categoryMemberAmounts[$cat->id]))
                                                {{ $member->amount }}
                                            @endif
                                        @endif
                                    </td>
                                @endforeach

                                <td
                                    style="font-size: 20px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">

                                </td>
                            </tr>
                        @endforeach
                    @endif
                    {{ $new_count_cvr++ }}
                @endforeach



                {{-- <tr>
                <td></td>
                <td></td>
                <td></td>
                @foreach ($category as $cat)
                    <td>{{ $categoryAmounts[$cat->id] }}</td>
                @endforeach
                <td></td>
            </tr> --}}

                <tr>
                    <td colspan="3">Total Receipts</td>
                    @foreach ($category as $cat)
                        <td>{{ $categoryAmounts[$cat->id] + Helper::get_openings_balance($cat->id, $pre_vr_date) }}
                        </td>
                    @endforeach
                    <td></td>
                </tr>

                <tr>
                    <td colspan="3">Total Payments</td>
                    @foreach ($category as $cat)
                        <td>
                            {{ Helper::total_payment_today($cat->id, $vr_date) }}
                            {{-- {{ $totalPayments[$cat->id] }} --}}
                        </td>
                    @endforeach
                    <td></td>
                </tr>

                <tr>
                    <td colspan="3">Balance Carried Forward</td>
                    @foreach ($category as $cat)
                        <td>
                            {{ $categoryAmounts[$cat->id] + Helper::get_openings_balance($cat->id, $pre_vr_date) - Helper::total_payment_today($cat->id, $vr_date) }}
                            {{-- {{ $categoryAmounts[$cat->id] - $totalPayments[$cat->id] }} --}}

                        </td>
                    @endforeach
                    <td></td>
                </tr>


            </tbody>
        </table>


        {{-- <h3>Summary</h3>
    <ul>
        <li>CASH Total: {{ $cashAmount }}</li>
        <li>BANK Total: {{ $bankAmount }}</li>
        <li>CGOs Total: {{ $cgosAmount }}</li>
        <li>NGOs Total: {{ $ngosAmount }}</li>
        <li>TA/DA Total: {{ $taDaAmount }}</li>
        <li>GPF Total: {{ $gpfAmount }}</li>
        <li>Medical Total: {{ $medicalAmount }}</li>
        <li>Misc Total: {{ $miscAmount }}</li>
    </ul> --}}

    </body>

</html>
