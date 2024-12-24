<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Report</title>
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
                                    Payments FOR {{ \Carbon\Carbon::parse($chq_date)->format('d/m/Y') }}
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
                <th>Cheque No</th>
                @foreach ($category as $cat)
                    <th>{{ strtoupper($cat->name) }}</th>
                @endforeach
                <th>SIGN</th>
            </tr>
        </thead>
        <tbody>
            @php
                // Initialize totals and processed receipt IDs
                $categoryTotals = [];
                $balanceCarriedForward = [];
                $totalReceipts = [];
                $processedReceipts = []; // To track processed receipt IDs

                foreach ($category as $cat) {
                    $categoryTotals[$cat->id] = 0;
                    $balanceCarriedForward[$cat->id] = 0;
                    $totalReceipts[$cat->id] = 0;
                }
            @endphp

            @foreach ($payments as $key => $payment)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($payment->first()->created_at)->format('d/m/Y') }}</td>
                    <td>
                        @foreach ($payment as $vr_no_print)
                            {{ $vr_no_print->vr_no }}
                            <br>
                        @endforeach
                    </td>
                    <td>
                        <span>Cheque No.- {{ $key ?? '-' }}</span><br>
                        @foreach ($payment as $new => $item)
                            @if (isset($item->reciepts) && $item->reciepts->count() > 0)
                                <span>
                                    ({{ $new + 1 }})
                                    @if (isset($item->reciepts->receiptMembers) && $item->reciepts->receiptMembers->count() > 0)
                                        @foreach ($item->reciepts->receiptMembers as $member)
                                            ({{ $member->member->pers_no ?? '' }}. {{ $member->member->name ?? '' }})
                                        @endforeach
                                    @endif
                                </span><br>
                            @endif
                        @endforeach
                    </td>
                    <td>{{ $key ?? '-' }}</td>
                    @foreach ($category as $cat)
                        <td>
                            @php
                                $categoryAmount = 0;
                            @endphp

                            @foreach ($payment as $index => $item)
                                @if (isset($item->reciepts) && $item->reciepts->category_id == $cat->id)
                                    @php
                                        $categoryAmount += $item->amount;
                                        $categoryTotals[$cat->id] += $item->amount;
                                        // Skip if this receipt has already been processed
                                        if (!in_array($item->reciepts->id, $processedReceipts)) {
                                            $totalReceipts[$cat->id] += $item->reciepts->amount;
                                            $processedReceipts[] = $item->reciepts->id; // Mark as processed
                                        }
                                    @endphp
                                @endif
                            @endforeach

                            {{ $categoryAmount > 0 ? $categoryAmount : '' }}
                        </td>
                    @endforeach
                    <td></td>
                </tr>
            @endforeach

            <tr>
                <td colspan="4">Total Payments</td>
                @foreach ($category as $cat)
                    <td>{{ $categoryTotals[$cat->id] }}</td>
                @endforeach
                <td></td>
            </tr>

            <tr>
                <td colspan="4">Balance Carried Forward</td>
                @foreach ($category as $cat)
                    <td>
                        @php
                            $balanceCarriedForward[$cat->id] = $totalReceipts[$cat->id] - $categoryTotals[$cat->id];
                        @endphp
                        {{ $balanceCarriedForward[$cat->id] }}
                    </td>
                @endforeach
                <td></td>
            </tr>

            <tr>
                <td colspan="4">Total Receipts</td>
                @foreach ($category as $cat)
                    <td>{{ $totalReceipts[$cat->id] }}</td>
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
