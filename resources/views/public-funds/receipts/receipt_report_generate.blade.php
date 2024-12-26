<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipts</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
            font-size: 12px;
        }
    </style>
</head>

<body>

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
                      font-size: 10px;
                      line-height: 14px;
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
                      font-size: 14px;
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
                                        style="font-size: 10px;
                  line-height: 14px;
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
                    <td>{{ $openingBalance[$cat->id] ?? '' }}</td>
                @endforeach
                <td></td>

            </tr>

            @foreach ($receipts as $receipt)
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
                <tr>
                    <td>{{ \Carbon\Carbon::parse($receipt->vr_date)->format('d/m/Y') }}</td>
                    <td>{{ $receipt->vr_no }}</td>
                    <td>
                        <span>{{ $receipt->narration }} DV No.- {{ $receipt->dv_no }}</span><br>

                        @if (isset($receipt->receiptMembers) && $receipt->receiptMembers->count() > 0)
                            @foreach ($receipt->receiptMembers as $index => $member)
                                @php
                                    $memberName = $members->firstWhere('id', $member->member_id)->name ?? 'N/A';
                                    $memberDesign =
                                        $members->firstWhere('id', $member->member_id)->designation->designation_type ??
                                        'N/A';
                                @endphp

                                <span>{{ $member->serial_no }}. {{ $memberName }} - {{ $memberDesign }}</span><br>
                            @endforeach
                        @endif
                    </td>

                    @foreach ($category as $cat)
                        <td>
                            @if ($receipt->category_id == $cat->id)
                                @if (isset($categoryMemberAmounts[$cat->id]))
                                    @foreach ($categoryMemberAmounts[$cat->id] as $amount)
                                        <div>{{ $amount }}</div>
                                    @endforeach
                                @else
                                    <div>Receipt Amount: {{ $receipt->amount }}</div>
                                @endif
                            @endif
                        </td>
                    @endforeach
                    <td></td>
                </tr>
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
                    <td>{{ $categoryAmounts[$cat->id] }}</td>
                @endforeach
                <td></td>
            </tr>

            <tr>
                <td colspan="3">Total Payments</td>
                @foreach ($category as $cat)
                    <td>{{ $totalPayments[$cat->id] }}</td>
                @endforeach
                <td></td>
            </tr>

            <tr>
                <td colspan="3">Balance Carried Forward</td>
                @foreach ($category as $cat)
                    <td>

                        {{-- {{ $categoryAmounts[$cat->id] - $totalPayments[$cat->id] }} --}}
                        0
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
